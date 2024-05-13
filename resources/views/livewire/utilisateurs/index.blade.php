@section("titre")
    Habilitations - Transit général rapide
@endsection

<div wire:ignore.self>
    
     @if($currentPage==PAGECREATEFORM)
        @include("livewire.utilisateurs.create")
    @endif

    @if ($currentPage==PAGEEDITFORM)
        @include("livewire.utilisateurs.edit")
    @endif

    @if ($currentPage==PAGELIST)
        @include("livewire.utilisateurs.table")
            @if (session()->has('message'))
                        <div class="alert alert-info">
                                {{ session('message') }}
                        </div>
            @endif
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
               const user_id = event.detail.message.data.user_id
            if(user_id){
                @this.deleteUser(user_id)
            }
          }
          })
        })
   </script>



 