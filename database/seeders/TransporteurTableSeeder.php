<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransporteurTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("transporteurs")->insert([
            ["nomTransporteur" => "AGL",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["nomTransporteur" => "CCIS",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["nomTransporteur" => "LES CENTAURES ROUTIERS",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["nomTransporteur" => "RIMAJ",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["nomTransporteur" => "GLOBAL MANUTENTION",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["nomTransporteur" => "MEDLOG",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["nomTransporteur" => "PROLOGISTICS",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["nomTransporteur" => "MOVIS",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["nomTransporteur" => "LYNX",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["nomTransporteur" => "MAERSK",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["nomTransporteur" => "GRIMALDI",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["nomTransporteur" => "LOGIS TRANSPORT",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["nomTransporteur" => "LTA",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["nomTransporteur" => "CONTINENTAL SHIPPING",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],
        ]);
    }
}
