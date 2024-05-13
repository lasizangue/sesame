<div class="row p-4 pt-5">
        <div class="card card-primary" style="width: 100%">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-user-plus mr-1"></i>Création d'un nouvel utilisateur</h3>
                    </div>
            <form role= "form" wire:submit.prevent='addUser()' method="POST">
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
                        <div class="col-6">
                             <div class="form-group">
                                <label>Password</label>
                                <input type="password" wire:model="newUser.password" class="form-control @error('newUser.password') is-invalid
                                @enderror" required autocomplete="current-password" placeholder="Password" disabled>
  
                                @error("newUser.password")
                                    <span class="text-danger">{{ $message }}</span>
                                 @enderror
                            </div>
                        </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Nom</label>
                                        <input type="text" wire:model="newUser.nom" class="form-control @error('newUser.nom') is-invalid
                                         @enderror" onkeyup="this.value=this.value.toUpperCase()">

                                        @error("newUser.nom")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                    </div>
                   
                    <div class="form-group">
                    <label>Prénom</label>
                    <input type="text" wire:model="newUser.prenom" class="form-control @error('newUser.prenom') is-invalid
                    @enderror" onkeyup="this.value=this.value.toUpperCase()">

                    @error("newUser.prenom")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label>Sexe</label>
                        <select wire:model="newUser.sexe" class="form-control @error('newUser.sexe') is-invalid
                     @enderror">
                        <option value="">---------</option>
                        <option value="F">Féminin</option>
                        <option value="M">Masculin</option>
                        </select>

                        @error("newUser.sexe")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-3">
                    <div class="form-group">
                    <label>Type</label>
                    <input type="text" wire:model="vType" class="form-control @error('vType') is-invalid
                    @enderror" disabled>
                        
                        @error("vType")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label>Client</label>
                        <select name="client" id="client" wire:model="vClient_id" class="form-control @error('vClient_id') is-invalid
                         @enderror">
                             <option value="">---------</option>
                        @foreach($clients as $client)
                            <option value="{{$client->id}}">{{$client->raisonSocial}}</option>
                        @endforeach
                        </select>

                        @error("vClient_id")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    
                    </div>
                </div>
            </div>
                
        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    <label>Matricule</label>
                    <input type="text" wire:model="newUser.matricule" class="form-control @error('newUser.matricule') is-invalid
                    @enderror" onkeyup="this.value=this.value.toUpperCase()">

                    @error("newUser.matricule")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-9">
                    <div class="form-group">
                    <label>Adresse email</label>
                    <input type="text" wire:model="newUser.email" class="form-control @error('newUser.email') is-invalid
                    @enderror">

                    @error("newUser.email")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    
                </div>
            </div>
        </div>
                
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label>Détachement</label>
                    <select name="detachement" id="detachement" wire:model="newUser.detachement_id" class="form-control @error('newUser.detachement_id') is-invalid
                    @enderror">
                             <option value="">---------</option>
                        @foreach($detachements as $detachement)
                            <option value="{{$detachement->id}}">{{$detachement->nomDetachement}}</option>
                        @endforeach
                    </select>

                    @error("newUser.detachement_id")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Service</label>
                    <select name="service" id="service" wire:model="newUser.service_id" class="form-control @error('newUser.service_id') is-invalid
                    @enderror">
                             <option value="">---------</option>
                        @foreach($services as $service)
                            <option value="{{$service->id}}">{{$service->nomService}}</option>
                        @endforeach
                    </select>

                    @error("newUser.service_id")
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

