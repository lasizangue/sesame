<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetachementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("detachements")->insert([
            ["nomDetachement" => "EXPORT", 
            "created_at" => "2024-04-09 13:12:45",
            "updated_at" => "2024-04-09 13:12:45"],

            ["nomDetachement" => "MARITIME", 
            "created_at" => "2024-04-09 13:12:45",
            "updated_at" => "2024-04-09 13:12:45"],

            ["nomDetachement" => "SAISIE",
            "created_at" => "2024-04-09 13:12:45",
            "updated_at" => "2024-04-09 13:12:45"],

            ["nomDetachement" => "DIRECTION",
            "created_at" => "2024-04-09 13:12:45",
            "updated_at" => "2024-04-09 13:12:45"],

            ["nomDetachement" => "CHEF",
            "created_at" => "2024-04-09 13:12:45",
            "updated_at" => "2024-04-09 13:12:45"],

            ["nomDetachement" => "LIVRAISON",
            "created_at" => "2024-04-09 13:12:45",
            "updated_at" => "2024-04-09 13:12:45"],

            ["nomDetachement" => "AERIEN",
            "created_at" => "2024-04-09 13:12:45",
            "updated_at" => "2024-04-09 13:12:45"],

            ["nomDetachement" => "INFORMATIQUE",
            "created_at" => "2024-04-09 13:12:45",
            "updated_at" => "2024-04-09 13:12:45"],

            ["nomDetachement" => "OPERATIONNEL",
            "created_at" => "2024-04-09 13:12:45",
            "updated_at" => "2024-04-09 13:12:45"],

            ["nomDetachement" => "DOCUMENTATION",
            "created_at" => "2024-04-09 13:12:45",
            "updated_at" => "2024-04-09 13:12:45"],

            ["nomDetachement" => "ESPACE CLIENTS",
            "created_at" => "2024-04-09 13:12:45",
            "updated_at" => "2024-04-09 13:12:45"],

        ]);
    }
}
