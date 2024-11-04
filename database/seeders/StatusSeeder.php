<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([

            [
                'id' => '1',
                'descricao' => 'Aberto'
            ],

            [
                'id' => '2',
                'descricao' => 'Atendimento'
            ],

            [
                'id' => '3',
                'descricao' => 'Finalizado'
            ],

            [
                'id' => '4',
                'descricao' => 'Ativo'
            ],

            [
                'id' => '5',
                'descricao' => 'Inativo'
            ],

        ]);
    }
}
