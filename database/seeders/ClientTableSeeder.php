<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table("clients")->insert([
            ["raisonSocial" => "TRANSIT GENERAL RAPIDE (TGR)",
            "compteContrib" => "8700036K",
            "adresse" => "01 BP 8093 ABIDJAN 01",
            "contact" => "(+225) 27 21 24 10 31", 
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

        ]);
    }
}
