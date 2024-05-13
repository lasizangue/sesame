
    
        <div class="card" style="width:100%">
            <form role="form">
                    @csrf
            <div class="card-header bg-dark ">
                
                <h3 class="card-title d-flex align-items-center flex-grow-1"><i class="far fa-building fa-lg mr-1"></i>Table des compagnies</h3>
                 
            <div class="card-tools d-flex align-items-center">
                
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
                    <th style="width:15%" >ID</th>
                    <th style="width:50%" >Compagnie</th>
                    <th style="width:20%" class="text-center">Ajouté</th>
                    <th style="width:15%" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($compagnis as $compagnie)
                <tr>
                    <td>{{$compagnie->id}}</td>
                    <td>{{$compagnie->nomCompagnie}}</td>
                    <td class="text-center">{{$compagnie->created_at->diffForHumans()}}</td>
                    <td class="text-center">
                    <button class="btn btn-link" wire:click='goToEditCompagnie({{$compagnie->id}})'><i class="far fa-edit"></i></button>
                    <button class="btn btn-link {{evisible()}}" wire:click='confirmDelete({{$compagnie->id}})'><i class="fas fa-trash-alt"></i></button>
                    
                    </td>
                    
                </tr>
                @endforeach

            </tbody>
            </table>
        </div> 
    </div>
    
<script>
  window.addEventListener("showConfirmMessage",event=>{
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
               const compagnie_id = event.detail.message.data.compagnie_id
            if(compagnie_id){
                @this.deleteCompagnie(compagnie_id)
            }
          }
          })
        })
   </script>

   <script>
            window.addEventListener("showMessageDeleteCompagnie",event=>{
            Swal.fire({
                position: 'top-end',
                icon:"success",
                title: event.detail.message || "Opération effectuée avec succès!",
                showConfirmButton: false,
                timer: 1500
        })
        })

   </script>

    

 

    

    

   