@section("titre")
    Gestion des acconiers - Transit général rapide
@endsection

<div wire:ignore.self>
     @if($currentPage==PAGECREATEFORM)
        @include("livewire.acconiers.create")
    @endif

    @if ($currentPage==PAGEEDITFORM)
        @include("livewire.acconiers.edit")
   @endif

   @if ($currentPage==PAGELIST)
        @include("livewire.acconiers.liste")
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
               const acconier_id = event.detail.message.data.acconier_id
            if(acconier_id){
                @this.deleteAcconier(acconier_id)
            }
          }
          })
        })
   </script>

   <script>
            window.addEventListener("showMessageDeleteAcconier",event=>{
            Swal.fire({
                position: 'top-end',
                icon:"success",
                title: event.detail.message || "Opération effectuée avec succès!",
                showConfirmButton: false,
                timer: 1500
        })
        })

   </script>
 

