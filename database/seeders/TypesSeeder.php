<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            [
                'id' => '1',
                'nome' => 'admin',
            ],

            [
                'id' => '2',
                'nome' => 'user',
            ],
        ]);
    }
}
