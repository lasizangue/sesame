@section("titre")
    Gestion des clients - Transit général rapide
@endsection

<div wire:ignore.self>
     @if($currentPage==PAGECREATEFORM)
        @include("livewire.cliens.create")
    @endif

    @if ($currentPage==PAGEEDITFORM)
        @include("livewire.cliens.edit")
   @endif

   @if ($currentPage==PAGELIST)
        @include("livewire.cliens.table")
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
               const client_id = event.detail.message.data.client_id
            if(client_id){
                @this.deleteClient(client_id)
            }
          }
          })
        })
   </script>

   <script>
            window.addEventListener("showMessageDeleteClient",event=>{
            Swal.fire({
                position: 'top-end',
                icon:"success",
                title: event.detail.message || "Opération effectuée avec succès!",
                showConfirmButton: false,
                timer: 1500
        })
        })

   </script>

 