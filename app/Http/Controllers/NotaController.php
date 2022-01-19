<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Nota;

class NotaController extends Controller
{
    //
    public function index(){
        return view('private.nota');
    }

    public function upload(Request $req){
        $imagem = $req->file('file');

        $nome = time() . random_int(1, 1000000) . '.xml';

        $imagem->move(public_path('images/notas'), $nome);

        $xml = NotaController::testeNota(public_path('images/notas/') . $nome);

        $nota                   = new Nota();
        $nota->user             = Auth::User()->id;
        $nota->totalQuantidade  = $xml->totalQuantidade;
        $nota->quantidade       = $xml->quantidade;
        $nota->entrada          = $xml->entrada;
        $nota->saida            = $xml->saida;
        $nota->data             = $xml->data;
        $nota->produtos         = $xml->produtos;
        $nota->cnpj             = $xml->cnpj;
        $nota->inscricao        = $xml->inscricao;
        $nota->estado           = $xml->estado;
        $nota->modelo           = $xml->modelo;
        $nota->serie            = $xml->serie;
        $nota->numero           = $xml->numero;
        $nota->cfop             = $xml->cfop;
        $nota->emitente         = $xml->emitente;
        $nota->baseIcms         = $xml->baseIcms;
        $nota->icms             = $xml->icms;
        $nota->valorTributado   = $xml->valorTributado;
        $nota->outras           = $xml->outras;
        $nota->reducao          = $xml->reducao;
        $nota->aliquota         = $xml->aliquota;
        $nota->situacao         = $xml->situacao;
        $nota->codigo           = $xml->codigo;
        $nota->valor            = $xml->valor;
        $nota->desconto         = $xml->desconto;
        $nota->baseIcmsSt       = $xml->baseIcmsSt;
        $nota->ipi              = $xml->ipi;
        $nota->imagem_path      = $nome;
        $nota->cst              = $xml->cst;
        $nota->ncm              = $xml->ncm;
        $nota->unMedida         = $xml->unMedida;

        $nota->save();
    }

    public function getNota(Request $req){
        $nota = Nota::find($req->id);

        return response()->json($nota);
    }

    protected static function testeNota(string $file){
        //$file = "C:/xampp/htdocs/newfisco/public/images/notas/1637426245.xml";
        $xml = simplexml_load_file($file);

        $totalQuantidade = 0;
        $produtos = $quantidade = $cfop = $codigo = $valor = $aliquota = $ncm = $cst = $unMedida = "";

        foreach($xml->NFe->infNFe->det as $t){
            foreach($t->prod as $prod){
                $totalQuantidade = $totalQuantidade + $prod->qCom;

                if($produtos == ""){
                    $produtos   .= strval($prod->xProd);
                    $quantidade .= substr(strval($prod->qCom), 0, -1);
                    $codigo     .= strval($prod->cProd);
                    $valor      .= strval($prod->vUnTrib);
                    $cfop       .= strval($prod->CFOP);
                    $aliquota   .= substr(strval($t->imposto->ICMS->ICMS00->pICMS), 0, -2);
                    $cst        .= strval($t->imposto->ICMS->ICMS00->CST);
                    $ncm        .= strval($prod->NCM);
                    $unMedida   .= strval($prod->uCom);
                } else {
                    $produtos   .= "¬" . strval($prod->xProd);
                    $quantidade .= "¬" . substr(strval($prod->qCom), 0, -1);
                    $codigo     .= "¬" . strval($prod->cProd);
                    $valor      .= "¬" . strval($prod->vUnTrib);
                    $cfop       .= "¬" . strval($prod->CFOP);
                    $aliquota   .= "¬" . substr(strval($t->imposto->ICMS->ICMS00->pICMS), 0, -2);
                    $cst        .= "¬" . strval($t->imposto->ICMS->ICMS00->CST);
                    $ncm        .= "¬" . strval($prod->NCM);
                    $unMedida   .= "¬" . strval($prod->uCom);
                }
            }
        }

        $nota                   = new \stdClass();
        $nota->cnpj             = $xml->NFe->infNFe->emit->CNPJ;
        $nota->inscricao        = $xml->NFe->infNFe->emit->IE;
        $nota->estado           = $xml->NFe->infNFe->dest->enderDest->UF;
        $nota->modelo           = $xml->NFe->infNFe->ide->mod;
        $nota->serie            = $xml->NFe->infNFe->ide->serie;
        $nota->numero           = $xml->NFe->infNFe->ide->nNF;
        $nota->emitente         = $xml->NFe->infNFe->ide->tpNF == 0 ? "T" : "P";
        $nota->baseIcms         = str_replace('.','',$xml->NFe->infNFe->total->ICMSTot->vBC);
        $nota->icms             = $xml->NFe->infNFe->total->ICMSTot->vICMS;
        $nota->desconto         = $xml->NFe->infNFe->total->ICMSTot->vDesc;
        $nota->baseIcmsSt       = $xml->NFe->infNFe->total->ICMSTot->vBCST;
        $nota->ipi              = $xml->NFe->infNFe->total->ICMSTot->vIPI;
        $nota->valorTributado   = "0000000000000";
        $nota->outras           = "0000000000000";
        $nota->reducao          = "00000";
        $nota->situacao         = "N";
        $nota->totalQuantidade  = $totalQuantidade;
        $nota->quantidade       = $quantidade;
        $nota->produtos         = $produtos;
        $nota->codigo           = $codigo;
        $nota->valor            = $valor;
        $nota->cfop             = $cfop;
        $nota->aliquota         = $aliquota;
        $nota->cst              = $cst;
        $nota->ncm              = $ncm;
        $nota->unMedida         = $unMedida;
        $nota->entrada          = $xml->NFe->infNFe->ide->tpNF == 0 ? $xml->NFe->infNFe->total->ICMSTot->vNF : 0;
        $nota->saida            = $xml->NFe->infNFe->ide->tpNF == 1 ? $xml->NFe->infNFe->total->ICMSTot->vNF : 0;
        $nota->data             = date('Y-m-d', strtotime($xml->NFe->infNFe->ide->dhEmi));
        return $nota;
        //print_r($nota);

    }

    public function remove($id){
        $nota = Nota::find($id);
        $nota->delete();

        unlink(public_path('images\notas\\') . $nota->imagem_path);

        return redirect('/admin/notas')->with('statusPositivo', 'Nota Fiscal excluída com sucesso!');
    }

    public function notas(Request $req){
        $mes = $req->mes ? $req->mes : null;
        if($req->mes){
            $notas = Nota::whereBetween('data', [date('Y-'.$req->mes.'-01'), date('Y-'.$req->mes.'-t')])->get();
        } else {
            $notas = Nota::all();
        }

        return view('private.notas', ['notas' => $notas, 'mes' => $mes]);
    }

    public function nota(request $request){
        $nota['quantidade'] = $nota['produto'] = $nota['entrada'] = $nota['saida'] = 0;

        $nota['quantidade'] = DB::select('select count(*) as total from notas where user = ' . Auth::User()->id);
        $nota['produto']    = DB::select('select sum(quantidade) as total from notas where user = ' . Auth::User()->id);
        $nota['entrada']    = DB::select('select sum(entrada) as total from notas where user = ' . Auth::User()->id);
        $nota['saida']      = DB::select('select sum(saida) as total from notas where user = ' . Auth::User()->id);

        return response()->json($nota);
    }
}
