
<div class="row p-4 pt-5">

    <div class="col-12">
        <div class="card">
            <form role="form">
                    @csrf
            <div class="card-header bg-primary">
                <h3 class="card-title d-flex align-items-center flex-grow-1"><i class="fas fa-users fa-2x mr-1"></i>Table des utilisateurs</h3>
            <div class="card-tools d-flex align-items-center">
           
                <a wire:click.prevent="imprimeListe()" class="btn btn-link text-white mr-4"><i class="fas fa-print fa-lg text-white mr-1"></i>Imprimer</a>
                
                <a class="btn btn-link text-white mr-4 d-block" wire:click.prevent="ajoutUser()"><i class="fas fa-user-plus mr-1"></i>Nouvel utilisateur</a>
                <div class="input-group input-group-sm" style="width: 250px;">
                    <input type="text" name="table_search" wire:model.debounce="search" class="form-control float-right" placeholder="Search">
                    <div class="input-group-append">

                        <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        </form>
        
        <div class="card-body table-responsive p-0 table-striped" style="height: 300px;">
            <table class="table table-head-fixed text-nowrap">
            <thead>
                <tr>
                    <th style="width:5%" ></th>
                    <th style="width:30% " >Utilisateur</th>
                    <th style="width:20%" >Détachement</th>
                    <th style="width:20%" >Service</th>
                    <th style="width:15%" class="text-center">Ajouté</th>
                    <th style="width:10%" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>
                        @if($user->sexe=="F") <img src="{{ Vite::asset('resources/images/femme.png') }} " width="24">
                        @endif

                        @if($user->sexe=="M") <img src="{{ Vite::asset('resources/images/homme.png') }} " width="24">
                        @endif

                    </td>
                    <td>{{$user->nom}} {{$user->prenom}}</td>
                    <td>{{$user->detachement->nomDetachement}}</td>
                    <td>{{$user->service->nomService}}</td>
                    <td class="text-center">{{$user->created_at->diffForHumans()}}</td>
                    <td class="text-center">
                    <button class="btn btn-link" wire:click='goToEditUser({{$user->id}})'><i class="far fa-edit"></i></button>
                    <button class="btn btn-link" wire:click="confirmDelete({{$user->id}})"><i class="fas fa-trash-alt" ></i></button>
                    </td>
                    
                </tr>
                @endforeach

            </tbody>
            </table>
        </div>
            <div class="card-footer">
            
                <div class="float-right">
                    {{$users->links()}}
                </div>
                    
            </div>
        </div>
    </div>
    </div>

   <script>
    window.addEventListener("showMessageReset",event=>{
       Swal.fire({
  position: 'top-end',
  icon:"success",
  title: event.detail.message || "Opération effectuée avec succès!",
  showConfirmButton: false,
  timer: 1500
})
 })

</script>

<script>
  window.addEventListener("showConfirmReset",event=>{
     Swal.fire({
          title: event.detail.message.title,
          text: event.detail.message.text,
          icon: event.detail.message.type,
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Continuer',
          cancelButtonText: 'Annuler'
          }).then((result) => {
          if (result.isConfirmed) {
               const user_id = event.detail.message.data.user_id
            if(user_id){
                @this.resetPassword(user_id)
            }
          }
          })
        })
   </script>
