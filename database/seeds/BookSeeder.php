<?php

use Illuminate\Database\Seeder;
use App\Models\ModelBook;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        ModelBook::create([
            'title'=>'harry potter',
            'pages'=>'230',
            'price'=>'14.88',
            'id_user'=>1,
        ]);
        ModelBook::create([
            'title'=>'A Seleção',
            'pages'=>'250',
            'price'=>'14.00',
            'id_user'=>2,
        ]);
        ModelBook::create([
            'title'=>'A travessia',
            'pages'=>'300',
            'price'=>'20.99',
            'id_user'=>3,
        ]);
    }
}
