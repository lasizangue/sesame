@section("titre")
    Etat ordre de livraison - Transit général rapide
@endsection
<div wire:ignore.self>
     @if($currentPage==PAGECREATEFORM)
        @include("livewire.ordres.create")
    @endif

    @if ($currentPage==PAGEEDITFORM)
        @include("livewire.ordres.edit")
   @endif

   @if ($currentPage==PAGELIST)
        @include("livewire.ordres.liste")
    @endif

</div>

 