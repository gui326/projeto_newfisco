<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Nota;
use App\Models\User;

use Illuminate\Http\Request;
use stdClass;

class SintegraController extends Controller
{
    //
    public function index(Request $req){
        $user       = User::find(Auth::user()->id);
        $notas      = Nota::whereBetween('data', [date('Y-'.$req->mes.'-01'), date('Y-'.$req->mes.'-t')])->get();

        $txt   = SintegraController::linha10($req, $user);
        $txt  .= SintegraController::linha11($txt, $user);

        $registros50 = $registros54 = $registros75 = "";

        foreach($notas as $nota){
            $i = 0;

            $auxCfop      = explode('¬', $nota->cfop);
            $auxCfop      = intval($auxCfop[$i]);
            $auxAliquota  = explode('¬', $nota->aliquota);
            $auxAliquota  = intval($auxAliquota[$i]);

            $txt .= SintegraController::linha50($txt, $nota, $auxCfop, $auxAliquota);
            $i++;
            $registros50 = $i;
        }

        foreach($notas as $nota){
            $aux = explode('¬', $nota->produtos);
            $i = 0;
            foreach($aux as $a){
                $auxCodigo  = explode('¬', $nota->codigo);
                $auxQtd     = explode('¬', $nota->quantidade);
                $auxValor   = explode('¬', $nota->valor);
                $auxCfop        = explode('¬', $nota->cfop);
                $auxCst         = explode('¬', $nota->cst);
                $auxAliquota    = explode('¬', $nota->aliquota);
                $auxNcm         = explode('¬', $nota->ncm);

                $produto = new \stdClass();
                $produto->codigo        = str_pad($auxCodigo[$i] , 14 , 0 , STR_PAD_LEFT);
                $produto->quantidade    = strval($auxQtd[$i]);
                $produto->valor         = floatval($auxValor[$i]);
                $produto->cfop          = intval($auxCfop[$i]);
                $produto->numero        = str_pad(strval($i + 1) , 3 , 0 , STR_PAD_LEFT);
                $produto->cst           = str_pad($auxCst[$i] , 3 , 0 , STR_PAD_RIGHT);
                $produto->aliquota      = intval($auxAliquota[$i]);
                $produto->ncm           = str_pad($auxNcm[$i] , 8 , 0 , STR_PAD_RIGHT);

                $txt .= SintegraController::linha54($txt, $produto, $nota);

                $i++;
                $registros54 = $i;
            }
        }

        foreach($notas as $nota){
            $aux = explode('¬', $nota->produtos);
            $i = 0;
            foreach($aux as $a){
                $auxDescricao   = explode('¬', $nota->produtos);
                $auxUnMedida    = explode('¬', $nota->unMedida);
                $auxCodigo  = explode('¬', $nota->codigo);

                $produto->codigo        = str_pad($auxCodigo[$i] , 14 , 0 , STR_PAD_LEFT);
                $produto->descricao     = strval($auxDescricao[$i]);
                $produto->unMedida      = strval($auxUnMedida[$i]);

                $txt .= SintegraController::linha75($txt, $req, $produto, $nota);
                $i++;
                $registros75 = $i;
            }
        }

        $txt .= SintegraController::linha90($txt, $user, $nota, $registros50, $registros54, $registros75);


        SintegraController::createFile($txt);

        return view('private.sintegra', ['txt' => $txt]);
    }

    public static function createFile($txt){
        $myfile = fopen(public_patH('sintegra/') . "sintegra.txt", "w") or die("Unable to open file!");
        fwrite($myfile, $txt);
        fclose($myfile);
    }

    private static function linha10($req, $user){
        $inscricao =  str_pad(strval($user->inscricao) , 14 , ' ' , STR_PAD_RIGHT);
        $razao     =  str_pad(strval(
            SintegraController::removeCaractereEspecial($user->razao)) , 35 , ' ' , STR_PAD_RIGHT);
        $cidade =  str_pad(strval(
            SintegraController::removeCaractereEspecial($user->cidade)) , 30 , ' ' , STR_PAD_RIGHT);
        $contato    =  str_pad(strval(substr($user->telefoneContato, 0, 10)) , 10 , 0 , STR_PAD_LEFT);

        return "10".$user->cnpj.$inscricao.$razao.$cidade.$user->estado.$contato.
        date('Y'.$req->mes.'01').date('Y'.$req->mes.'t'). "331" . "\n";
    }

    private static function linha11($txt, $user){
        $rua =  str_pad(strval(
            SintegraController::removeCaractereEspecial($user->rua)) , 34 , ' ' , STR_PAD_RIGHT);
        $complemento =  str_pad(strval(
            SintegraController::removeCaractereEspecial($user->complemento)) , 22 , ' ' , STR_PAD_RIGHT);
        $bairro =  str_pad(strval(
            SintegraController::removeCaractereEspecial($user->bairro)) , 15 , ' ' , STR_PAD_RIGHT);
        $nome =  str_pad(strval(
            SintegraController::removeCaractereEspecial($user->nomeContato)) , 28 , ' ' , STR_PAD_RIGHT);
        $telefone =  str_pad(strval($user->telefoneContato) , 12 , 0 , STR_PAD_LEFT);
        $cep = str_pad(strval($user->cep) , 8 , 0 , STR_PAD_RIGHT);
        $numero =  str_pad(strval($user->numero) , 5 , 0 , STR_PAD_LEFT);

        return  "11" . $rua . $numero . $complemento . $bairro . $cep .$nome . $telefone . "\n";
    }

