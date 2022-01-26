<?php

use Illuminate\Database\Seeder;
use App\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        /*$contato = new SiteContato();
        $contato->nome = 'Sistema SG';
        $contato->telefone = '(11) 9999-9999';
        $contato->email = 'aa@aa.com';
        $contato->motivo_contato = 1;
        $contato->mensagem = 'RELOU';
        $contato->save();*/

        factory(SiteContato::class,100)->create();
    }
}
