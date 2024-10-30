<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResiduoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('residuos')->insert([

            [
                'id' => '1',
                'nome' => 'Papelao',
            ],

            [
                'id' => '2',
                'nome' => 'Isopor',
            ],

            [
                'id' => '3',
                'nome' => 'Papel',
            ],

        ]);
    }
}
