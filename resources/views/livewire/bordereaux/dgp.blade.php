
                <div class="row p-1 pt-0 mb-0">
                <hr class="mb-0 mt-0" style="border: 1px dashed black;"> 
                   <table  class="table border-top" style="border: 1px wihte;">
                          <tbody>                       
                                <tr>                          
                                    <td>
                                          <p class="mb-0 mt-0 ml-1"><font size="3">N°Déclaration : <b>{{$dossier->numDeclaration}}</b><br/>Date réception : <b>{{Carbon\Carbon::parse($dossier->dateReception)->format('d-m-Y') }}</b><br/>Mode livraison : <b>{{$dossier->modeLivraison}}</b></font></p>
                                          
                                    </td>
                                    <td>
                                          <p class="mb-0 mt-0 ml-1"><font size="3">Circuit : <b>{{$dossier->circuit}}</b><br/>Date mise en livraison : <b>{{Carbon\Carbon::parse($dossier->dateMiseEnLivraison)->format('d-m-Y') }}</b><br/>Transporteur : <b>{{$dossier->transporteur->nomTransporteur}}</b></font></p>
                                          
                                    </td>                                   
                                </tr>                                  
                            </tbody>
                      </table>                                 
                      <hr class="mb-0 mt-0" style="border: 1px dashed black;">
                            <table class="table border-top" >
                            <tr>
                                <td> 
                                     <p><font size="2">N°Dossier : <b>{{$dossier->numDossier}}</b><br/>
                                     Date d'arrivée : <b>{{Carbon\Carbon::parse($dossier->dateNavire)->format('d-m-Y') }}</b><br/>
                                      Connaissement : <b>{{$dossier->connaissement}}</b><br/>
                                      Navire : <b>{{$dossier->navire}}</b><br/>
                                      Port de chargement : <b>{{$dossier->port}}</b></font></p>
                                </td>
                                <td  > 
                                     <p ><font size="2">Client : <br/>
                                        <b>{{$dossier->client->raisonSocial}}</b></font>
                                     </p>
                                </td>
                                <td > 
                                     <p class="mb-0"><font size="2">Compagnie : <br/>
                                        <b>{{$dossier->compagnie->nomCompagnie}}</b></font>
                                     </p>
                                </td>
                            </tr>
                      </table>
                      <hr class="mb-1 mt-0" style="border: 1px dashed black;">
                      <table class="table">
                        <thead>
                            <tr>
                                <th style="width:70%" >Désignation</th>
                                <th style="width:30%" >Poids brut</th>
                             </tr>
                        </thead>

                            <tr>
                                <td> 
                                     <font size="3"><b>{{ $dossier->marchandise }}</b></font>
                                </td>
                                <td  > 
                                     <font size="3">
                                        <b>{{ $dossier->poidsBrut }} Kgs</b></font>
                                     
                                </td>
                            </tr>
                      </table>
                     
                    <table  class="table">
                            <tr >
                                <td > 
                                    <b><font size="3">ACCUSE DE RECEPTION&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TGR</font></b>
                                </td><br/>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <br/>    
                            </tr>
                      </table>
                        
          </div>