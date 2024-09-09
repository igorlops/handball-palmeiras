<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreatePositionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::connection('mysql')->table('posicoes')->insert(['descricao' => 'Goleiro']);
        DB::connection('mysql')->table('posicoes')->insert(['descricao' => 'Pivô']);
        DB::connection('mysql')->table('posicoes')->insert(['descricao' => 'Armador central']);
        DB::connection('mysql')->table('posicoes')->insert(['descricao' => 'Armador direito']);
        DB::connection('mysql')->table('posicoes')->insert(['descricao' => 'Armador esquerdo']);
        DB::connection('mysql')->table('posicoes')->insert(['descricao' => 'Ponta direita']);
        DB::connection('mysql')->table('posicoes')->insert(['descricao' => 'Ponta esquerda']);
    }
}
