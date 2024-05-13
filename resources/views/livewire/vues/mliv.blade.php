<div class="row p-4 pt-5" >

    <div class="card" style="width:100%;" >
                <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link" href="#ouverture" data-toggle="tab">Ouverture</a></li>
                            <li class="nav-item"><a class="nav-link" href="#cotation" data-toggle="tab">Cotation</a></li>
                            <li class="nav-item"><a class="nav-link" href="#documentation" data-toggle="tab">Documentation</a></li>
                            <li class="nav-item"><a class="nav-link" href="#validation" data-toggle="tab">Validation</a></li>
                            <li class="nav-item"><a class="nav-link" href="#pmlivraison" data-toggle="tab">Prépa. mise en livraison</a></li>
                            <li class="nav-item"><a class="nav-link active" href="#mlivraison" data-toggle="tab">Mise en livraison</a></li>
                            
                        </ul>
                </div>
               <div class="card-body" >
                    <div class="tab-content">
                                <div class="tab-pane" id="ouverture">
                                     <div class="card card-primary" >
                                        <div class="card-header">
                                            <h3 class="card-title"><i class="nav-icon fas fa-folder-plus fa-lg mr-1"></i>Informations ouverture dossier</h3>
                                        </div>
             
                                <form role= "form">
                                    @csrf
            
        <div class="card-body" >
            <div class="row">
                <div class="col-4">
                    <div class="form-group" >
                        <label>N°Dossier</label>
                        <input type="text" wire:model="editDossier.numDossier" class="form-control" disabled>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group" >
                        <label>Type dossier</label>
                        <input type="text" wire:model="editDossier.typeDossier" class="form-control" disabled>
                    </div>
                </div>
                
                <div class="col-4">
                    <div class="form-group">
                    <label>Mode transport</label>
                    <input type="text" wire:model="editDossier.modeTransport" class="form-control" disabled>   
                    </div>
                </div>

            </div>
            
            <div class="row">
                <div class="col-3">
                        <div class="form-group">
                        <label>Date ouvert.</label>
                        <input type="date" wire:model="editDossier.dateOuverture" class="form-control" disabled>
                        </div>
                    </div>
                <div class="col-3">
                <div class="form-group">
                    <label>Régime douanier</label>
                     <input type="text" wire:model="editDossier.regimeDouanier" class="form-control" disabled>
                        
                    </div>
                </div>
                <div class="col-3">
                        <div class="form-group">
                            <label>Nombre TC 20':</label>
                            <input type="number" wire:model="editDossier.nbreTc20" class="form-control" disabled>
                         </div>
                </div>

                <div class="col-3">
                    <div class="form-group">
                         <label>Nombre TC 40':</label>
                        <input type="number" wire:model="editDossier.nbreTc40" class="form-control" disabled>
                    </div>
                </div>

            </div>

            <div class="row">
                        <div class="col-2">
                            <div class="form-group">
                                <label>Poids brut:</label>
                                <input type="number" wire:model="editDossier.poidsBrut" class="form-control" disabled>
                            </div>

                         </div>
                         <div class="col-4">
                                <div class="form-group">
                                    <label>Nombre colis:</label>
                                    <input type="text" wire:model="editDossier.nbreColis" class="form-control" disabled>
                                </div>
                         </div>
                         
                         
                         <div class="col-6">
                            <div class="form-group">
                                <label>Client :</label>
                                <input type="text" wire:model="editDossier.libClient" class="form-control" disabled>
                            </div>
                         </div> 
                </div>

                <div class="row">
                    <div class="col-5">
                            <div class="form-group">
                                <label>Connaissement:</label>
                                <input type="text" wire:model="editDossier.connaissement" class="form-control" disabled>    
                            </div>
                    </div>
                    
                    <div class="col-7">
                                <div class="form-group">
                                    <label>Compagnie</label>
                                    <input type="text" wire:model="editDossier.nomCompagnie" class="form-control" disabled>
                                </div>
                    
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label >Marchandise:</label>
                            <textarea wire:model="editDossier.marchandise" class="form-control" disabled></textarea>
                        </div>
                    </div>
                </div>

           </div>
            <div class="card-footer float-right">   
                    <div>
                             <button type="button" wire:click.prevent="goToMenu()" class="btn btn-danger">Retourner</button>
                        
                    </div>
            </div>

        </form>
    </div>
