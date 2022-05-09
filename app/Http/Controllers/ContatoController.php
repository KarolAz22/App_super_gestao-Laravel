<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request){
        /*echo '<pre>';
        print_r($request->all());
        echo '</pre>';*/
        /*$contato = new SiteContato();
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');

        //print_r($contato->getAttributes());
        //var_dump($_POST);
        $contato->save();*/

        //$contato =  new SiteContato();
        //$contato->fill($request->all());
        //$contato->save();
        //print_r($contato->getAttributes());
        //OU

        //$contato->create($request->all());// já cria direto sem precisar do save, mas precisa ser definido na classe site contato com o fillable

        $motivo_contatos = MotivoContato::all();

        return view('site.contato',['motivo_contatos'=>$motivo_contatos]);
    }

    public function salvar(Request $request){

        $regras = [
            'nome'=>'required|min:3|max:40',
            'telefone'=>'required',
            'email'=>'email',
            'motivo_contatos_id'=>'required',
            'mensagem'=>'required|max:2000',

        ];

        $feedback = [
            
            'nome.min'=>'O campo nome precisa ter no mínimo 3 caracteres',
            'nome.max'=>'O campo nome deve ter no máximo 40 caracteres',
            'email.email'=>'O email informado não é válido',
            'mensagem.max'=>'A mensagem deve ter no máximo 2000 caracteres',

            'required'=> 'O campo :attribute deve ser preenchido'
        ];

        $request->validate($regras,$feedback);
        SiteContato::create($request->all());
        return redirect()->route('site.index');

    }
}
