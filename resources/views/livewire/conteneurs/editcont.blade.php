<div class="row p-4 pt-5">
        <div class="card card-primary" style="width: 100%">
                <div class="card-header">
                    <h3 class="card-title"><i class="far fa-building fa-lg mr-1"></i>Edition d'un conteneur</h3>
                </div>
        <form role= "form" wire:submit.prevent='updateConteneur()' method="POST">
            @csrf
            @if (session()->has('message'))
                    <div class="alert alert-success">
                              {{ session('message') }}
                    </div>
           @endif
            <div class="card-body">
                    <div class="row">
                       <div class="col-4">
                              <div class="form-group">
                                    <label>N°Dossier</label>
                                    <select name="ndossier" id="ndossier" wire:model="editConteneur.dossier_id" class="form-control @error('editConteneur.dossier_id') is-invalid
                                    @enderror" disabled>
                                        <option value="">---------</option>
                                    @foreach($dossiers as $dossier)
                                        <option value="{{$dossier->id}}">{{$dossier->numDossier}}</option>
                                    @endforeach
                                    </select>

                                    @error("editConteneur.dossier_id")
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                    
                              </div>
                        </div>

                        <div class="col-5">
                              <div class="form-group">
                            <label>Numéro conteneur</label>
                            <input type="text" wire:model="editConteneur.numTc" class="form-control @error('editConteneur.numTc') is-invalid
                            @enderror" onkeyup="this.value=this.value.toUpperCase()">

                            @error("editConteneur.numTc")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    
                        </div>
                        </div>

                        <div class="col-3">
                              <div class="form-group">
                            <label>Type Tc</label>
                            <select name="typetc" id="typetc" wire:model="editConteneur.typeTc" class="form-control @error('editConteneur.typeTc') is-invalid
                                    @enderror">
                            <option value="">---------------</option>
                            <option value="Tc 20'">Tc 20'</option>
                            <option value="Tc 40'">Tc 40'</option>
                            </select>

                            @error("editConteneur.typeTc")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    
                        </div>
                        </div>
                    </div>
                
            </div>

            <div class="card-footer float-right">
                <button type="submit" class="btn btn-primary">Appliquer les modifications</button>
                <button type="button" wire:click.prevent="goToTableConsul()" class="btn btn-danger">Retourner à la table des conteneurs</button>
             </div>

        </form>
    </div>
</div>


