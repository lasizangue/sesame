<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("services")->insert([
            ["nomService" => "DECLARANT",
            "created_at" => "2024-04-09 11:12:45",
            "updated_at" => "2024-04-09 11:12:45"],

            ["nomService" => "SECRETARIAT DECLARANT",
            "created_at" => "2024-04-09 11:12:45",
            "updated_at" => "2024-04-09 11:12:45"],

            ["nomService" => "DIRECTION",
            "created_at" =>"2024-04-09 11:12:45",
            "updated_at" => "2024-04-09 11:12:45"],

            ["nomService" => "CHEF DECLARANT",
            "created_at" => "2024-04-09 11:12:45",
            "updated_at" => "2024-04-09 11:12:45"],

            ["nomService" => "CHEF LIVRAISON",
            "created_at" => "2024-04-09 11:12:45",
            "updated_at" => "2024-04-09 11:12:45"],

            ["nomService" => "INFORMATIQUE",
            "created_at" => "2024-04-09 11:12:45",
            "updated_at" => "2024-04-09 11:12:45"],

            ["nomService" => "CHEF",
            "created_at" => "2024-04-09 11:12:45",
            "updated_at" => "2024-04-09 11:12:45"],

            ["nomService" => "CLIENTS",
            "created_at" => "2024-04-09 11:12:45",
            "updated_at" => "2024-04-09 11:12:45"],
        ]);
    }
}
