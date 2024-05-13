

@if ($rfcvSoumi==true)
    @include('livewire.rfcvs.rfcvSoumi')
@endif

@if ($rfcvValide==true)
    @include('livewire.rfcvs.rfcvValide')
@endif

@if ($rfcvAnnul==true)
    @include('livewire.rfcvs.rfcvAnnul')
@endif

{{-- INCLURE LA FDI --}}

@if ($fdiSoumi==true)
    @include('livewire.rfcvs.fdiSoumi')
@endif

@if ($fdiValide==true)
    @include('livewire.rfcvs.fdiValide')
@endif

@if ($fdiAnnul==true)
    @include('livewire.rfcvs.fdiAnnul')
@endif




