<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CatadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run($total = 1)
    {
        for($a=0; $a<$total; $a++) {
            DB::table('catadors')->insert([
            'nome' => 'vinicius',
            'cep' => 'Paranagua',
            'telefone' => 12345,
            'status' => 1,
            ]);
            }
            
    }
}
