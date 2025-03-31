<x-layout>

    @if (session('errorMessage'))
        <div class="alert mx-auto mt-5 alert-danger text-center shadow rounded w-50">
            {{ session('errorMessage') }}
        </div>
    @endif

    @if (session()->has('message'))
        <div class="alert mx-auto mt-5 alert-success text-center shadow rounded w-50">
            {{ session('message') }}
        </div>
    @endif

    <div class="container-fluid text-center">        
        <div class="row hustify-content-center align-items-center vh-100">
            <div class="col-12">
                <h1 class="display-1 text-white">Presto.it</h1>
                @auth
                <a class="btn btn-outline-light" href="{{route('article.create')}}">{{__('ui.Crea il tuo articolo')}}</a>
                @endauth
            </div>
        </div>

        <!-- Numeri incrementali -->

        <section class="container mt-5">
            <div class="row">
                <div class="col-12 col-md-6 text-white">
                    <img src="{{asset("storage/images/GraficoHomepage.png")}}" alt="immagine casuale grafici" style="width: 100%">
                </div>
                <div class="col-12 col-md-6">
                    <h3 class="display-4 text-center fw-normal">Un po' di numeri</h3>

                    <h2 class="display-6"> <span class="number" id="primoNumero">0</span> Prodotti venduti</h2>
                    <h2 class="display-6"> <span class="number"  id="secondoNumero">0</span> Clienti soddisfatti</h2>
                    <h2 class="display-6"> <span class="number"  id="terzoNumero">0</span> Visite giornaliere</h2>
                </div>
            </div>
        </section>

        <!-- Fine Numeri incrementali -->

        <div class="row justify-content-center align-items-center mt-5 py-5">

            @forelse ($articles as $article)
                
                <div class="col-6 col-md-4">
                    <x-card :article=$article />
                </div>
                
            @empty

                <div class="col-12">
                    <h3 class="display-6 fw-normal text-center">{{__('ui.Non ci sono articoli')}}</h3>
                    @auth
                    <a class="btn btn-primary" href="{{route('article.create')}}">{{__('ui.Crea articolo')}}</a>
                    @endauth
                </div>
                
            @endforelse
        </div>

    </div>
</x-layout>