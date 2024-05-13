<x-mail::message>
# Introduction

Le dossier n°{{ $data['numDossier'] }} , connaissement n°{{ $data['connaissement'] }} a été mis en livraison le {{ Carbon\Carbon::parse($data['dateMiseEnLivraison'])->format('d-m-Y') }} avec succès !

<x-mail::button :url="$url">
TGR Online, click here !
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
