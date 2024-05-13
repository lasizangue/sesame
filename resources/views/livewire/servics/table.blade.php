<div class="row p-4 pt-5">
    <div class="col-12">
        <div class="card">
            <form role="form">
                    @csrf
            <div class="card-header bg-primary">
                <h3 class="card-title d-flex align-items-center flex-grow-1"><i class="fab fa-servicestack fa-lg mr-1"></i>Table des services</h3>
            <div class="card-tools d-flex align-items-center">
                
                <a class="btn btn-link text-white mr-4 d-block" wire:click.prevent="ajoutService()"><i class="fas fa-plus mr-1"></i>Nouveau service</a>
                <div class="input-group input-group-sm" style="width: 250px;">
                    <input type="text" name="table_search" wire:model.debounce="search" class="form-control float-right" placeholder="Search">
                    <div class="input-group-append">

                        <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        </form>
        
        <div class="card-body table-responsive p-0 table-striped" style="height: 300px;">
            <table class="table table-head-fixed text-nowrap">
            <thead>
                <tr>
                    <th style="width:15%" >ID</th>
                    <th style="width:50%" >Service</th>
                    <th style="width:20%" class="text-center">Ajouté</th>
                    <th style="width:15%" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $service)
                <tr>
                    <td>{{$service->id}}</td>
                    <td>{{$service->nomService}}</td>
                    <td class="text-center">@if($service->created_at!="")
                    {{$service->created_at->format('d/m/y')}}
                    @endif</td>
                    <td class="text-center">
                    <button class="btn btn-link" wire:click='goToEditService({{$service->id}})'><i class="far fa-edit"></i></button>
                    <button class="btn btn-link" wire:click="confirmDelete({{$service->id}})"><i class="fas fa-trash-alt" ></i></button>
                    </td>
                    
                </tr>
                @endforeach

            </tbody>
            </table>
        </div>
            <div class="card-footer">
                <div class="float-right">
                    {{$services->links()}}
                </div>
                    
            </div>
        </div>
    </div>
    </div>

 

    

    

   