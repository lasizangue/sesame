 <h4>Récupération de données</h4>
 <div>
    <button type="button"  class="btn btn-info" wire:click.prevent='pageClient()'>Clients</button>
    <button type="button"  class="btn btn-info" wire:click.prevent='pageCompagnie()'>Compagnies</button>
</div>

@if ($vcli==true)
    @include("livewire.outils.client")
@endif
@if ($vcomp==true)
    @include("livewire.outils.compagnie")
@endif