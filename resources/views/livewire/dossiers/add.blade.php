<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header  bg-primary">
                    <h5 class="modal-title" style="width:100%;"><i class="nav-icon fas fa-folder-plus fa-lg mr-1">    Création d'un nouveau dossier</i> </h5>
                </div>
                <form  wire:submit.prevent="addDossier()">
                    @csrf
                  <div class="modal-body">
                    <div class="row">
                                <div class="col-3">
                                    <div class="form-group" >
                                            <label>N°Dossier</label>
                                            <input type="text" wire:model="vNumDossier" class="form-control @error('vNumDossier') is-invalid
                                            @enderror" onkeyup="this.value=this.value.toUpperCase()">

                                            @error("vNumDossier")
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group" >
                                        <label class="text-primary mr-4">
                                            <input  type="radio"  wire:model='importexport' value='Import' class="form-control mb-2"> Import
                                            
                                        </label>
                                        <label class="text-success">
                                            <input  type="radio" wire:model='importexport' value='Export' class="form-control mb-2">    Export
                                        </label>
                                    </div>
                                </div>
                
                         @if ($importexport=="Import")
                    <div class="col-6">
                        <div class="form-group">
                      <label>Régime douanier</label>
                        <select   wire:model="vRegimeDouanier" class="form-control @error('vRegimeDouanier') is-invalid
                        @enderror">
                        <option value="">Choisir ...</option>
                        <option value="D3">D3</option>
                        <option value="D3 AT">D3 AT</option>
                        <option value="D3 SEF">D3 SEF</option>
                        <option value="D11">D11</option>
                        <option value="D15">D15</option>
                        <option value=" D18 Admission Temporaire Directe"> D18 Admission Temporaire Directe</option>
                       
                      </select>

                        @error("vRegimeDouanier")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    </div>
                    @endif

                    @if ($importexport=="Export")
                        <div class="col-6">
                        <div class="form-group" >
                        <label>Régime douanier</label>
                        <select  wire:model="vRegimeDouanier" class="form-control @error('vRegimeDouanier') is-invalid
                        @enderror">
                        <option value="">Choisir ...</option>
                        <option value="D6">D6</option>
                        <option value="D8">D8</option>
                        <option value="D25">D25</option>
                        <option value="D25 SEF">D25 SEF</option>
                        <option value="D25 SEF Suite d'Entrepôt">D25 SEF Suite d'Entrepôt</option>
                        <option value="D53">D53</option>
                        <option value="D56">D56</option>
                        <option value="D66">D66</option>

                      </select>

                        @error("vRegimeDouanier")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                    </div>
                    @endif
                </div>

                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                        <label>Date ouverture</label>
                        <input type="date" wire:model="vDateOuverture" class="form-control @error('vDateOuverture') is-invalid
                        @enderror">

                        @error("vDateOuverture")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                        <label>Mode transport</label>
                        <select wire:model="vModeTransport" class="form-control @error('vModeTransport') is-invalid
                        @enderror">
                        <option value="">---------</option>
                        <option value="Aérien">Aérien</option>
                        <option value="Ferroviaire">Ferroviaire</option>
                        <option value="Maritime">Maritime</option>
                        <option value="Terrestre">Terrestre</option>
                        </select>

                        @error("vModeTransport")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                    </div>
                    <div class="col-3">
                            <div class="form-group">
                            <label>Nombre TC 20':</label>
                            <input type="number" wire:model="vNbreTc20" class="form-control @error('vNbreTc20') is-invalid
                                    @enderror">
                            @error("vNbreTc20")
                                        <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                        <label>Nombre TC 40':</label>
                        <input type="number" wire:model="vNbreTc40" class="form-control @error('vNbreTc40') is-invalid
                                @enderror">
                        @error("vNbreTc40")
                                    <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                        <div class="col-2">

                            <div class="form-group">
                                <label>Poids brut:</label>
                                <input type="number" wire:model="vPoidsBrut" class="form-control @error('vPoidsBrut') is-invalid
                                        @enderror">
                                @error("vPoidsBrut")
                                            <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                         </div>
                         <div class="col-4">
                                <div class="form-group">
                                    <label>Nombre colis:</label>
                                    <input type="text" wire:model="vNbreColis" class="form-control @error('vNbreColis') is-invalid
                                            @enderror" onkeyup="this.value=this.value.toUpperCase()">
                                    @error("vNbreColis")
                                                <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                         </div>
                         
                         <div class="col-6">
                            <div class="form-group">
                                <label>Client:</label>
                                <select name="client" id="client"  wire:model="vClient_id" class="form-control @error('vClient_id') is-invalid
                                @enderror">
                                <option value="">---------</option>
                                @foreach($clients as $client)
                                        <option value="{{$client->id}}">{{$client->raisonSocial}}</option>
                                @endforeach
                                </select>
                                
                                @error("vClient_id")
                                            <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                         </div>        
                </div>
                <div class="row">
                    <div class="col-5">
                            <div class="form-group">
                            <label>Connaissement:</label>
                            <input type="text" wire:model="vConnaissement" class="form-control @error('vConnaissement') is-invalid
                                    @enderror" onkeyup="this.value=this.value.toUpperCase()">
                            @error("vConnaissement")
                                        <span class="text-danger">{{ $message }}</span>
                            @enderror

                            </div>
                    </div>
                    
                    <div class="col-7">
                                <div class="form-group">
                                    <label>Compagnie</label>
                                    <select name="compagnie" id="compagnie" wire:model="vCompagnie_id" class="form-control @error('vCompagnie_id') is-invalid
                                    @enderror">
                                        <option value="">---------</option>
                                    @foreach($compagnies as $compagnie)
                                        <option value="{{$compagnie->id}}">{{$compagnie->nomCompagnie}}</option>
                                    @endforeach
                                    </select>

                                    @error("vCompagnie_id")
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                    
                                </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label >Marchandise:</label>
                            <textarea wire:model="vMarchandise" class="form-control @error('vMarchandise') is-invalid
                                @enderror" onkeyup="this.value=this.value.toUpperCase()"></textarea>
                            @error("vMarchandise")
                                    <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                
            </div>
                    <div class="modal-footer">
                    
                        <div class="row">
                            <div class="mr-2"> 
                                    @if($ajoutButton)
                                        <button type="submit" class="btn btn-success" data-bs-dismiss="modal" >Ajouter </button>
                                    @endif
                                    
                            </div>
                            <div>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"  wire:click.prevent='showCreate()'>Fermer</button>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
  
