<x-mail::message>
# Introduction

Informations relatives au colis du dossier n°{{ $data['numDossier'] }} ; 
LTA :{{ $data['connaissement'] }}
Compagnie :{{ $data['nomCompagnie'] }}
Vol :{{ $data['vol'] }}
Aéroport de chargement :{{ $data['aeroportDepart'] }}
Vol :{{ Carbon\Carbon::parse($data['dateArrivee'])->format('d-m-Y') }}

<x-mail::button :url="$url">
TGR Online, click here !
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
