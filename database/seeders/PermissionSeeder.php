<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([

            [
                'id' => '1',
                'regra' => 'geradorResiduos.index',
                'permissao' => '1',
                'type_id' => '1',
            ],
            
            
            [
                'id' => '2',
                'regra' => 'geradorResiduos.store',
                'permissao' => '1',
                'type_id' => '1',
            ],
            
            ['id' => '3',
            'regra' => 'geradorResiduos.create',
            'permissao' => '1',
            'type_id' => '1',],

            ['id' => '4',
            'regra' => 'geradorResiduos.update',
            'permissao' => '1',
            'type_id' => '1',],

            ['id' => '5',
            'regra' => 'geradorResiduos.destroy',
            'permissao' => '1',
            'type_id' => '1',],

            ['id' => '6',
            'regra' => 'geradorResiduos.edit',
            'permissao' => '1',
            'type_id' => '1',],

            ['id' => '7',
            'regra' => 'coletaResiduos.index',
            'permissao' => '1',
            'type_id' => '1',],

            ['id' => '8',
            'regra' => 'coletaResiduos.create',
            'permissao' => '1',
            'type_id' => '1',],

            ['id' => '9',
            'regra' => 'coletaResiduos.store',
            'permissao' => '1',
            'type_id' => '1',],

            ['id' => '10',
            'regra' => 'coletaResiduos.edit',
            'permissao' => '1',
            'type_id' => '1',],

            ['id' => '11',
            'regra' => 'coletaResiduos.destroy',
            'permissao' => '1',
            'type_id' => '1',],

            ['id' => '12',
            'regra' => 'catadors.index',
            'permissao' => '1',
            'type_id' => '1',],

            ['id' => '13',
            'regra' => 'catadors.create',
            'permissao' => '1',
            'type_id' => '1',],

            ['id' => '14',
            'regra' => 'catadors.edit',
            'permissao' => '1',
            'type_id' => '1',],

            ['id' => '15',
            'regra' => 'recebidos.create',
            'permissao' => '1',
            'type_id' => '1',],

            ['id' => '16',
            'regra' => 'recebidos.edit',
            'permissao' => '1',
            'type_id' => '1',],

            ['id' => '17',
            'regra' => 'finalizados.index',
            'permissao' => '1',
            'type_id' => '1',],

            ['id' => '18',
            'regra' => 'geradorResiduos.index',
            'permissao' => '1',
            'type_id' => '2',],
            
            ['id' => '19',
            'regra' => 'geradorResiduos.store',
            'permissao' => '0',
            'type_id' => '2',],

            ['id' => '20',
            'regra' => 'geradorResiduos.create',
            'permissao' => '0',
            'type_id' => '2',],

            ['id' => '21',
            'regra' => 'geradorResiduos.update',
            'permissao' => '0',
            'type_id' => '2',],

            ['id' => '22',
            'regra' => 'geradorResiduos.destroy',
            'permissao' => '0',
            'type_id' => '2',],

            ['id' => '23',
            'regra' => 'geradorResiduos.edit',
            'permissao' => '0',
            'type_id' => '2',],

            ['id' => '24',
            'regra' => 'coletaResiduos.create',
            'permissao' => '0',
            'type_id' => '2',],

            ['id' => '25',
            'regra' => 'coletaResiduos.store',
            'permissao' => '0',
            'type_id' => '2',],

            ['id' => '26',
            'regra' => 'coletaResiduos.edit',
            'permissao' => '0',
            'type_id' => '2',],
            
            ['id' => '27',
            'regra' => 'coletaResiduos.destory',
            'permissao' => '0',
            'type_id' => '2',],

            ['id' => '28',
            'regra' => 'catadors.index',
            'permissao' => '0',
            'type_id' => '2',],

            ['id' => '29',
            'regra' => 'catadors.create',
            'permissao' => '0',
            'type_id' => '2',],

            ['id' => '30',
            'regra' => 'catadors.edit',
            'permissao' => '0',
            'type_id' => '2',],

            ['id' => '31',
            'regra' => 'recebidos.create',
            'permissao' => '0',
            'type_id' => '2',],

            ['id' => '32',
            'regra' => 'recebidos.edit',
            'permissao' => '0',
            'type_id' => '2',],

            ['id' => '33',
            'regra' => 'finalizados.index',
            'permissao' => '0',
            'type_id' => '2',],
        ]);
    }
}
