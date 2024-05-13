<div class="row p-4 pt-5">
        <div class="card card-primary" style="width: 100%">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-user-plus mr-1"></i>Mise à jour d'un utilisateur</h3>
                    </div>
            <form role= "form" wire:submit.prevent='updateUser()'method="POST">
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
                        <div class="col-9">
                                    <div class="form-group">
                                        <label>Nom</label>
                                        <input type="text" wire:model="editUser.nom" class="form-control @error('editUser.nom') is-invalid
                                         @enderror" onkeyup="this.value=this.value.toUpperCase()">

                                        @error("editUser.nom")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                        <div class="col-3 ">
                            <div><button wire:click.prevent='confirmReset({{ $editUser["id"] }})' type="button" class="btn btn-success float-right">Reset password</button></div>
                           
                        </div>
                                
                    </div>
                   
                    <div class="form-group">
                    <label>Prénom</label>
                    <input type="text" wire:model="editUser.prenom" class="form-control @error('editUser.prenom') is-invalid
                    @enderror" onkeyup="this.value=this.value.toUpperCase()">

                    @error("editUser.prenom")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label>Sexe</label>
                        <select wire:model="editUser.sexe" class="form-control @error('editUser.sexe') is-invalid
                     @enderror">
                        <option value="">---------</option>
                        <option value="F">Féminin</option>
                        <option value="M">Masculin</option>
                        </select>

                        @error("editUser.sexe")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-3">
                    <div class="form-group">
                        <label>Type</label>
                        <select wire:model="vTypeEdit" class="form-control">
                        <option value="">---------</option>
                        <option value="Interne">Interne</option>
                        <option value="Externe">Externe</option>
                        </select>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label>Entreprise</label>
                        <select name="clientEd" id="clientEd" wire:model="vClient_idEdit" class="form-control @error('vClient_idEdit') is-invalid
                         @enderror">
                             <option value="">---------</option>
                        @foreach($clients as $client)
                            <option value="{{$client->id}}">{{$client->raisonSocial}}</option>
                        @endforeach
                        </select>

                        @error("vClient_idEdit")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    
                    </div>
                </div>
            </div>
                
        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    <label>Matricule</label>
                    <input type="text" wire:model="editUser.matricule" class="form-control @error('editUser.matricule') is-invalid
                    @enderror" onkeyup="this.value=this.value.toUpperCase()">

                    @error("editUser.matricule")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-9">
                    <div class="form-group">
                    <label>Adresse email</label>
                    <input type="text" wire:model="editUser.email" class="form-control @error('editUser.email') is-invalid
                    @enderror">

                    @error("editUser.email")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    
                </div>
            </div>
        </div>
                
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label>Détachement</label>
                    <select name="detachement" id="detachement" wire:model="editUser.detachement_id" class="form-control @error('editUser.detachement_id') is-invalid
                    @enderror">
                             <option value="">---------</option>
                        @foreach($detachements as $detachement)
                            <option value="{{$detachement->id}}">{{$detachement->nomDetachement}}</option>
                        @endforeach
                    </select>

                    @error("editUser.detachement_id")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Service</label>
                    <select name="service" id="service" wire:model="editUser.service_id" class="form-control @error('editUser.service_id') is-invalid
                    @enderror">
                             <option value="">---------</option>
                        @foreach($services as $service)
                            <option value="{{$service->id}}">{{$service->nomService}}</option>
                        @endforeach
                    </select>

                    @error("editUser.service_id")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>  

     </div>

            <div class="card-footer float-right">
 
                <button type="submit" class="btn btn-primary">Enregistrer les informations</button>
                <button type="button" wire:click.prevent="goToTableUsers()" class="btn btn-danger">Retourner à la table des utilisateurs</button>
    
            </div>
        </div>

        </form>
    </div>
</div>


