@section("titre")
        Gestion des dossiers - Transit général rapide
@endsection
<div wire:ignore.self>
 
   @if ($currentPage==PAGEEDITFORM)
        @include("livewire.dossiers.edit")
   @endif

   @if ($currentPage==PAGELIST)
        @include("livewire.dossiers.table")   
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
               const dossier_id = event.detail.message.data.dossier_id
            if(dossier_id){
                @this.deleteDossier(dossier_id)
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

 