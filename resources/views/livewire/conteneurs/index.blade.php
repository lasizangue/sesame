@section("titre")
    Gestion des conteneurs - Transit général rapide
@endsection

<div wire:ignore.self>
     @if($currentPage==PAGECREATEFORM)
        @include("livewire.conteneurs.create")
    @endif

    @if ($currentPage==PAGEEDITFORM)
        @include("livewire.conteneurs.edit")
   @endif

   @if ($currentPage==PAGELIST)
        @include("livewire.conteneurs.table")
    @endif

    @if ($currentPage==PAGEEDITCONT)
        @include("livewire.conteneurs.editcont")
    @endif

</div>







