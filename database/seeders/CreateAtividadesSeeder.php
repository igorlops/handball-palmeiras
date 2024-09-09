<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateAtividadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::connection('mysql')->table('atividades')->insert(['descricao' => 'Musculação']);
        DB::connection('mysql')->table('atividades')->insert(['descricao' => 'Funcional']);
        DB::connection('mysql')->table('atividades')->insert(['descricao' => 'Cross Fit']);
        DB::connection('mysql')->table('atividades')->insert(['descricao' => 'Pilates']);
        DB::connection('mysql')->table('atividades')->insert(['descricao' => 'Hidroginástica']);
        DB::connection('mysql')->table('atividades')->insert(['descricao' => 'Natação']);
        DB::connection('mysql')->table('atividades')->insert(['descricao' => 'Ciclismo']);
        DB::connection('mysql')->table('atividades')->insert(['descricao' => 'Muay Thai']);
    }
}
