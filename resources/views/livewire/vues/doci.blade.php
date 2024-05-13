<div class="row p-4 pt-5">
        <div class="card card-success " style="width:100%;">
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

        <div class="card card-success" style="width:100%">
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
                        <button type="button" wire:click.prevent="impnonvalid()" class="btn btn-danger">Retour</button>
                    </div>
             </div>
          </form>
        </div>
</div>