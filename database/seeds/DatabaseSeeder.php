<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Thinkpad T440',
                'description' => '14" laptop with enhanced graphics options to tackle any workload.',
                'unit_price' => '827.10',
            ],
            [
                'name' => 'Thinkpad T450s',
                'description' => 'The best-selling ThinkPad in North America is incredibly light without sacrificing performance.',
                'unit_price' => '953.10',
            ],
            [
                'name' => 'MacBook Pro',
                'description' => 'The design of MacBook Pro packs a lot of power into not a lot of space. Because we believe that high performance shouldn’t come at the expense of portability. And despite being so compact, the new 13-inch and 15-inch MacBook Pro models now deliver up to 10 hours and 9 hours of battery life, respectively — an hour more than the previous models.',
                'unit_price' => '1999',
            ],
            [
                'name' => 'Dell Lattitude 3000',
                'description' => 'Designed for small and growing businesses with strong performance for everyday productivity.',
                'unit_price' => '399',
            ],
        ]);
    }
}
