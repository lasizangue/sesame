<x-mail::message>
# Introduction

Le RFCV numéro soumission : {{ $data['numRfcvSoumi'] }} du dossier n°  {{$data->dossier->numDossier}} a été établi le {{ Carbon\Carbon::parse($data['dateRfcvSou'])->format('d-m-Y') }} avec succès !

<x-mail::button :url="$url">
TGR Online, click here !
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
