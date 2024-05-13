<x-mail::message>
# Introduction

Les conteneurs du dossier n°{{ $data['numDossier'] }} , connaissement n°{{ $data['connaissement'] }} ont été livrés le {{ Carbon\Carbon::parse($data['dateLivraison'])->format('d-m-Y') }} avec succès !

<x-mail::button :url="$url">
TGR Online, click here !
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
