@section("titre")
    Gestion des cotations - Transit général rapide
@endsection

<div wire:ignore.self>
     
    @if ($currentPage==PAGEEDITFORM)
        @include("livewire.cotations.edit")
   @endif

</div>