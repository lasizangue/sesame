                              <h4>A propos de Sesame v2.0</h4>
                            <p class="text-danger"> Pour la bonne marche de l'application, veuillez créer dans la table des clients; la raison social (TGR) avec l'identifiant (1) et dans la table des acconiers veuillez ajouter les acconiers AGL et Delmas tout en respectant bien la casse.</p>
                             *Les (20) tables de sesame v2.0 :<br/>
                             -acconiers(id,nomAcconier,typeAcconier,created_at,updated_at)<br/>
                             -buros (id,code,libelle,created_at,updated_at)<br/>
                             -clients (id,raisonSocial,compteContrib,adresse,contact,created_at,updated_at)<br/>
                             -compagnies (id,nomCompagnie,created_at,updated_at)<br/>
                             -conteneurs (id,numTc,typeTc,libClient,client_id,dateValidation,dossier_id,created_at,updated_at)<br/>
                             -detachements (id,nomDetachement,created_at,updated_at)<br/>
                             -dossiers (id,dateOrdreLivraison,numDossier,typeDossier,modeTransport,regimeDouanier,fournisseur,nbreTc20,nbreTc40,nbreColis,marchandise,connaissement,<br/>danger,poidsBrut,dateOuverture,statuCoter,statuValider,statuMisEnLivraison,statuBae,bureauDouane,phyto,statuLivrer,dateCotation,numDeclaration,numLiquidation,circuit,montanDeclaration,dateValidation,typeChargement,conteneurisation,dateMiseEnLivraison,dateLivraison,dateReception,dosMultiDeclaration,bl,observLivraison,navire,port,dateNavire,datePassage,lieu,modeLivraison,modeChargemenAerien,lta,vol,aeroportDepart,dateArrivee,dateBl,emailOuv,emailCota,emailrfcv,emailfdi,emailvalid,emailpass,emaillivr,okrfcv,okfdi,libClient,imageUrl,agentCotation,dateVisite,verificateur,verifObserv,user_id,transporteur_id,client_id,buro_id,compagnie_id,nomCompagnie,created_at,updated_at)<br/>
                             -failed_jobs(id,uuid,connection,queue,payload,exception,failed_at)<br/>
                             -fdis(id,dossier_id,dateFdiSou,numFdiSoumi,dateFdiVal,numFdiValide,fdiAnnule,fdiAnnuleMotif,observFdi,statut,imageUrl,created_at,updated_at)<br/>
                             -jobs(id,queue,payload,attempts,reserved_at,available_at,created_at)<br/>
                             -log_activities(id,subject,url,method,ip,agent,user_id,created_at,updated_at)<br/>
                             -migrations(id,migration,batch)<br/>
                             -notifications(id,type,notifiable_type,data,read_at,created_at,updated_at)<br/>
                             -password_resets(email,token,created_at)<br/>
                             -password_reset_tokens(email,token,created_at)<br/>
                             -personal_access_tokens(id,tokenable_type,tokenable_id,name,token,abilities,last_used_at,expires_at,created_at,updated_at)<br/>
                             -rfcvs(id,dossier_id,dateRfcvSou,numRfcvSoumi,dateRfcvVal,numRfcvValide,rfcvAnnule,rfcvAnnuleMotif,observRfcv,statut,imageUrl,created_at,updated_at)<br/>
                             -services(id,nomService,created_at,updated_at)<br/>
                             -transporteurs(id,nomTransporteur,contacTransp,created_at,updated_at)<br/>
                             -users(id,nom,prenom,sexe,type,photo,matricule,email,email_verified_at,<br/>password,client_id,detachement_id,service_id,remember_token,created_at,updated_at)<br/><br/>
                             <p class="text-danger">NB : Dans les relations de père à fils (n,1), veuillez supprimer les fils avant les pères.</p>
                          