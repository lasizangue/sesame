<div wire:ignore.self>
    {{-- Do your work, then step back. --}}
   @if ($routeActuel=='new')
          @include("livewire.notifications.new")
   @endif

   @if ($routeActuel=='all')
        @include("livewire.notifications.all")
   @endif

   @if ($ind==true && $indouv==true)
     @include("livewire.notifications.notify")
   @endif

    
</div>