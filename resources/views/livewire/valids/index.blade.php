@section("titre")
     Tirage des dossiers - Transit général rapide
@endsection
<div wire:ignore.self>
 
   @if ($currentPage==PAGEEDITFORM)
        @include("livewire.valids.edit")
   @endif

   @if ($currentPage==PAGELIST)
        @include("livewire.valids.liste")
    @endif

</div>