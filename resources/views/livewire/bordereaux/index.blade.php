@section("titre")
     Gestion de la livraison - Transit général rapide
@endsection

<div wire:ignore.self>
     
   @if ($currentPage==PAGECREATEFORM)
        @include("livewire.bordereaux.create")
   @endif

   @if ($currentPage==PAGEEDITFORM)
        @include("livewire.bordereaux.edit")
   @endif

   @if ($currentPage==PAGELIST)
        @include("livewire.bordereaux.table")
    @endif

</div>




