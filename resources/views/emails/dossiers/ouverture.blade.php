<x-mail::message>
# Introduction

Le dossier n°{{ $data['numDossier'] }} , connaissement n°{{ $data['connaissement'] }} a été ouvert le {{ Carbon\Carbon::parse($data['dateOuverture'])->format('d-m-Y') }} avec succès !

<x-mail::button :url="$url">
TGR Online, click here !
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
