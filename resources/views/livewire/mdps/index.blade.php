@section("titre")
    Password - Transit général rapide
@endsection
<div wire:ignore.self>
   @if ($currentPage==PAGELIST)
        @include("livewire.mdps.table")
   @endif

   @if ($currentPage==PAGEEDITFORM)
        @include("livewire.mdps.edit")
   @endif

</div>
