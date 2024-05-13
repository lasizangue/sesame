<x-mail::message>
# Introduction

Bienvenue sur l'application !

<x-mail::button :url="$url">
Cliquez ici
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
