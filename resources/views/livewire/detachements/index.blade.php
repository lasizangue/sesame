@section("titre")
    Gestion des détachements - Transit général rapide
@endsection

<div wire:ignore.self>
    @if($currentPage==PAGECREATEFORM)
        @include("livewire.detachements.create")
    @endif

    @if ($currentPage==PAGEEDITFORM)
        @include("livewire.detachements.edit")
   @endif

   @if ($currentPage==PAGELIST)
        @include("livewire.detachements.table")
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
               const detachement_id = event.detail.message.data.detachement_id
            if(detachement_id){
                @this.deleteDetachement(detachement_id)
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
 