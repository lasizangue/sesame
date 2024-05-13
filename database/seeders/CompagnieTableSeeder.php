<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompagnieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("compagnies")->insert([
            ["nomCompagnie" => "AGL", 
            "created_at" => "2024-04-09 10:34:45",
            "updated_at" => "2024-04-09 10:34:45"],

            ["nomCompagnie" => "DELMAS CI", 
            "created_at" => "2024-04-09 10:34:45",
            "updated_at" => "2024-04-09 10:34:45"],

        ]);
    }
}
