
                <div class="row p-1 pt-0 mb-0">
                <hr class="mb-0 mt-0" style="border: 1px dashed black;"> 
                   <table  class="table border-top" style="border: 1px wihte;">
                          <tbody>                       
                                <tr>                          
                                    <td>
                                          <p class="mb-0 mt-0 ml-1"><font size="3">N°Déclaration :<br/><b>{{$dossier->numDeclaration}}</b></font></p>
                                          
                                    </td>
                                    <td>
                                          <p class="mb-0 mt-0 ml-1"><font size="3">N°Déclaration :<br/><b>{{$dossier->regimeDouanier}}</b></font></p>
                                          
                                    </td>
                                    <td>
                                          <p class="mb-0 mt-0 ml-1"><font size="3">Circuit : <br/><b>{{$dossier->circuit}}</b></font></p>
                                          
                                    </td>                                   
                                </tr>                                  
                            </tbody>
                      </table>                                 
                      <hr class="mb-0 mt-0" style="border: 1px dashed black;">
                            <table class="table border-top" >
                            <tr>
                                <td> 
                                     <p><font size="2">N°Dossier : <b>{{$dossier->numDossier}}</b><br/>
                                     Date d'arrivée : <b>{{Carbon\Carbon::parse($dossier->dateArrivee)->format('d-m-Y') }}</b><br/>
                                      LTA : <b>{{$dossier->connaissement}}</b><br/>
                                      Vol : <b>{{$dossier->vol}}</b><br/>
                                      Aéroport de chargement : <b>{{$dossier->aeroportDepart}}</b></font></p>
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
                                <th style="width:80%" >Désignation</th>
                                <th style="width:20%" >Poids brut</th>
                             </tr>
                        </thead>

                            <tr>
                                <td> 
                                     <p><font size="3"><b>{{$dossier->marchandise}}</b></font></p>
                                </td>
                                <td  > 
                                     <p ><font size="3">
                                        <b>{{$dossier->poidsBrut }} KGS</b></font>
                                     </p>
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
                         <font size="2">{{$dateHeureActu}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>
          </div>