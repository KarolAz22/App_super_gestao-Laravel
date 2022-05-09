<?php

use App\SiteContato;
use Illuminate\Database\Seeder;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$contato= new SiteContato();
        $contato->nome='Sistema Sg';
        $contato->telefone='(11) 9999-9999';
        $contato->email='contato@sg.com.br';
        $contato->motivo_contato=1;
        $contato->mensagem='Seja bem vindo ao super gestão';
        $contato->save();*/

        factory(SiteContato::class,100)->create(); // versão 8 \App\Models\SiteContato::factory()->count(100)->creat();



    }
}
