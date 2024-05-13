
<div class="row p-4 pt-5">
    
        <div class="card w-100" >
             <form role="form">
                @csrf
            <div class="card-header bg-primary">
                <h3 class="card-title d-flex align-items-center flex-grow-1"><i class="nav-icon fas fa-folder-plus fa-lg mr-1"></i>Liste des dossiers</h3>
            <div class="card-tools d-flex align-items-center">
                <a wire:click.prevent="imprimeListe()" class="btn btn-link text-white mr-4"><i class="fas fa-print fa-lg text-white mr-1"></i>Imprimer</a>

                @if ($showButtonCreate==false)
                    <a class="btn btn-link  text-white mr-4 d-block" wire:click.prevent="ajoutDossier()" data-bs-toggle="modal" data-bs-target="#modalAdd"><i class="fas fa-plus mr-1"></i>Nouveau dossier</a>
                @endif
                
                <div class="input-group input-group-md" style="width: 250px;">
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

        <div class="card-body table-responsive p-0 table-striped table-hover" style="height: 300px;">
            <table class="table table-head-fixed text-nowrap">
            <thead>
                <tr>
                    <th style="width:10%" >N°Dossier</th>
                    <th style="width:25%" >Client</th>
                    <th style="width:10%" >Connaissement</th>
                    <th style="width:10%" >Nombre colis</th>
                    <th style="width:20%" >Régime</th>
                    <th style="width:15%" class="text-center" >Ouvert le</th>
                    <th style="width:10%" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
              @if ($dossierTrouve)
                @foreach($dossiers as $dossier)
                <tr>
                    <td>{{$dossier->numDossier}}</td>
                    <td>{{$dossier->libClient}}</td>
                    <td>{{$dossier->connaissement}}</td>
                    <td>{{$dossier->nbreColis}}</td>
                    <td>{{$dossier->regimeDouanier}}</td>
                    <td class="text-center">
                         @if ($dossier->dateOuverture!="")
                            {{Carbon\Carbon::parse($dossier->dateOuverture)->format('d-m-Y') }}
                        @else
                            {{null}}
                        @endif
                    </td>
                    <td class="text-center">
                
                    <button  class="btn btn-link " wire:click='goToEditDossier({{$dossier->id}})' ><i class="far fa-edit"></i></button>

                    <button class="btn btn-link {{ evisible() }}" wire:click="confirmDelete({{$dossier->id}})"><i class="fas fa-trash-alt" ></i></button>

                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="9" ><h1 class="badge bg-success">Aucun résultat trouvé ! Merci.</h1></td>
                </tr>
                @endif
                
            </tbody>
            </table>
        </div>

        <div class="card-footer">
               
                <div class="float-right">
                    {{$dossiers->links()}}
                </div>       
        </div>
    </div>
</div>
@include('livewire.dossiers.add')

 <script>
    window.addEventListener("showMessageCreate",event=>{
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

   

