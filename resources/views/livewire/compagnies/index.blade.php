@section("titre")
    Gestion des compagnies - service livraison - Transit général rapide
@endsection
<div wire:ignore.self>
    @if($currentPage==PAGECREATEFORM)
        @include("livewire.compagnies.create")
    @endif

    @if ($currentPage==PAGEEDITFORM)
        @include("livewire.compagnies.edit")
   @endif

   @if ($currentPage==PAGELIST)
        @include("livewire.compagnies.table")
    @endif

</div>

