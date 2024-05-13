@section("titre")
     Documentation Rfcv - Fdi - Transit général rapide
@endsection
<div wire.ignore.self>

   @if ($currentPage==PAGEEDITFORM)
        @include("livewire.rfcvs.edit")
   @endif

   @if ($currentPage==PAGELIST)
        @include("livewire.rfcvs.liste")
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
               const rfcv_id = event.detail.message.data.rfcv_id
            if(rfcv_id){
                @this.deleteRfvc(rfcv_id)
            }
          }
          })
        })
   </script>

   <script>
            window.addEventListener("showMessageDeleteRfcv",event=>{
            Swal.fire({
                position: 'top-end',
                icon:"success",
                title: event.detail.message || "Opération effectuée avec succès!",
                showConfirmButton: false,
                timer: 1500
        })
        })

   </script>

   <script>
  window.addEventListener("showConfirmMessageFdi",event=>{
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
               const fdi_id = event.detail.message.data.fdi_id
            if(fdi_id){
                @this.deleteFdi(fdi_id)
            }
          }
          })
        })
   </script>

   <script>
            window.addEventListener("showMessageDeleteFdi",event=>{
            Swal.fire({
                position: 'top-end',
                icon:"success",
                title: event.detail.message || "Opération effectuée avec succès!",
                showConfirmButton: false,
                timer: 1500
        })
        })

   </script>

