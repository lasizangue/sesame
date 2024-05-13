<x-mail::message>
# Introduction

La FDI numéro soumission : {{ $data['numFdiSoumi'] }} du dossier n°  {{$data->dossier->numDossier}} a été établi le {{ Carbon\Carbon::parse($data['dateFdiSou'])->format('d-m-Y') }} avec succès !

<x-mail::button :url="$url">
TGR Online, click here !
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
