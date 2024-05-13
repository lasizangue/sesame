<h4>Logs : activités utilisateur</h4>
<div class="row ">
    <div class="col-12">
        <div class="card">
            <form role="form">
                @csrf
            <div class="card-header bg-secondary">
                <i class="fas fa-chart-line fa-lg mr-2"> Table des logs</i>
                 
            <div class="card-tools d-flex align-items-center">
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

        <div class="card-body table-responsive p-0 table-hover" >
            <table class="table table-head-fixed">
            <thead>
                <tr>
                    <th style="width:10%" >ID</th>
                    <th style="width:10%" >Subject</th>
                    <th style="width:10%" >Url</th>
                    <th style="width:10%" >Method</th>
                    <th style="width:10%" >Ip</th>
                    <th style="width:10%" >Agent</th>
                    <th style="width:10%" >User_id</th>
                    <th style="width:10%" class="text-center">Ajouté</th>
                    <th style="width:10%" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($logs as $log)
                <tr>
                
                    <td>{{$log->id}}</td>
                    <td>{{$log->subject}}</td>
                    <td>{{$log->url}}</td>
                    <td>{{$log->method}}</td>
                    <td>{{$log->ip}}</td>
                    <td>{{$log->agent}}</td>
                    <td>{{$log->user_id}}</td>
                    <td class="text-center">{{$log->created_at->diffForHumans()}}</td>
                    <td class="text-center">
                    <button class="btn btn-link" wire:click="confirmDelete({{$log->id}})"><i class="fas fa-trash-alt" ></i></button>
                    </td>
                    
                </tr>
                @endforeach

            </tbody>
            </table>
        </div>
        </div>
    </div>
    </div>

    <script>
  window.addEventListener("showConfirmMessage",event=>{
     Swal.fire({
          title: event.detail.message.title,
          text: event.detail.message.text,
          icon: event.detail.message.type,
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Continuer',
          cancelButtonText: 'Annuler'
          }).then((result) => {
          if (result.isConfirmed) {
               const logactivitie_id = event.detail.message.data.logactivitie_id
            if(logactivitie_id){
                @this.deleteLog(logactivitie_id)
            }
          }
          })
        })
   </script>

<script>
            window.addEventListener("showMessageDeleteDossier",event=>{
            Swal.fire({
                position: 'top-end',
                icon:"success",
                title: event.detail.message || "Opération effectuée avec succès!",
                showConfirmButton: false,
                timer: 1500
        })
        })

   </script>


 

    

    

   