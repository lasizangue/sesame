@section("titre")
     Service opérationnel - Transit général rapide
@endsection
<div wire.ignore.self>

   @if ($currentPage==PAGECREATEFORM)
        @include("livewire.operationnels.create")
   @endif

   @if ($currentPage==PAGEEDITFORM)
        @include("livewire.operationnels.edit")
   @endif

   @if ($currentPage==PAGELIST)
        @include("livewire.operationnels.liste")
    @endif
    
</div>
