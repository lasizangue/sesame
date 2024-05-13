<nav class="mt-2">
        {{--CLIENT--}}
        @if (auth()->user()->detachement->nomDetachement === "EXPORT" OR auth()->user()->detachement->nomDetachement === "MARITIME" OR auth()->user()->detachement->nomDetachement === "SAISIE" OR auth()->user()->detachement->nomDetachement=== "DIRECTION" OR auth()->user()->detachement->nomDetachement === "CHEF" OR auth()->user()->detachement->nomDetachement === "LIVRAISON" OR auth()->user()->detachement->nomDetachement=== "AERIEN" OR auth()->user()->detachement->nomDetachement === "INFORMATIQUE" OR auth()->user()->detachement->nomDetachement=== "OPERATIONNEL" OR auth()->user()->detachement->nomDetachement=== "DOCUMENTATION" OR auth()->user()->detachement->nomDetachement=== "ESPACE CLIENTS")
           <x-clien/>
         @endif

        {{--DIRECTION--}}
        @if (auth()->user()->detachement->nomDetachement=== "DIRECTION" OR auth()->user()->detachement->nomDetachement === "CHEF")
           <x-direction/>
         @endif
       
        {{--DOCUMENTATION--}}
        @if (auth()->user()->detachement->nomDetachement=== "DOCUMENTATION")
            <x-documentation/>
        @endif

        {{--EXPORT-MARITIME-AERIEN--}}
        @if (auth()->user()->detachement->nomDetachement=== "EXPORT" OR auth()->user()->detachement->nomDetachement === "MARITIME" )
            <x-ema/>
        @endif

        {{--INFORMATIQUE--}}
        @if (auth()->user()->detachement->nomDetachement === "INFORMATIQUE")
            <x-informatique/>
        @endif

         {{--LIVRAISON--}}
        @if (auth()->user()->detachement->nomDetachement === "LIVRAISON")
            <x-livraison/>
        @endif

          {{--aerien--}}
        @if (auth()->user()->detachement->nomDetachement === "AERIEN")
            <x-aerien/>
        @endif

        {{--OPERATIONNEL--}}
        @if (auth()->user()->detachement->nomDetachement === "OPERATIONNEL")
            <x-operationel/>
        @endif

        {{--OUVERTURE--}}
        @if (auth()->user()->detachement->nomDetachement === "SAISIE" )
            <x-ouverture/>
        @endif
  </nav>