</div>

            <div class="tab-pane" id="cotation">
                <div class="card card-primary" >
                        <div class="card-header">
                            <h3 class="card-title"><i class="nav-icon fas fa-folder-plus fa-lg mr-2"></i>Fiche de cotation</h3>
                        </div>
                        <div class="card-body">
                    
                            <form role= "form">
                        @csrf
                                    <div class="row">
                                                <div class="col-6">
                                                        <div class="form-group">
                                                        <label>N°Dossier:</label>
                                                        <input type="text" wire:model="editDossier.numDossier" class="form-control" disabled >
                                                        </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                    <label>Date cotation:</label>
                                                    <input type="date" wire:model="editDossier.dateCotation" class="form-control" disabled>
                                                    </div>
                                                </div>
                                    </div>

                                    <div class="row">
                                    
                                                <div class="col-8">
                                                        <div class="form-group">
                                                        <label>Nom de l'agent</label>
                                                        <input type="text" wire:model="editDossier.agentCotation" class="form-control" disabled>
                                                        </div>
                                                </div>

                                                <div class="col-4">
                                                <div class="form-group">
                                                <label>Conteneurisation</label>
                                                <input type="text" wire:model="editDossier.typeChargement" class="form-control" disabled>
                                                </div>
                                        </div>
                                    </div>
                                    </div>
                                    
                                    <div class="card-footer ">
                                            <div class="float-right">
                                                <button wire:click.prvent='goToMenu()' type="button" class="btn btn-danger">Retour</button>          
                                            </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="tab-pane" id="documentation">
                                <div class="card card-warning " >
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-book fa-lg"> Document RFCV</i></h3>
                </div>
        <form role= "form">
            @csrf
            <div class="card-body table-responsive p-0 table-striped" style="height: 200px;">
            <table class="table table-head-fixed text-nowrap">
            <thead>
                <tr>
                    <th style="width:20%" >N°Rfcv soumis</th>
                    <th style="width:20%" >Date Rfcv soumis</th>
                    <th style="width:20%" >N°Rfcv validé</th>
                    <th style="width:20%" >Date Rfcv validé</th>
                    <th style="width:20%" >Statut</th>
                </tr>
            </thead>
            <tbody>
                @foreach($docRfcvs as $docRfcv)
                <tr>
                    <td>{{$docRfcv->numRfcvSoumi}}</td>
                    <td class="text-center">{{Carbon\Carbon::parse($docRfcv->dateRfcvSou)->format('d-m-Y') }}</td>
                    <td>{{$docRfcv->numRfcvValide}}</td>
                    <td class="text-center">@if ($docRfcv->dateRfcvVal!=null){{Carbon\Carbon::parse($docRfcv->dateRfcvVal)->format('d-m-Y')   
                    }}@endif</td>
                     <td>{{$docRfcv->statut}}</td>
                </tr>
                @endforeach
            </tbody>
            </table>  
            </div>
            
          </form>
        </div>

        <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-book fa-lg"> Document FDI</i></h3>
                </div>
        <form role= "form">
            @csrf
            <div class="card-body table-responsive p-0 table-striped" style="height: 200px;">
                
                <table class="table table-head-fixed text-nowrap">
            <thead>
                <tr>
                    <th style="width:20%" >N°Fdi soumis</th>
                    <th style="width:20%" >Date Fdi soumis</th>
                    <th style="width:20%" >N°Fdi validé</th>
                    <th style="width:20%" >Date Fdi validé</th>
                    <th style="width:20%" >Statut</th>
                </tr>
            </thead>
            <tbody>
                @foreach($docFdis as $docFdi)
                <tr>
                    <td>{{$docFdi->numFdiSoumi}}</td>
                    <td class="text-center">{{Carbon\Carbon::parse($docFdi->dateFdiSou)->format('d-m-Y') }}</td>
                    <td>{{$docFdi->numFdiValide}}</td>
                    <td class="text-center">@if ($docFdi->dateFdiVal!=null){{Carbon\Carbon::parse($docFdi->dateFdiVal)->format('d-m-Y')   
                    }}@endif</td>
                     <td>{{$docFdi->statut}}</td>
                </tr>
                @endforeach
            </tbody>
            </table>  

                
            </div>
            <div class="card-footer float-right">
                    <div>
                        <button type="button" wire:click.prevent="goToMenu()" class="btn btn-danger">Retour</button>
                    </div>
             </div>
          </form>
        </div>
                        </div>
                        
                        <div class="tab-pane" id="validation">
                                <div class="card card-dark" >
                <div class="card-header">
                    <h3 class="card-title"><i class="nav-icon fas fa-folder-plus fa-lg mr-1"></i> Validation dossier</h3>
                </div>
             
        <form role= "form">
            @csrf
            
        <div class="card-body" >
            <div class="row">
                <div class="col-4">
                    <div class="form-group" >
                        <label>N°Dossier</label>
                        <input type="text" wire:model="editDossier.numDossier" class="form-control" disabled>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group" >
                        <label>Type dossier</label>
                        <input type="text" wire:model="editDossier.typeDossier" class="form-control" disabled>
                    </div>
                </div>
                
                <div class="col-4">
                    <div class="form-group">
                    <label>Client</label>
                        <input type="text" wire:model="editDossier.libClient" class="form-control" disabled>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-4">
                        <div class="form-group">
                        <label>N°Déclaration</label>
                        <input type="text" wire:model="editDossier.numDeclaration" class="form-control" disabled>
                        </div>
                    </div>
                <div class="col-4">
                    <div class="form-group">
                        <label>N°Liquidation</label>
                            <input type="text" wire:model="editDossier.numLiquidation" class="form-control" disabled>
                    </div>
                </div>
                <div class="col-4">
                        <div class="form-group">
                             <label>Validé le</label>
                             <input type="date" wire:model="editDossier.dateValidation" class="form-control" disabled>
                        </div>
                </div>
            </div>

            <div class="row">
                    <div class="col-6">
                            <div class="form-group">
                                <label>Montant de la déclaration</label>
                                <input type="number" wire:model="editDossier.montanDeclaration" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">

                                       <label>Circuit</label>
                                            <input type="text"  wire:model="editDossier.circuit" class="form-control" disabled>
                            </div>
                         </div>  
                </div>  

           </div>
            <div class="card-footer float-right">
                <div class="row">
                    <div>
                        <button type="button" wire:click.prevent="goToMenu()"    class="btn btn-danger">Retourner</button>
                    </div> 
              </div>
              </div>
        </form>
    </div>
                        </div>

                        <div class="tab-pane" id="pmlivraison">
                                 <div class="card card-indigo" >
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-file-alt mr-1"></i>Fiche de préparation de mise en livraison</h3>
                </div>
        <form role= "form" wire:submit.prevent='updateDossier()'>
            @csrf
            <div class="card-body">
                <div class="row">
                <div class="col-3">
                    <div class="form-group" >
                        <label>N°Dossier</label>
                        <input type="text" wire:model="editDossier.numDossier" class="form-control " disabled>

                        
                    </div>
                </div>

                     <div class="col-4">
                        <div class="form-group">
                        <label>Date de reception</label>
                        <input type="date" wire:model="editDossier.dateReception" class="form-control" disabled>

                        </div>
                    </div>

                     <div class="col-5">
                                <div class="form-group">
                                    <label>Compagnie</label>
                                        <select name="compagnie" id="compagnie" wire:model="editDossier.compagnie_id"           class="form-control" disabled>

                                        <option value="">---------</option>
                                            @foreach($compagnies as $compagnie)
                                                <option value="{{$compagnie->id}}">{{$compagnie->nomCompagnie}}</option>
                                            @endforeach
                                        </select>

                                </div>
                    </div>
            </div>
            
            <div class="row">
               <div class="col-4">
                            <div class="form-group">
                                <label>Navire</label>
                                <input type="text" wire:model="editDossier.navire" class="form-control " disabled >
                                
                            </div>
                 </div>
                
          
                 <div class="col-3">
                            <div class="form-group">
                                <label>Date arrivée</label>
                                <input type="date" wire:model="editDossier.dateNavire" class="form-control " disabled>
                               
                            </div>
                  </div>

                  <div class="col-5">
                            <div class="form-group">
                                <label>Mode livraison</label>
                                <select name="modliv" id="modliv" wire:model="editDossier.modeLivraison" class="form-control" disabled>
                                <option value="">---------</option>
                                <option value="AUTOCHARGEUSE">AUTOCHARGEUSE</option>
                                <option value="REMORQUE">REMORQUE</option>
                                <option value="PROPRE MOYEN">PROPRE MOYEN</option>
                               </select>

                                
                            </div>
                 </div>
            </div>

            <div class="row">
                    <div class="col-4">
                          <div class="form-group">
                                <label>Port de chargement</label>
                                <input type="text" wire:model="editDossier.port" class="form-control " disabled>
                                 
                            </div>
                    </div>
                    
                    <div class="col-8">
                        <div class="form-group">
                            <label >Lieu de livraison</label>
                            <textarea wire:model="editDossier.lieu" class="form-control " disabled></textarea>
                            
                        </div>
                    </div>
                
          </div>
            
          <div class="row">
                    <div class="col-6">
                          <div class="form-group">
                                <label>Type de chargement</label>
                                <select name="typechargemen" id="typechargemen" wire:model="editDossier.typeChargement" class="form-control " disabled>

                                <option value="">---------</option>
                                <option value="TC Plein">TC Plein</option>
                                <option value="Vrac">Vrac</option>
                                <option value="Degroupage">Degroupage</option>
                               </select>
                                
                            </div>
                    </div>
                    

                    <div class="col-6">
                          <div class="form-group">
                                <label>Date ordre de livraison</label>
                                <input type="date" wire:model="editDossier.dateOrdreLivraison" class="form-control " disabled>
                                
                            </div>
                    </div>
                
          </div>
          <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                                    <label>Transporteur</label>
                                        <select name="transporteur" id="transporteur" wire:model="editDossier.transporteur_id"           class="form-control" disabled>

                                        <option value="">---------</option>
                                            @foreach($transporteurs as $transporteur)
                                                <option value="{{$transporteur->id}}">{{$transporteur->nomTransporteur}}</option>
                                            @endforeach
                                        </select>

                                </div>
                    </div>

                    <div class="col-7">
                        <div class="form-group">
                            <label >Observations</label>
                            <textarea wire:model="editDossier.observLivraison" class="form-control " disabled></textarea>
                            
                        </div>
                    </div>
          </div>
            </div>

            <div class="card-footer float-right">
                
                <button type="button" wire:click.prevent="goToMenu()" class="btn btn-danger">Retour</button>
             </div>

        </form>
    </div>
