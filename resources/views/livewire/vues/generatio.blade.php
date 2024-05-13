<form role="form">
     @csrf
<div class="row pl-4 pt-2 text-maroon">
     <div class="mr-5"><h1>{{ $vtitre }}</h1></div>
     <div><button type="button" class="btn btn-block btn-outline-dark btn-lg" wire:click.prevent='goToMenuBord()'>Retour</button></div> 
</div>

<div class="row pl-4 pt-2">
     <div class="col-12">
          <div class="card">
          <div class="card-header bg-dark">
               <div class="row">
                    <div class="col-4">
                         <h4>Table des dossiers</h4>
                    </div>
                    @if ($vueaccueil==false && $vGene==true && $vDeclaMens==true && $vDosNv==false && $vDosExp==false && $vClienCirc==false && $vClienOuvertu==false && $vClienValid==false && $vClienType==false )
                    <div class="col-4">
                         <div class="form-group">
                                    <label>Du</label>
                                    <input type="date" wire:model="du" class="form-control">
                         </div>
                    </div>
                    <div class="col-4">
                         <div class="form-group">
                                    <label>Au</label>
                                    <input type="date" wire:model="au" class="form-control">
                         </div>
                    </div>
                     @endif

                     @if ($vueaccueil==false && $vGene==true && $vDeclaMens==false && $vDosNv==false && $vDosExp==false && $vClienCirc==true && $vClienOuvertu==false && $vClienValid==false && $vClienType==false )
                    <div class="col-4">
                         <div class="form-group">
                                    <label>Client</label>
                                    <select name="clientR" id="clientR" wire:model="vClient_id" class="form-control">
                                        <option value="">---------</option>
                                   @foreach($clients as $client)
                                        <option value="{{$client->id}}">{{$client->raisonSocial}}</option>
                                    @endforeach
                                    </select>
                         </div>
                    </div>
                    <div class="col-4">
                         
                         <div class="form-group">
                                <label>Circuit</label>
                                   <select name="circuitR" id="circuitR" wire:model="vCircuit" class="form-control">
                                    <option value="">Veuillez sélectionner un circuit ...</option>
                                    <option value="POST CONTROLE">POST CONTROLE</option>
                                    <option value="SCANNER">SCANNER</option>
                                    <option value="VAD">VAD</option>
                                    <option value="VAQ">VAQ</option>
                                    <option value="VERT">VERT</option>
                                    <option value="VISITE ANNEXE">VISITE ANNEXE</option>
                                    <option value="CIRCUIT ROUGE">CIRCUIT ROUGE</option>
                                    <option value="QUAY CONTROL">QUAY CONTROL</option>
                                    <option value="VERT SCANNER">VERT SCANNER</option>
                                    <option value="JAUNE POST CONTROL">JAUNE POST CONTROL</option>
                                    <option value="ROUGE SCANNER">ROUGE SCANNER</option>
                                                
                                    </select>
                                       
                            </div>
                    </div>
                     @endif

                     @if ($vueaccueil==false && $vGene==true && $vDeclaMens==false && $vDosNv==false && $vDosExp==false && $vClienCirc==false && $vClienOuvertu==true && $vClienValid==false && $vClienType==false )
                    <div class="col-4">
                         <div class="form-group">
                                    <label>Client</label>
                                    <select name="clientR" id="clientR" wire:model="vClient_id" class="form-control">
                                        <option value="">---------</option>
                                   @foreach($clients as $client)
                                        <option value="{{$client->id}}">{{$client->raisonSocial}}</option>
                                    @endforeach
                                    </select>
                         </div>
                    </div>
                    <div class="col-4">
                         <div class="form-group">
                                    <label>Date ouverture</label>
                                    <input type="date" wire:model="vDateOuv" class="form-control">
                         </div>
                    </div>
                     @endif

                     @if ($vueaccueil==false && $vGene==true && $vDeclaMens==false && $vDosNv==false && $vDosExp==false && $vClienCirc==false && $vClienOuvertu==false && $vClienValid==true && $vClienType==false )
                    <div class="col-4">
                         <div class="form-group">
                                    <label>Client</label>
                                    <select name="clientR" id="clientR" wire:model="vClient_id" class="form-control">
                                        <option value="">---------</option>
                                   @foreach($clients as $client)
                                        <option value="{{$client->id}}">{{$client->raisonSocial}}</option>
                                    @endforeach
                                    </select>
                         </div>
                    </div>
                    <div class="col-4">
                         <div class="form-group">
                                    <label>Date validation</label>
                                    <input type="date" wire:model="vDateValid" class="form-control">
                         </div>
                    </div>
                     @endif

                     @if ($vueaccueil==false && $vGene==true && $vDeclaMens==false && $vDosNv==false && $vDosExp==false && $vClienCirc==false && $vClienOuvertu==false && $vClienValid==false && $vClienType==true )
                    <div class="col-4">
                         <div class="form-group">
                                    <label>Client</label>
                                    <select name="clientR" id="clientR" wire:model="vClient_id" class="form-control">
                                        <option value="">---------</option>
                                   @foreach($clients as $client)
                                        <option value="{{$client->id}}">{{$client->raisonSocial}}</option>
                                    @endforeach
                                    </select>
                         </div>
                    </div>
                    <div class="col-4">
                         <div class="form-group">
                                    <label>Type dossier</label>
                                    <select name="typeR" id="typeR"   wire:model="vTypeDossier" class="form-control">
                                        <option value="">---------</option>
                                        <option value="Import">Import</option>
                                        <option value="Export">Export</option>
                                    </select>
                         </div>
                    </div>
                     @endif

               </div>  
          </div>
          <div class="card-body table-responsive p-0 table-striped" style="height: 500px;">
            <table class="table table-head-fixed text-nowrap">
            <thead>
                <tr>
                    <th style="width:10%" >N°Dossier</th>
                    <th style="width:10%" >Date ouverture</th>
                    <th style="width:20%" >Client</th>
                    <th style="width:20%" >Connaissement</th>
                    <th style="width:5%" >Type</th>
                    <th style="width:20%" >N°déclaration</th>
                    <th style="width:15%" >Date validation</th>     
                </tr>
            </thead>
            <tbody>
                @forelse($dossiers as $dossier)
                 
                    <tr>
                        <td>{{$dossier->numDossier}}</td>
                        <td class="text-center">
                         @if ($dossier->dateOuverture!="")
                            {{Carbon\Carbon::parse($dossier->dateOuverture)->format('d-m-Y') }}
                        @else
                            {{null}}
                        @endif
                        </td>
                        <td>{{$dossier->libClient}}</td>
                        <td>{{$dossier->connaissement}}</td>
                        <td>{{$dossier->typeDossier}}</td>
                        <td>{{$dossier->numDeclaration}}</td>
                         <td class="text-center">
                         @if ($dossier->dateValidation!="")
                            {{Carbon\Carbon::parse($dossier->dateValidation)->format('d-m-Y') }}
                        @else
                            {{null}}
                        @endif
                    </td>
                        
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">
                            <div class="alert alert-danger alert-dismissible">
                                    <h5><i class="icon fas fa-ban"></i> Information !</h5>
                                    Aucune donnée trouvée par rapport aux éléments de recherche entrés
                            </div>
                        </td>
                    </tr>
                @endforelse
             </tbody>
          </table>
        </div>
     </div>
     </div>
</div>
</form>
