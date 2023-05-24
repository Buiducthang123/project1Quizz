<?php

namespace Database\Seeders;

use App\Models\Test;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Test::create([
            'Name'=>'De thi hoc ki',	
            'Description'=>'',
            'Time'=>50,
            'Quantity'=>1
        ])
        
        ;Test::create([
            'Name'=>'De thi trung hoc pho thong quoc qua',	
            'Description'=>'',
            'Time'=>50,
            'Quantity'=>1
        ]);Test::create([
            'Name'=>'De thi bla bla:))',	
            'Description'=>'',
            'Time'=>50,
            'Quantity'=>1
        ]);
    }
}
