@section("titre")
        Gestion des services - Transit général rapide
@endsection

<div wire:ignore.self>
     @if($currentPage==PAGECREATEFORM)
        @include("livewire.servics.create")
    @endif

    @if ($currentPage==PAGEEDITFORM)
        @include("livewire.servics.edit")
   @endif

   @if ($currentPage==PAGELIST)
        @include("livewire.servics.table")
    @endif


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
               const service_id = event.detail.message.data.service_id
            if(service_id){
                @this.deleteService(service_id)
            }
          }
          })
        })
   </script>

   <script>
            window.addEventListener("showMessageDeleteDetachement",event=>{
            Swal.fire({
                position: 'top-end',
                icon:"success",
                title: event.detail.message || "Opération effectuée avec succès!",
                showConfirmButton: false,
                timer: 1500
        })
        })

   </script>
 

 