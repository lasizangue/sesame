<div  class="row p-1 pt-0">
    <table class="table border-top border-bottom border-left border-right mb-0">
        <tr>
            <td > 
                <img src="data:image/jpg;base64,<?php echo base64_encode(file_get_contents(base_path('resources/images/LOGO.jpg'))); ?>" width="300",height="300" >
            </td>
                <td class="ml-auto pt-4">
                        @if ($dossier->typeChargement=="TC Plein")
                                @if ($dossier->acconier->nomAcconier=="AGL" || $dossier->acconier->nomAcconier=="Delmas")
                                    <h4 class="mb-0 text-center">{{$dossier->numDossier}}</h4>
                                    @else
                                    <h4 class="mb-0 text-center">ORDRE DE LIVRAISON TC IMPORT </h4>
                                @endif  
                        @endif
                        
                        @if ($dossier->typeChargement=="Degroupage")
                            <h4 class="mb-0 text-center">BORDEREAU DE LIVRAISON (DGP)</h4>
                        @endif
                        <p class="text-center "><font size="1">Tél: 27.21.24.10.31 - Adresse : 01 BP 8093 Abidjan 01<br/>
                        Treichville Zone portuaire, Rue des Gallions - Abidjan - Côte d'ivoire</font></p>
                 </td>                               
        </tr>
    </table>
</div>




                        