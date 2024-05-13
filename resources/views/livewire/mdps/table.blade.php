
<div class="row p-4 pt-5">
    
        <div class="card w-100">
            <div class="card-header bg-primary">
                <h3 class="card-title d-flex align-items-center flex-grow-1"><i class="nav-icon fas fa-user fa-2x  mr-2 "></i>Informations utilisateur</h3>
           </div>

        <div class="card-body table-responsive p-0 table-striped" style="height: 300px;">
            <table class="table table-head-fixed text-nowrap">
            <thead>
                <tr>
                    <th style="width:15%" >Nom</th>
                    <th style="width:20%" >Prénom (s)</th>
                    <th style="width:5%" >Sexe</th>
                    <th style="width:10%" >Matricule</th>
                    <th style="width:20%" >Email</th>
                    <th style="width:15%" >Détachement</th>
                    <th style="width:10%" >Service</th>
                    <th style="width:5%" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
              
                <tr>
                    <td>{{auth()->user()->nom}}</td>
                    <td>{{auth()->user()->prenom}}</td>
                    <td>{{auth()->user()->sexe}}</td>
                    <td>{{auth()->user()->matricule}}</td>
                    <td>{{auth()->user()->email}}</td>
                    <td>{{auth()->user()->detachement->nomDetachement}}</td>
                    <td>{{auth()->user()->service->nomService}}</td>
                    <td class="text-center">
                        <button  class="btn btn-link" wire:click='goToEditUser({{auth()->user()->id}})' ><i class="far fa-edit"></i></button>
                    </td>
                </tr>
            </tbody>
            </table>
        </div>

        <div class="card-footer">
                <div class="float-right">
                    <button  wire:click.prevent='retour()' type="button" class="btn btn-danger  mr-4 d-block">Retour</button>
                </div>
                     
        </div>

    </div>
    
</div>


<script>
            window.addEventListener("showSuccesMessageEdit",event=>{
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
    window.addEventListener("showSuccessMessage",event=>{
       Swal.fire({
  position: 'top-end',
  icon:"success",
  title: event.detail.message || "Opération effectuée avec succès!",
  showConfirmButton: false,
  timer: 2000
})
 })

</script>
