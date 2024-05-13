<h5 class="mt-2"><u>Table des compagnies</u></h5>
<form role= "form" wire:submit.prevent='importComp()' method="POST">
            @csrf
 <div class="row">
          <div class="col-6">
              <label class="form-label">Excel file @if ($nbre!=0)
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-danger">Nombre d'éléments importés : {{ $nbre }}</span>
              @endif</label>
              
              <input type="file" class="form-control @error('fileComp') is-invalid @enderror" wire:model='fileComp'>
              <small>Note<b class="text-danger">*</b>: Type file xlsx, xls</small>
              <div class="text-success" wire:loading>
                Chargement du fichier en cours...
              </div>
              <div>@error("fileComp")
                        <span class="text-danger">{{ $message }}</span>
              @enderror</div>
          </div>
          <div class="col-6">
              <div class="float-right"><button type="submit"  class="btn btn-primary">Import compagnies</button></div>
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
                    <th style="width:20%"  >ID</th>
                    <th style="width:80%" >Nom compagnie</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($compagnies as $compagnie)
                <tr>
                    <td>{{ $compagnie->id }}</td>
                    <td>{{ $compagnie->nomCompagnie }}</td>
                
                </tr>
                @endforeach

            </tbody>
            </table>
        </div>
    

  
