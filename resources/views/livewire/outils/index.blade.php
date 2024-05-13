@section("titre")
    Maintenance - Transit général rapide
@endsection

<div wire:ignore.self>
   
    @if ($vapro==true)
        @include("livewire.outils.liste")
    @endif

    @if ($vrecup==true)
        @include("livewire.outils.liste")
    @endif

     @if ($vlog==true)
        @include("livewire.outils.liste")
    @endif

</div>

