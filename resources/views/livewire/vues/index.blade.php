
<div wire:ignore.self>
     @if (auth()->user()->detachement->nomDetachement === "ESPACE CLIENTS")
            
               @if ($vueaccueil==true && $vueouv==false && $vuecot==false && $vuedoc==false && $vuevalid==false && $vuepassage==false && $vuemiseliv==false && $vuepmliv==false && $vueliv==false && $vueliva==false)
                     @include("livewire.vues.bordclient")
               @endif

               @if ($vueaccueil==false && $vueouv==true && $vuecot==false && $vuedoc==false && $vuevalid==false && $vuepassage==false && $vuemiseliv==false && $vuepmliv==false && $vueliv==false && $vueliva==false)
                
                     @include("livewire.vues.ouv")
               @endif

               @if ($vueaccueil==false && $vueouv==false && $vuecot==true && $vuedoc==false && $vuevalid==false && $vuepassage==false && $vuemiseliv==false && $vuepmliv==false && $vueliv==false && $vueliva==false)
                     @include("livewire.vues.cota")
               @endif

               @if ($vueaccueil==false && $vueouv==false && $vuecot==false && $vuedoc==true && $vuevalid==false && $vuepassage==false && $vuemiseliv==false && $vuepmliv==false && $vueliv==false && $vueliva==false)
                     @include("livewire.vues.doc")
               @endif

               @if ($vueaccueil==false && $vueouv==false && $vuecot==false && $vuedoc==false && $vuevalid==true && $vuepassage==false && $vuemiseliv==false && $vuepmliv==false && $vueliv==false && $vueliva==false)
                     @include("livewire.vues.vali")
               @endif

               @if ($vueaccueil==false && $vueouv==false && $vuecot==false && $vuedoc==false && $vuevalid==false && $vuepassage==true && $vuemiseliv==false && $vuepmliv==false && $vueliv==false && $vueliva==false)
                     @include("livewire.vues.passag")
               @endif

               @if ($vueaccueil==false && $vueouv==false && $vuecot==false && $vuedoc==false && $vuevalid==false && $vuepassage==false && $vuemiseliv==true && $vuepmliv==false && $vueliv==false && $vueliva==false)
                     @include("livewire.vues.mliv")
               @endif

               @if ($vueaccueil==false && $vueouv==false && $vuecot==false && $vuedoc==false && $vuevalid==false && $vuepassage==false && $vuemiseliv==true && $vuepmliv==true && $vueliv==false && $vueliva==false)
                     @include("livewire.vues.pmlivraison")
               @endif

               @if ($vueaccueil==false && $vueouv==false && $vuecot==false && $vuedoc==false && $vuevalid==false && $vuepassage==false && $vuemiseliv==false && $vuepmliv==false && $vueliv==true && $vueliva==false)
                     @include("livewire.vues.liv")
               @endif

                @if ($vueaccueil==false && $vueouv==false && $vuecot==false && $vuedoc==false && $vuevalid==false && $vuepassage==false && $vuemiseliv==false && $vuepmliv==false && $vueliv==false && $vueliva==true && $vexpnv==false && $vueConteneur==false)
                     @include("livewire.vues.liva")
               @endif

          @else
              
               @if ($vueaccueil==true && $vueouv==false && $vuecot==false && $vuedoc==false && $vuevalid==false && $vuepassage==false && $vuemiseliv==false && $vuepmliv==false && $vueliv==false && $vueliva==false && $vexpnv==false && $vueConteneur==false )   
                     @include("livewire.vues.bord")
               @endif

               @if ($vueaccueil==false && $vueouv==false && $vuecot==false && $vuedoc==false && $vuevalid==false && $vuepassage==false && $vuemiseliv==false && $vuepmliv==false && $vueliv==false && $vueliva==false && $vexpnv==false && $vueConteneur==true )
                     @include("livewire.vues.conteneur")
               @endif

               @if ($vueaccueil==false && $vueouv==false && $vuecot==false && $vuedoc==false && $vuevalid==false && $vuepassage==false && $vuemiseliv==false && $vuepmliv==false && $vueliv==false && $vueliva==false && $vexpnv==true && $vueConteneur==false )
                      @include("livewire.vues.expnvalid")
               @endif

               @if ($vueaccueil==false && $vueouv==false && $vuecot==false && $vuedoc==false && $vuevalid==false && $vuepassage==false && $vuemiseliv==false && $vuepmliv==false && $vueliv==false && $vueliva==false && $vexpnv==false && $vimpnv==true && $vueConteneur==false )
                      @include("livewire.vues.impnvalid")
               @endif

               @if ($vueaccueil==false && $vueouv==false && $vuecot==false && $vuedoc==false && $vuevalid==false && $vuepassage==false && $vuemiseliv==false && $vuepmliv==false && $vueliv==false && $vueliva==false && $vexpnv==false && $vimpnv==false && $vliclien==true && $vueConteneur==false)
                      @include("livewire.vues.liclients")
               @endif

               @if ($vueaccueil==false && $vueouv==false && $vuecot==false && $vuedoc==false && $vuevalid==false && $vuepassage==false && $vuemiseliv==false && $vuepmliv==false && $vueliv==false && $vueliva==false && $vexpnv==false && $vouve==true && $vueConteneur==false )
                      @include("livewire.vues.ouve")
               @endif

               @if ($vueaccueil==false && $vueouv==false && $vuecot==false && $vuedoc==false && $vuevalid==false && $vuepassage==false && $vuemiseliv==false && $vuepmliv==false && $vueliv==false && $vueliva==false && $vexpnv==false && $vimpnv==false && $vouvi==true && $vueConteneur==false )
                      @include("livewire.vues.ouvi")
               @endif

               @if ($vueaccueil==false && $vueouv==false && $vuecot==false && $vuedoc==false && $vuevalid==false && $vuepassage==false && $vuemiseliv==false && $vuepmliv==false && $vueliv==false && $vueliva==false && $vexpnv==false && $vcote==true && $vueConteneur==false )
                      @include("livewire.vues.cotae")
               @endif

                @if ($vueaccueil==false && $vueouv==false && $vuecot==false && $vuedoc==false && $vuevalid==false && $vuepassage==false && $vuemiseliv==false && $vuepmliv==false && $vueliv==false && $vueliva==false && $vexpnv==false && $vimpnv==false && $vcoti==true && $vueConteneur==false )
                      @include("livewire.vues.cotai")
               @endif

               @if ($vueaccueil==false && $vueouv==false && $vuecot==false && $vuedoc==false && $vuevalid==false && $vuepassage==false && $vuemiseliv==false && $vuepmliv==false && $vueliv==false && $vueliva==false && $vexpnv==false && $vdoce==true && $vueConteneur==false)
                      @include("livewire.vues.doce")
               @endif

               @if ($vueaccueil==false && $vueouv==false && $vuecot==false && $vuedoc==false && $vuevalid==false && $vuepassage==false && $vuemiseliv==false && $vuepmliv==false && $vueliv==false && $vueliva==false && $vexpnv==false && $vimpnv==false && $vdoci==true && $vueConteneur==false)
                      @include("livewire.vues.doci")
               @endif

               @if ($vueaccueil==false && $vueouv==true && $vuecot==false && $vuedoc==false && $vuevalid==false && $vuepassage==false && $vuemiseliv==false && $vuepmliv==false && $vueliv==false && $vueliva==false && $vexpnv==false && $vueConteneur==false)
                     @include("livewire.vues.ouv")      
               @endif
            
               @if ($vueaccueil==false && $vueouv==false && $vuecot==true && $vuedoc==false && $vuevalid==false && $vuepassage==false && $vuemiseliv==false && $vuepmliv==false && $vueliv==false && $vueliva==false && $vexpnv==false && $vueConteneur==false)
                     @include("livewire.vues.cota")
               @endif

               @if ($vueaccueil==false && $vueouv==false && $vuecot==false && $vuedoc==true && $vuevalid==false && $vuepassage==false && $vuemiseliv==false && $vuepmliv==false && $vueliv==false && $vueliva==false && $vexpnv==false && $vueConteneur==false)
                     @include("livewire.vues.doc")
               @endif

               @if ($vueaccueil==false && $vueouv==false && $vuecot==false && $vuedoc==false && $vuevalid==true && $vuepassage==false && $vuemiseliv==false && $vuepmliv==false && $vueliv==false && $vueliva==false && $vexpnv==false && $vueConteneur==false)
                     @include("livewire.vues.vali")
               @endif

               @if ($vueaccueil==false && $vueouv==false && $vuecot==false && $vuedoc==false && $vuevalid==false && $vuepassage==true && $vuemiseliv==false && $vuepmliv==false && $vueliv==false && $vueliva==false && $vexpnv==false && $vueConteneur==false)
                     @include("livewire.vues.passag")
               @endif

               @if ($vueaccueil==false && $vueouv==false && $vuecot==false && $vuedoc==false && $vuevalid==false && $vuepassage==false && $vuemiseliv==true && $vuepmliv==false && $vueliv==false && $vueliva==false && $vexpnv==false && $vueConteneur==false)
                     @include("livewire.vues.mliv")
               @endif

               @if ($vueaccueil==false && $vueouv==false && $vuecot==false && $vuedoc==false && $vuevalid==false && $vuepassage==false && $vuemiseliv==false && $vuepmliv==true && $vueliv==false && $vueliva==false)
                     @include("livewire.vues.pmlivraison")
               @endif

               @if ($vueaccueil==false && $vueouv==false && $vuecot==false && $vuedoc==false && $vuevalid==false && $vuepassage==false && $vuemiseliv==false && $vuepmliv==false && $vueliv==true && $vueliva==false && $vexpnv==false && $vueConteneur==false)
                     @include("livewire.vues.liv")
               @endif

               @if ($vueaccueil==false && $vueouv==false && $vuecot==false && $vuedoc==false && $vuevalid==false && $vuepassage==false && $vuemiseliv==false && $vuepmliv==false && $vueliv==false && $vueliva==true && $vexpnv==false && $vueConteneur==false)
                     @include("livewire.vues.liva")
               @endif
              
               @if ($vueaccueil==false && $vGene==true && $vDeclaMens==true && $vDosNv==false && $vDosExp==false && $vClienCirc==false && $vClienOuvertu==false && $vClienValid==false && $vClienType==false )
              
                     @include("livewire.vues.generatio")
               @endif

               @if ($vueaccueil==false && $vGene==true && $vDeclaMens==false && $vDosNv==true && $vDosExp==false && $vClienCirc==false && $vClienOuvertu==false && $vClienValid==false && $vClienType==false )
                     @include("livewire.vues.generatio")
               @endif

               @if ($vueaccueil==false && $vGene==true && $vDeclaMens==false && $vDosNv==false && $vDosExp==true && $vClienCirc==false && $vClienOuvertu==false && $vClienValid==false && $vClienType==false)
                     @include("livewire.vues.generatio")
               @endif

               @if ($vueaccueil==false && $vGene==true && $vDeclaMens==false && $vDosNv==false && $vDosExp==false && $vClienCirc==true && $vClienOuvertu==false && $vClienValid==false && $vClienType==false)
                     @include("livewire.vues.generatio")
               @endif

               @if ($vueaccueil==false && $vGene==true && $vDeclaMens==false && $vDosNv==false && $vDosExp==false && $vClienCirc==false && $vClienOuvertu==true && $vClienValid==false && $vClienType==false)
                     @include("livewire.vues.generatio")
               @endif

               @if ($vueaccueil==false && $vGene==true && $vDeclaMens==false && $vDosNv==false && $vDosExp==false && $vClienCirc==false && $vClienOuvertu==false && $vClienValid==true && $vClienType==false)
                     @include("livewire.vues.generatio")
               @endif

               @if ($vueaccueil==false && $vGene==true && $vDeclaMens==false && $vDosNv==false && $vDosExp==false && $vClienCirc==false && $vClienOuvertu==false && $vClienValid==false && $vClienType==true)
                     @include("livewire.vues.generatio")
               @endif

     @endif
</div>
