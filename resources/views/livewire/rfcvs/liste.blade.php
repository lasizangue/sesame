
<div class="row p-4 pt-5">
    <div class="col-12">
        <div class="card">
            <form role="form">

            <div class="card-header bg-primary">
                <h3 class="card-title d-flex align-items-center flex-grow-1"><i class="fas fa-book fa-lg"> DOCUMENTATION : RFCV - FDI</i></h3>
                 
            <div class="card-tools d-flex align-items-center">
                
                    <div class="input-group input-group-sm" style="width: 250px;">
                       
                        <input autocomplete="on" name="table-search"  wire:model="search" style="text-transform: uppercase;" placeholder="n°dossier">

                        <div class="input-group-append" >
                                <button type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                        </div>

                    </div>
                
            </div>
        </div>
        </form>

        <div class="card-body table-responsive p-0 table-hover" style="height: 500px;">
        
            <div class="mt-3 mb-3 ml-5 " style="display: inline-block; width:200px; vertical-align: top;">
                <label class="mr-4"><input type="radio" wire:model="rfcvFdi" value="r"> RFCV</label>
                <label><input type="radio" wire:model="rfcvFdi" value="f"> FDI</label>
            </div>
            
            
            @if ($rfcvFdi=="r")
           
                <h4  class="mt-2 text-primary" style="display: inline-block; vertical-align: top;"><U>Gestion des RFCVs</U></h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                @if($showButtonRfcv==false)
                        <div class="mt-2" style="display: inline-block; vertical-align: top;">
                            
                                <button  type="button" wire:click="ajoutRfcv()" data-bs-toggle="modal" data-bs-target="#modalAdd"  class="btn btn-primary">Créer RFCV</button>
                        
                        </div>
                @endif
            <table class="table table-head-fixed text-nowrap">
            <thead>
                <tr>
                    <th style="width:10%" >N°Dossier</th>
                    <th style="width:14%" class="text-primary" >Rfcv soumis le</th>
                    <th style="width:14%" class="text-primary" >N°TC</th>
                    <th style="width:14%" class="text-primary" >Rfcv validé le</th>
                    <th style="width:14%" class="text-primary" >N°Rfcv</th>
                    <th style="width:8%"  class="text-primary" >Statut</th>
                    <th style="width:16%" class="text-primary" >Motif annulation</th>
                    <th style="width:10%" >Document</th>
                   
                </tr>
            </thead>
            <tbody>
                @foreach($rfcvs as $rfcv)
                <tr >
                    @if ($rfcv->dossier->dateCotation!=null)
                        <td >{{$rfcv->dossier->numDossier}}</td>
                        <td class="text-primary">@if ($rfcv->dateRfcvSou!="")
                                {{Carbon\Carbon::parse($rfcv->dateRfcvSou)->format('d-m-Y')}}
                            @else
                                {{null}}
                            @endif
                        </td>
                        <td class="text-primary text-uppercase">
                                {{$rfcv->numRfcvSoumi}}
                        </td>
                         <td class="text-primary">@if($rfcv->dateRfcvVal!="")
                                {{Carbon\Carbon::parse($rfcv->dateRfcvVal)->format('d-m-Y')}}
                            @else
                                {{null}}
                            @endif
                        </td>
                        <td class="text-primary text-uppercase">
                                {{$rfcv->numRfcvValide}}
                        </td>
                         <td @if ($rfcv->statut=="Non validé")
                             class="text-primary"
                         @endif
                         @if ($rfcv->statut=="Validé")
                             class="text-success"
                         @endif
                         @if ($rfcv->statut=="Annulé")
                             class="text-danger"
                         @endif>
                                {{$rfcv->statut}}
                        </td>
                        
                        <td class="text-primary">
                                {{$rfcv->rfcvAnnuleMotif}}
                        </td>
                        <td>
                            <div class="btn-group">
                                    <button type="button" class="btn btn-primary">Rfcv</button>
                                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" role="menu">
                                            <a class="dropdown-item btn btn-link text-primary" wire:click="rfcvSoumi({{$rfcv->id}})">Soumission</a>
                                            <a class="dropdown-item btn btn-link text-primary" wire:click="rfcvValide({{$rfcv->id}})">Validation</a>
                                            <a class="dropdown-item btn btn-link text-primary"wire:click="rfcvAnnul({{$rfcv->id}})">Annulation</a>
                                            <a class="dropdown-item btn btn-link text-primary {{evisible()}}"wire:click="rfcvConfDelete({{$rfcv->id}})">Suppression</a>
                                            
                                        </div>
                            </div>
                            
                         </td>
                    @endif
                </tr>
                @endforeach

            </tbody>
            </table>
                
            @endif

            @if ($rfcvFdi=="f")

                <h4  class="mt-2 text-success" style="display: inline-block; vertical-align: top;"><U>Gestion des FDIs</U></h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           @if($showButtonFdi==false)
                <div class="mt-2" style="display: inline-block; vertical-align: top;">
                    <button type="button" wire:click="ajoutFdi()" data-bs-toggle="modal" data-bs-target="#modalAddFdi"  class="btn btn-success">Créer FDI</button>
                </div>
             @endif
        
            <table class="table table-head-fixed text-nowrap">
            <thead>
                <tr>
               
                    <th style="width:14%" >N°Dossier</th>
                    <th style="width:14%" class="text-success" >FDI soumis le</th>
                    <th style="width:14%" class="text-success" >N°TC</th>
                    <th style="width:14%" class="text-success" >FDI validé le</th>
                    
                    <th style="width:10%"  class="text-success" >Statut</th>
                    <th style="width:20%" class="text-success" >Motif annulation</th>
                    <th style="width:14%" >Document</th>
                   
                </tr>
            </thead>
            <tbody>
                @foreach($fdis as $fdi)
                <tr >
                    @if ($fdi->dossier->dateCotation!=null)
                        <td >{{$fdi->dossier->numDossier}}</td>
                        <td class="text-success">@if ($fdi->dateFdiSou!="")
                                {{Carbon\Carbon::parse($fdi->dateFdiSou)->format('d-m-Y')}}
                            @else
                                {{null}}
                            @endif
                        </td>
                        <td class="text-success">
                                {{$fdi->numFdiSoumi}}
                        </td>
                         <td class="text-success">@if($fdi->dateFdiVal!="")
                                {{Carbon\Carbon::parse($fdi->dateFdiVal)->format('d-m-Y')}}
                            @else
                                {{null}}
                            @endif
                        </td>

                         <td @if ($fdi->statut=="Non validé")
                             class="text-success"
                         @endif
                         @if ($fdi->statut=="Validé")
                             class="text-primary"
                         @endif
                         @if ($fdi->statut=="Annulé")
                             class="text-danger"
                         @endif>
                                {{$fdi->statut}}
                        </td>
                        <td class="text-success">
                                {{$fdi->fdiAnnuleMotif}}
                        </td>
                        
                        <td>
                            <div class="btn-group">
                                    <button type="button" class="btn btn-success">Fdi</button>
                                        <button type="button" class="btn btn-success dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" role="menu">
                                            <a class="dropdown-item btn btn-link text-success" wire:click="fdiSoumi({{$fdi->id}})">Soumission</a>
                                            <a class="dropdown-item btn btn-link text-success" wire:click="fdiValide({{$fdi->id}})">Validation</a>
                                            <a class="dropdown-item btn btn-link text-success" wire:click="fdiAnnul({{$fdi->id}})">Annulation</a>
                                            <a class="dropdown-item btn btn-link text-success {{evisible()}}" wire:click="fdiConfDelete({{$fdi->id}})">Suppression</a>
                                                     
                                        </div>
                            </div> 
                         </td>
                    @endif
                </tr>
                @endforeach

            </tbody>
            </table>
                
            @endif
                  
         </div>
         
           <div class="mb-2 ml-2 text-left">
                    
           </div>
         
        </div>
        </div>
    </div>

    @include('livewire.rfcvs.add')
    @include('livewire.rfcvs.addFdi')

    <script>
            window.addEventListener("showMessageEdit",event=>{
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
            window.addEventListener("showMessageDeleteFdi",event=>{
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
            window.addEventListener("showMessageEditFdi",event=>{
            Swal.fire({
                position: 'top-end',
                icon:"success",
                title: event.detail.message || "Opération effectuée avec succès!",
                showConfirmButton: false,
                timer: 1500
        })
        })

   </script>
   

 

    

    

   