<div class="row">
          <div class="col-6">
                    <h3>Message</h3>
          </div>
          <div class="col-6">
                    @if ($all==false)
                         <div class="float-right"><button type="button" class="btn btn-block btn-outline-dark btn-lg mt-2" wire:click.prevent='goToNew()' style="width: 200px;">Retour</button></div> 

                         @else

                         <div class="float-right"><button type="button" class="btn btn-block btn-outline-primary btn-lg mt-2" wire:click.prevent='goToAll()' style="width: 200px;">Retour</button></div>      
                    @endif
     
          </div>
</div>
<label>Date message :</label>
{{Carbon\Carbon::parse($editNotification['created_at'])->format('d-m-Y') }}

<div><label>Type message :</label>      
{{$editNotification['type']}}</div>

<div><label>Corps :</label>{!! json_encode ($editNotification['data'])!!}</div>    

<br>
<div><label>Message lu le :</label>
          @if(isset($editNotification['read_at']))
                    {{Carbon\Carbon::parse($editNotification['read_at'])->format('d-m-Y') }}
          @endif
</div>

                        