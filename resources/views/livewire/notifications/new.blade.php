@section("titre")
    Les six dernières notifications - Transit général rapide
@endsection
<div class="row p-3 pt-2 ">
          <div class="bg-gray" style="width: 100%"><h2 class="ml-3">Notifications</h2></div>
          
        <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-header">
                            <h3 class="card-title text-indigo">Message(s) non lu(s)</h3>
                            
                    <div class="card-tools">
                        
                    <div class="input-group input-group-sm" style="width: 500px;">
                        <a  class="btn btn-link mr-5" wire:click.prevent='marquer()' style="width: 200px;">Marqués comme lus</a>
                            {{--<input type="text" name="table_search" class="form-control float-right" placeholder="Search">--}}

                    <div class="input-group-append">
                        
                            {{--<button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                            </button>--}}
                            
                    </div>
                    </div>
                    </div>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-head-fixed table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th >Action</th>
                                    <th >Read_at</th>
                                    <th >Type</th>
                                    <th >Notifiable_type</th>
                                    
                                    <th >Data</th>
                                    <th >Created_at</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($unNotifications as $unNotification)
                               
                                <tr>
                                        <td >
                                            <button  class="btn btn-link " wire:click.prevent='goToNotify({{$unNotification}})' ><i class="far fa-envelope"></i></button>
                                        </td>

                                        <td>
                                        @if ($unNotification->read_at==null)
                                            {{null}}
                                            @else
                                        {{Carbon\Carbon::parse($unNotification->read_at)->format('d-m-Y') }}
                                        @endif
                                        </td>

                                        <td>{{$unNotification->type}}</td>

                                        <td >{{$unNotification->notifiable_type}}
                                        </td>

                                        <td>
                                     
                                         {!! json_encode ($unNotification->data)!!}

                                        </td>

                                        <td>{{Carbon\Carbon::parse($unNotification->created_at)->format('d-m-Y') }}
                                        </td>
                                        
                                </tr>
                                    @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                    <div card="footer">
                        
                    </div>
                 </div>
          </div>
</div>
