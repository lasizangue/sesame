@section("titre")
    Gestion des transporteurs - Transit général rapide
@endsection

<div wire:ignore.self>
    @if($currentPage==PAGECREATEFORM)
        @include("livewire.transporteurs.create")
    @endif

    @if ($currentPage==PAGEEDITFORM)
        @include("livewire.transporteurs.edit")
    @endif

    @if ($currentPage==PAGELIST)
        @include("livewire.transporteurs.liste")
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
               const transporteur_id = event.detail.message.data.transporteur_id
            if(transporteur_id){
                @this.deleteTransporteur(transporteur_id)
            }
          }
          })
        })
   </script>

   <script>
            window.addEventListener("showMessageDeleteTransporteur",event=>{
            Swal.fire({
                position: 'top-end',
                icon:"success",
                title: event.detail.message || "Opération effectuée avec succès!",
                showConfirmButton: false,
                timer: 1500
        })
        })

   </script>







