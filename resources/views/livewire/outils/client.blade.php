<h5 class="mt-2"><u>Table des clients</u></h5>

<form role= "form" wire:submit.prevent='import()' method="POST">
            @csrf
 <div class="row">
          <div class="col-6">
              <label class="form-label">Excel file @if ($nbreElements!=0)
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-danger">Nombre d'éléments importés : {{ $nbreElements }}</span>
              @endif</label>
              
              <input type="file" class="form-control @error('file') is-invalid @enderror" wire:model='file'>
              <small>Note<b class="text-danger">*</b>: Type file xlsx, xls</small>
              <div class="text-success" wire:loading>
                Chargement du fichier en cours...
              </div>
              <div>@error("file")
                        <span class="text-danger">{{ $message }}</span>
              @enderror</div>
          </div>
          <div class="col-6">
              <div class="float-right"><button type="submit"  class="btn btn-success">Import clients</button></div>
              <div class="text-primary" wire:loading>
                Importation en cours...
         </div>
    </div>
          
 </div>
 </form>
 @if (session()->has('message'))
     <div class="alert alert-success">
          {{ session('message') }}
     </div>
 @endif
<div wire:poll.7s>
        <table class="table table-head-fixed  mt-3">
            <thead>
                <tr>
                    <th style="width:20%"  >Compte contribuable</th>
                    <th style="width:35%" >Raison sociale</th>
                    <th style="width:35%" >Adresse</th>
                    <th style="width:10%" >Contact</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                <tr>
                    <td>{{ $client->compteContrib }}</td>
                    <td>{{ $client->raisonSocial }}</td>
                    <td>{{ $client->adresse }}</td>
                    <td>{{ $client->contact }}</td>
                   
                </tr>
                @endforeach

            </tbody>
            </table>
            </div>
    

  
