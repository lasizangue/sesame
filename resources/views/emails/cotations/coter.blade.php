<x-mail::message>
# Introduction

Le dossier n°{{ $data['numDossier']}} , connaissement n°{{ $data['connaissement']}} a été coté le {{ Carbon\Carbon::parse($data['dateCotation'])->format('d-m-Y') }}. Merci de contacter notre agent {{ $data->user->nom }} {{ $data->user->prenom }} !

<x-mail::button :url="$url">
TGR Online, click here !
</x-mail::button> 

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