</div>
<div class="tab-pane active" id="mlivraison">
        <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-file-alt mr-1"></i>Fiche de mise en livraison</h3>
                </div>
        <form role= "form">
            @csrf
            <div class="card-body">
              <div class="row">
                <div class="col-4">
                    <div class="form-group" >
                        <label>N°Dossier</label>
                        <input type="text" wire:model="editDossier.numDossier" class="form-control" disabled>
                    </div>
                </div>

                     <div class="col-4">
                        <div class="form-group">
                        <label>Date mise en livraison</label>
                        <input type="date" wire:model="editDossier.dateMiseEnLivraison" class="form-control" disabled>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                        <label>N°BL</label>
                        <input type="text" wire:model="editDossier.connaissement" class="form-control" disabled>
                        </div>
                    </div>
                     
            </div>
            
            <div class="row">
               <div class="col-12">
                        <<div class="form-group">
                                    <label>Transporteur</label>
                                        <select name="transporteur" id="transporteur" wire:model="editDossier.transporteur_id"           class="form-control" disabled>

                                        <option value="">---------</option>
                                            @foreach($transporteurs as $transporteur)
                                                <option value="{{$transporteur->id}}">{{$transporteur->nomTransporteur}}</option>
                                            @endforeach
                                        </select>

                                </div>
                 </div>
            </div>
            
          
          <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label >Observations</label>
                            <textarea wire:model="editDossier.observLivraison" class="form-control " disabled></textarea>
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer float-right">
                
                <button type="button" wire:click.prevent="goToMenu()" class="btn btn-danger">Retour</button>
             </div>

        </form>
    </div>
                        </div>
                        
                        

                    </div>
             </div>
     </div>
</div>
