<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //instanciando o obj
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'CELMO';
        $fornecedor->site = 'c.com';
        $fornecedor->uf = 'AL';
        $fornecedor->email = 'celminho@c.com';
        $fornecedor->save();

        //o metodo create (com o atributo fillable da classe)
        Fornecedor::create([
            'nome' => 'Celmo 2',
            'site' => 'c2.com',
            'uf' => 'AL',
            'email' => 'c2@aa.com'
        ]);

        //insert
        DB::table('fornecedores')->insert([
            'nome' => 'Celmo 3',
            'site' => 'c3.com',
            'uf' => 'AL',
            'email' => 'c3@aa.com'
        ]);
    }
}
