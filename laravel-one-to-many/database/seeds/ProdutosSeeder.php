<?php

use Illuminate\Database\Seeder;

class ProdutosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produtos')->insert([ 
            'nome' => 'Camiseta Polo Tony', 'preco' => '100.00', 
            'estoque' => '4', 'categoria_id' => 1,
        ]);
        DB::table('produtos')->insert([ 
            'nome' => 'Calça Jeans', 'preco' => '120.00', 
            'estoque' => '4', 'categoria_id' => 1,
        ]);
        DB::table('produtos')->insert([ 
            'nome' => 'Camisa Manga Longa ', 'preco' => '140.00', 
            'estoque' => '3', 'categoria_id' => 1,
        ]);
        DB::table('produtos')->insert([ 
            'nome' => 'PC Gamers', 'preco' => '10000.00', 
            'estoque' => '2', 'categoria_id' => 2,
        ]);
        DB::table('produtos')->insert([ 
            'nome' => 'Impressora Jato Tinta', 'preco' => '200.00', 
            'estoque' => '3', 'categoria_id' => 2,
        ]);
        DB::table('produtos')->insert([ 
            'nome' => 'Mouse', 'preco' => '120.00', 
            'estoque' => '2', 'categoria_id' => 2,
        ]);
        DB::table('produtos')->insert([ 
            'nome' => 'Carolina Herrera 212', 'preco' => '200.00', 
            'estoque' => '6', 'categoria_id' => 3,
        ]);
        DB::table('produtos')->insert([ 
            'nome' => 'Cama Casal', 'preco' => '2000.00', 
            'estoque' => '2', 'categoria_id' => 4,
        ]);
        DB::table('produtos')->insert([ 
            'nome' => 'Guarda Roupa', 'preco' => '1000.00', 
            'estoque' => '1', 'categoria_id' => 4,
        ]);
    }
}
