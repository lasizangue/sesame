@section("titre")
     Service aérien - Transit général rapide
@endsection

<div wire:ignore.self>

  @if ($currentPage==PAGECREATEFORM)
        @include("livewire.saisies.create")
   @endif

   @if ($currentPage==PAGEEDITFORM)
        @include("livewire.saisies.edit")
        
   @endif

   @if ($currentPage==PAGELIST)
        @include("livewire.saisies.liste")
    @endif

</div>