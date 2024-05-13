
<div class="row p-4 pt-5" >
        <div class="card card-primary" style="width:100%">
                <div class="card-header ">
                    <h3 class="card-title"><i class="fas fa-pencil-alt fa-lg mr-1"></i>Saisie des conteneurs</h3>
                </div>
        <form role= "form" wire:submit.prevent='addConteneur()' >
            @csrf
            <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label>N°Dossier</label>
                            <input type="text" wire:model="numeroDossier" class="form-control" disabled>
                    
                        </div>
                    </div>

                    <div class="col-5">
                        <div class="form-group">
                            <label>Numéro conteneur</label>
                            <input type="text" wire:model="newConteneur.numTc" class="form-control @error('newConteneur.numTc') is-invalid
                            @enderror" onkeyup="this.value=this.value.toUpperCase()">

                            @error("newConteneur.numTc")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="form-group">
                            <label>Type Tc</label>
                            <select wire:model="newConteneur.typeTc" class="form-control @error('newConteneur.typeTc') is-invalid
                                    @enderror">
                            <option value="">---------------</option>
                            <option value="Tc 20'">Tc 20'</option>
                            <option value="Tc 40'">Tc 40'</option>
                            </select>

                            @error("newConteneur.typeTc")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    
                        </div>
                    </div>

                </div>
            </div>

            <div class="card-footer float-right">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <button type="button" wire:click.prevent="goToTableConsul()" class="btn btn-danger">Retourner à la table des conteneurs</button>
             </div>

        </form>
    </div>
</div>



           

