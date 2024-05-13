@section("titre")
    Toutes les notifications - Transit général rapide
@endsection
          <div class="bg-gray" style="width: 100%"><h2 class="ml-3">Notifications</h2></div>
          
        <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-header">
                            <h3 class="card-title text-indigo">All notifications</h3>
                    <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 500px;">
                            {{--<input type="text" name="table_search" class="form-control float-right" placeholder="Search">--}}
                    <div class="input-group-append">
                            {{--<button type="submit"         class="btn btn-default">
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
                                @foreach($notifications as $notification)
                               
                                <tr>
                                        <td >
                                            <button  class="btn btn-link " wire:click.prevent='goToNotifyAll({{$notification}})' ><i class="far fa-envelope"></i></button>
                                        </td>

                                        <td>
                                        @if ($notification->read_at==null)
                                            {{null}}
                                            @else
                                        {{Carbon\Carbon::parse($notification->read_at)->format('d-m-Y') }}
                                        @endif
                                        </td>

                                        <td>{{$notification->type}}</td>

                                        <td >{{$notification->notifiable_type}}
                                        </td>

                                        <td>
                                     
                                         {!! json_encode ($notification->data)!!}

                                        </td>

                                        <td>{{Carbon\Carbon::parse($notification->created_at)->format('d-m-Y') }}
                                        </td>
                                        
                                </tr>
                                    @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                    

                 </div>

          </div>
  