    private static function linha50($txt, $nota, $auxCfop, $auxAliquota){
        $serie      =  str_pad(strval($nota->serie) , 3 , ' ' , STR_PAD_RIGHT);
        $numero     =  str_pad(strval(substr($nota->numero, 0, 6)) , 6 , 0 , STR_PAD_LEFT);
        $cfop       = str_pad(strval($auxCfop) , 4 , 0 , STR_PAD_LEFT);
        $aliquota   = str_pad(strval(str_replace('.','',$auxAliquota)) , 4 , 0 , STR_PAD_RIGHT);
        $base       = str_pad(strval(str_replace('.','',$nota->baseIcms)) , 13 , 0 , STR_PAD_LEFT);
        $icms       = str_pad(strval(str_replace('.','',$nota->icms)) , 13 , 0 , STR_PAD_LEFT);
        $tributado  = str_pad(strval(str_replace('.','',$nota->valorTributado)) , 13 , 0 , STR_PAD_LEFT);

        if($nota->entrada > 0){
            $cnpj       =  $nota->cnpj;
            $inscricao  =  str_pad(strval($nota->inscricao) , 14 , ' ' , STR_PAD_RIGHT);
            $valor      =  str_pad(strval(str_replace('.','',$nota->entrada)) , 13 , 0 , STR_PAD_LEFT);
        } else {
            $cnpj       =  str_pad('' , 14 , 0 , STR_PAD_LEFT);
            $inscricao  =  str_pad(strval('Isento'), 14, ' ', STR_PAD_RIGHT);
            $valor      =  str_pad(strval(str_replace('.','',$nota->saida)) , 13 , 0 , STR_PAD_LEFT);
        }
        return "50" . $cnpj . $inscricao . date('Ymd', strtotime($nota->data)) . $nota->estado .
        $nota->modelo . $serie . $numero . $cfop . $nota->emitente . $valor . $base . $icms .
        $tributado . $nota->outras . $aliquota . $nota->situacao . "\n";
    }

    private static function linha54($txt, $produto, $nota){
        $serie      = str_pad(strval($nota->serie) , 3 , ' ' , STR_PAD_RIGHT);
        $numero     = str_pad(strval(substr($nota->numero, 0, 6)) , 6 , 0 , STR_PAD_LEFT);
        $cfop       = str_pad(strval($produto->cfop) , 4 , 0 , STR_PAD_LEFT);
        $auxTotal   = strval($produto->quantidade * $produto->valor);

        if(strlen(explode('.', $auxTotal)[1]) < 2){
            $auxTotal = $auxTotal . '0';
        }

        $total      = str_pad(str_replace('.','',$auxTotal), 12 , 0 , STR_PAD_LEFT);
        $quantidade = str_pad(str_replace('.','',$produto->quantidade) , 11 , 0 , STR_PAD_LEFT);
        $desconto   = str_pad(strval(str_replace('.','',$nota->desconto)) , 12 , 0 , STR_PAD_LEFT);
        $base       = str_pad(strval(str_replace('.','',$nota->baseIcms)) , 12 , 0 , STR_PAD_LEFT);
        $baseSt     = str_pad(strval(str_replace('.','',$nota->baseIcmsSt)) , 12 , 0 , STR_PAD_LEFT);
        $ipi        = str_pad(strval(str_replace('.','',$nota->ipi)) , 12 , 0 , STR_PAD_LEFT);
        $aliquota   = str_pad(strval(str_replace('.','',$produto->aliquota)) , 4 , 0 , STR_PAD_RIGHT);

        if($nota->entrada > 0){
            $cnpj       =  $nota->cnpj;
        } else {
            $cnpj       =  str_pad('' , 14 , 0 , STR_PAD_LEFT);
        }
        return "54" . $cnpj . $nota->modelo . $serie . $numero . $cfop . $produto->cst . $produto->numero . $produto->codigo . $quantidade . $total . $desconto . $base . $baseSt . $ipi . $aliquota . "\n";
    }


    private static function linha75($txt, $req, $produto, $nota){
        $descricao  = str_pad($produto->descricao , 53 , ' ' , STR_PAD_RIGHT);
        $unMedida   = str_pad($produto->unMedida , 6 , ' ' , STR_PAD_RIGHT);
        $ipi        = str_pad(strval(str_replace('.','',$nota->ipi)) , 5 , 0 , STR_PAD_LEFT);
        $aliquota   = str_pad(strval(str_replace('.','',$produto->aliquota)) , 4 , 0 , STR_PAD_RIGHT);
        $base       = str_pad(strval(str_replace('.','',$nota->baseIcms)) , 13 , 0 , STR_PAD_LEFT);

        return "75" . date('Y'.$req->mes.'01').date('Y'.$req->mes.'t') . $produto->codigo
                . $produto->ncm . $descricao . $unMedida . $ipi . $aliquota . $nota->reducao .
                $base . "\n";
    }

    private static function linha90($txt, $user, $nota, $registros50, $registros54, $registros75){
        $inscricao   = str_pad(strval($user->inscricao) , 14 , ' ' , STR_PAD_RIGHT);
        $registros50 = str_pad(strval($registros50) , 8 , 0 , STR_PAD_LEFT);
        $registros54 = str_pad(strval($registros54) , 8 , 0 , STR_PAD_LEFT);
        $registros75 = str_pad(strval($registros75) , 8 , 0 , STR_PAD_LEFT);
        $registros90 = str_pad(strval('1'), 56, ' ', STR_PAD_LEFT);

        $totalRegistros = $registros50 + $registros54 + $registros75 + 3;

        $registro99 = str_pad(strval($totalRegistros) , 8 , 0 , STR_PAD_LEFT);

        return "90" . $user->cnpj . $inscricao . "50" . $registros50 . "54" . $registros54
                    . "75" . $registros75 . "99" . $registro99 . $registros90;
    }

    private static function removeCaractereEspecial($str)
    {
        return preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities($str));
    }
}
