
<div class="row p-4 pt-5">
        <div class="card card-primary" style="width:100%">
                <div class="card-header">
                    <h3 class="card-title"><i class="nav-icon fas fa-user fa-lg mr-1"></i>Mise à jour du mot de passe</h3>
                </div>
             <div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                            {{ session('message') }}
                    </div>
                 @endif
            </div>
        <form role= "form" wire:submit.prevent='updateUser()' method="POST">
            @csrf
            
           <div class="card-body" >
                <div class="row">
                        <div class="col-5">
                            <div class="form-group" >
                                <label>Nom</label>
                                <input type="text" wire:model="editUser.nom" class="form-control @error('editUser.nom') is-invalid @enderror" disabled>

                                @error("editUser.nom")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                       <div class="col-5">
                            <div class="form-group" >
                                <label>Prénom (s)</label>
                                <input type="text" wire:model="editUser.prenom" class="form-control @error('editUser.prenom') is-invalid @enderror" disabled>

                                @error("editUser.prenom")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-group" >
                                <label>Sexe</label>
                                <input type="text" wire:model="editUser.sexe" class="form-control @error('editUser.sexe') is-invalid @enderror" disabled>

                                @error("editUser.sexe")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
            </div>
             <div class="row">
                        <div class="col-4">
                            <div class="form-group" >
                                <label>Entreprise</label>
                                <input type="text" wire:model="vClient" class="form-control  @error('vClient') is-invalid @enderror" readonly>

                                @error("vClient")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                       <div class="col-4">
                            <div class="form-group" >
                                <label>Email</label>
                                <input type="text" wire:model="editUser.email" class="form-control @error('editUser.email') is-invalid @enderror" disabled>

                                @error("editUser.email")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group" >
                                <label>Détachement</label>
                                <input type="text" wire:model="vDetachement" class="form-control  @error('vDetachement') is-invalid @enderror" disabled>

                                @error("vDetachement")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
            </div>
             <div class="row">
                        <div class="col-4">
                            <div class="form-group" >
                                <label>Service</label>
                                <input type="text" wire:model="vService" class="form-control @error('vService') is-invalid @enderror" disabled>

                                @error("vService")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group" >
                                <label>Mle</label>
                                <input type="text" wire:model="editUser.matricule" class="form-control @error('editUser.matricule') is-invalid @enderror" disabled>

                                @error("editUser.matricule")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                       <div class="col-3">
                            <div class="form-group" >
                                 <label class="text-success">New password</label>
                                 <input type="password" placeholder="Password" wire:model="vPassword" id="password" class="form-control text-success @error('vPassword') is-invalid @enderror" style="border-color:green;" >

                                 @error("vPassword")
                                    <span class="text-danger">{{ $message }}</span>
                                 @enderror
                            </div>
                        </div>

                         <div class="col-3">
                            <div class="form-group" >
                                 <label class="text-primary">Confirm password</label>
                                 <input type="password" id="confirm_password" placeholder="Confirm password" wire:model="vcPassword" class="form-control text-success @error('vcPassword') is-invalid @enderror" style="border-color: blue;" >

                                 @error("vcPassword")
                                    <span class="text-danger">{{ $message }}</span>
                                 @enderror
                            </div>
                        </div>
                        
            </div>
                
           </div>
           
               <div class="card-footer float-right">
                       <div class="row">
                            @if ($editHasChanged)
                                    <div class="mr-2">
                                        <button type="submit" class="btn btn-primary">Appliquer les modifications</button>
                                    </div>
                            @endif
                                <button type="button" wire:click='goToInfo()' class="btn btn-danger">Retourner</button>     
                        </div>
                </div>
        </form>

    </div>                                 
</div>




