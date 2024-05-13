<div class="modal fade" id="modalPro" tabindex="-1" role="dialog" aria-labelledby="modalProTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-user fa-lg mr-2"></i>      Mon profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form>
           @csrf
                    <div class="modal-body">
                    
                         <div class="row">
                                   <div class="col-6"> 
                                       Nom :&nbsp;<b>{{auth()->user()->nom}}</b>
                                   </div>
                                   <div class="col-6"> 
                                      Prénom(s) :&nbsp;<b>{{auth()->user()->prenom}}</b>
                                   </div> 
                                </div> 
                                <div class="row">
                                   <div class="col-6"> 
                                       Sexe :&nbsp;<b>{{auth()->user()->sexe}}</b>
                                   </div>
                                   <div class="col-6"> 
                                      Entreprise :&nbsp;<b>{{auth()->user()->client->raisonSocial ?? 'not found'}}</b>
                                   </div> 
                                </div> 
                                <div class="row">
                                   <div class="col-6"> 
                                       Matricule :&nbsp;<b>{{auth()->user()->matricule}}</b>
                                   </div>
                                   <div class="col-6"> 
                                      Email :&nbsp;<b>{{auth()->user()->email}}</b>
                                   </div> 
                                </div> 
                                <div class="row">
                                   <div class="col-6"> 
                                       Détachement :&nbsp;<b>{{auth()->user()->detachement->nomDetachement}}</b>
                                   </div>
                                   <div class="col-6"> 
                                      Service :&nbsp;<b>{{auth()->user()->service->nomService}}</b>
                                   </div> 
                                </div> 

                    </div>
       </form>            
      <div class="modal-footer bg-primary">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Ferme</button>
      </div>
    </div>
  </div>
</div>