<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BuroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("buros")->insert([
            ["code" => "CIAB1",
            "libelle" => "ABIDJAN-PORT",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIAB2",
            "libelle" => "ABIDJAN CONTROLE POSTAL",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIAB3",
            "libelle" => "ABIDJAN PORT-BOUET",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIAB4",
            "libelle" => "ABIDJAN VRIDI PETROLES",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIAB5",
            "libelle" => "ABIDJAN ENTREPOTS",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIAB6",
            "libelle" => "ABJ GUICHET UNIQUE",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIAB7",
            "libelle" => "ABIDJAN PORT A.T.",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIAB8",
            "libelle" => "ABIDJAN AEROPORT A.T.",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIAB9",
            "libelle" => "ABIDJAN VRIDI-PORT",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIABA",
            "libelle" => "ABIDJAN AEROGARE",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],
            
            ["code" => "CIABE",
            "libelle" => "BUREAU SECTION EXPORT",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIABP",
            "libelle" => "BUREAU PORT DE PECHE ABIDJAN",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIABS",
            "libelle" => "ABIDJAN-SCANNER",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIABT",
            "libelle" => "ABIDJAN TRANSIT",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIABY",
            "libelle" => "BUREAU ZONE INDUSTRIELLE YOPOUGON",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIAFN",
            "libelle" => "AFFORENOU",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIASF",
            "libelle" => "ASSUEFRY",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIB41",
            "libelle" => "BUREAU CENTRAL DE BOUAKE",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIB42",
            "libelle" => "BUREAU AN. TRI-POSTAL DE BOUAKE",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIB43",
            "libelle" => "BUREAU AN. GESTOCI DE BOUAKE",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIB44",
            "libelle" => "BRIGADE MOBILE N 1 DE BOUAKE",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIB45",
            "libelle" => "BRIGADE MOBILE N 2 DE BOUAKE",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIB46",
            "libelle" => "BRIGADE MOTO DE BOUAKE",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIB47",
            "libelle" => "BUREAU ANNEXE AEROPORT DE BOUAKE",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIB48",
            "libelle" => "BUREAU ANNEXE SITRARAIL DE BOUAKE",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIB49",
            "libelle" => "BUREAU AN. MARCHE DE GROS DE BOUAKE",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIBAG",
            "libelle" => "BRIGADE MOBILE D'AGNIBILEKROU",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIBDL",
            "libelle" => "BRIGADE MOBILE DE DALOA",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIBDN",
            "libelle" => "BRIGADE MOBILE DE DANANE",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIBGG",
            "libelle" => "BRIGADE MOBILE DE GUIGLO",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIBHE",
            "libelle" => "BINHOUYE",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIBIA",
            "libelle" => "BIANOUAN",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIBMA",
            "libelle" => "BRIGADE MOBILE D'ABENGOUROU",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIBMB",
            "libelle" => "BRIGADE MOBILE DE BOUNA",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIBMG",
            "libelle" => "BRIGADE MOBILE DE GOUMERE",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIBMM",
            "libelle" => "BRIGADE MOBILE DE MAN",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIBMO",
            "libelle" => "BRIGADE MOBILE D ODIENNE",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIBMT",
            "libelle" => "BRIGADE MOBILE DE TOULEPLEU",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIBMY",
            "libelle" => "BRIGADE MOBILE DE YAMOUSSOUKRO",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIBNA",
            "libelle" => "BOUNA",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIBOO",
            "libelle" => "BOOKO",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIBRD",
            "libelle" => "BUR. RECOUVR. ENQUETES DOUANIERES",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIBTD",
            "libelle" => "BRIGADE MOTO DALOA",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIBTG",
            "libelle" => "BRIGADE MOBILE DE TENGRELA",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIBUJ",
            "libelle" => "BUREAU DE RECOUVREMENT DE DJEDDAH",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIBUV",
            "libelle" => "BUREAU DES VENTES",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIBVA",
            "libelle" => "BUREAU DES VENTES AEROPORT",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CICLF",
            "libelle" => "BUR COORD. ACT. LUTTE CONTRE FRAUDE",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CICPT",
            "libelle" => "CHRONOPOST",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIDHL",
            "libelle" => "DHL",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIDIB",
            "libelle" => "BUREAU DIVISION DES BRIGADES",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIDRA",
            "libelle" => "DIRECTION REGIONALE D'ABOISSO",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIDRT",
            "libelle" => "DJIRITOU",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIEBL",
            "libelle" => "EBILASSOKRO",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIFDX",
            "libelle" => "FEDEX",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIFER",
            "libelle" => "BRIGADE MOBILE FERKESSEDOUGOU",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIFRB",
            "libelle" => "FRAMBO",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIGBN",
            "libelle" => "GBINTA",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIGDA",
            "libelle" => "NGANDANA",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIGEX",
            "libelle" => "GETMA-CI EXPRESS",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIGLB",
            "libelle" => "GBELEBAN",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIGPL",
            "libelle" => "GBAPLEU",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIGRB",
            "libelle" => "GRABO",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIGSD",
            "libelle" => "INSPEC. GEN. DES SERVICES DOUANIERS",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIKRG",
            "libelle" => "BUREAU DE KORHOGO",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIMNG",
            "libelle" => "MINIGNAN",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CINBL",
            "libelle" => "NIABLEY",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CINGN",
            "libelle" => "NIGOUNI",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CINOE",
            "libelle" => "NOE",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIPGO",
            "libelle" => "POGO",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIPKA",
            "libelle" => "PEKANHOUEBLY",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIPRO",
            "libelle" => "PROLLO",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIPSV",
            "libelle" => "PACKING SERVICE",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIRSI",
            "libelle" => "BUREAU DE RECOUVREMENT DIR.SURV.INT",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIRSY",
            "libelle" => "REGIE SYDAM",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIRTS",
            "libelle" => "REDEVANCE EXTRA LEGAL",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CISDC",
            "libelle" => "SOUS-DIRECTION DU CONTENTIEUX",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CISEP",
            "libelle" => "SAGA EXPRESS",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CISIE",
            "libelle" => "SIVOM EXPRESS",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CISKO",
            "libelle" => "SOKO",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CISME",
            "libelle" => "SIMAT EXPRESS",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CISMG",
            "libelle" => "SUIVI DES MARCHANDISES EN GROUPAGE",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CISPD",
            "libelle" => "SAN PEDRO",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CISPL",
            "libelle" => "SIPILOU",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CISRD",
            "libelle" => "SIRANA D'ODIENNE",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CISY1",
            "libelle" => "SYDAM 1",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CITAI",
            "libelle" => "TAI",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CITCE",
            "libelle" => "TOPCHRONO-EXPRESS",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CITFZ",
            "libelle" => "TIEFINZO",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CITIE",
            "libelle" => "TRANSIT INTER EXPRESS",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CITKK",
            "libelle" => "TAKIKRO",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CITSU",
            "libelle" => "TRANSUA",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIU59",
            "libelle" => "OUANGOLODOUGOU-TERRESTRE",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIU61",
            "libelle" => "OUANGOLODOUGOU FERROVIAIRE",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIUPS",
            "libelle" => "UPS",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIUSI",
            "libelle" => "UNITE SPECIALE INTERVENTION RAPIDE",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIVRL",
            "libelle" => "VARALE",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIWAN",
            "libelle" => "WANINOU",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIYKB",
            "libelle" => "BUREAU DOUANES YAMOUSSOUKRO",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIYKP",
            "libelle" => "BUREAU AN. GESTOCI DE YAMOUSSOUKRO",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],

            ["code" => "CIZFB",
            "libelle" => "BUREAU DE GESTION DES REGIMES FRANC",
            "created_at" => "2024-04-09 10:12:45",
            "updated_at" => "2024-04-09 10:12:45"],
 
        ]);
    }
}
