<div class="row ml-4" >
          <h1 class="text-success  mt-4">Validation des dossiers</h1>   
  </div>
    <div class="row ml-4 mt-2">
        
        <div class="col-12 ">
            <form role="form">
                    @csrf
               <div class="input-group" style="width: 95%;">
                    <input type="text" wire:model="find" class="form-control form-control-lg" placeholder="Recherche n°dossier à valider" style="border:solid 2px; border-color:green; font-style:italic;">
            
                    <div class="input-group-append">
                       @if ($this->champVide!=true)
                          @if($this->dossierTrouve==true)
                                @if($this->dejaCote==true)
                                    @if($dejaValide==false)
                                     @if($showButtonValid==false) 
                                            <button  wire:click.prevent='rechercheDossierAvalide()'  data-bs-toggle="modal" data-bs-target="#modalVal"  class="btn btn-success">
                                            <i class="fa fa-search"></i>
                                            </button>
                                        @endif
                                        @else
                                            <button  wire:click.prevent='rechercheDossierAvalide()'    class="btn btn-success">
                                            <i class="fa fa-search"></i>
                                            </button>
                                        @endif
                                    @else
                                        <button  wire:click.prevent='rechercheDossierAvalide()'    class="btn btn-success">
                                                <i class="fa fa-search"></i>
                                        </button>
                                @endif
                            @else
                                   <button  wire:click.prevent='rechercheDossierAvalide()'    class="btn btn-success">
                                    <i class="fa fa-search"></i>
                                    </button>
                            @endif
                       @else
                            <button  wire:click.prevent='rechercheDossierAvalide()'    class="btn btn-success">
                                    <i class="fa fa-search"></i>
                                    </button>
                       @endif 
                                
                    </div>
                
                </div>
        </div>
       </form> 
</div>
<div class="row ml-4 mt-4">
     
        <div class="card" style="width:95%">
            <form role="form">
                    @csrf
            <div class="card-header bg-success">
            <div class="card-tools d-flex align-items-center float-left">
            <i class="nav-icon fas fa-folder-plus fa-lg mr-5 ml-0"> Liste des dossiers validés</i>
                <a wire:click.prevent="imprimeListeValide()" class="btn btn-link text-white mr-5"><i class="fas fa-print fa-lg text-white mr-1"></i>Imprimer</a>
                
                <div class="input-group input-group-sm" style="width: 300px;">
                    <input type="text" name="table_searchValid" wire:model="search" class="form-control form-control-lg" placeholder="Search" style="border:solid 2px; border-color:white;">

                    <div class="input-group-append">

                         <button class="btn btn-lg btn-default mr-2">
                        <i class="fa fa-search"></i>
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
                    <th style="width:15%" >N°Dossier</th>
                    <th style="width:10%" >Type</th>
                    <th style="width:25%" >Client</th>
                    <th style="width:10%" >N°Déclaration</th>
                    <th style="width:15%" class="text-center" >Tiré le</th>
                    <th style="width:10%" >Circuit</th>
                    <th style="width:15%" class="text-center">Action</th>
                </tr>
            </thead>
           
            <tbody>
             
                @foreach($dossiers as $dossier)
                    @if ($dossier->dateValidation!=null)
                        <tr>
                    <td>{{$dossier->numDossier}}</td>
                    <td>{{$dossier->typeDossier}}</td>
                    <td>{{$dossier->client->raisonSocial ?? 'not found'}}</td>
                    <td>{{$dossier->numDeclaration}}</td>
                    
                    <td class="text-center"> 
                     
                        {{Carbon\Carbon::parse($dossier->dateValidation)->format('d-m-Y') }} 

                    </td>
                    
                    <td>{{$dossier->circuit}}</td>
                    
                    <td class="text-center">
                
                    <button  class="btn btn-link " wire:click='goToEditDossier({{$dossier->id}})' ><i class="far fa-edit"></i></button>

                    </td>
                   
                </tr>
                    @endif
          
                @endforeach
            </tbody>
            </table>
        </div>

        <div class="card-footer">
                
                <div class="float-right">
                
                </div>
                       
        </div>

    </div>
    
</div>

 @include('livewire.valids.val')

<script>
            window.addEventListener("showSuccesAucun",event=>{
            Swal.fire({
                position: 'top-end',
                icon:"success",
                title: event.detail.message || "Opération effectuée avec succès!",
                showConfirmButton: false,
                timer: 2000
        })
        })
   </script>

   <script>
            window.addEventListener("showSuccesValide",event=>{
            Swal.fire({
                position: 'top-end',
                icon:"success",
                title: event.detail.message || "Opération effectuée avec succès!",
                showConfirmButton: false,
                timer: 2000
        })
        })
   </script>

   <script>
            window.addEventListener("showMessageVide",event=>{
            Swal.fire({
                position: 'top-end',
                icon:"success",
                title: event.detail.message || "Opération effectuée avec succès!",
                showConfirmButton: false,
                timer: 2000
        })
        })
   </script>

   <script>
            window.addEventListener("showNonCote",event=>{
            Swal.fire({
                position: 'top-end',
                icon:"success",
                title: event.detail.message || "Opération effectuée avec succès!",
                showConfirmButton: false,
                timer: 2000
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
                timer: 2000
        })
        })
   </script>

   