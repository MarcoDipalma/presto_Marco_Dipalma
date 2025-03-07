<x-layout>
    <div class="container-fluid text-center">
        <div class="row hustify-content-center align-items-center vh-75">
            <div class="col-12">
                <h1 class="display-1 text-white">Presto.it</h1>
                @auth
                <a class="btn btn-outline-light" href="{{route('article.create')}}">Crea il tuo articolo</a>
                @endauth
            </div>
        </div>

        <div class="row justify-content-center align-items-center py-5">
            @forelse ($articles as $article)
                
                <div class="col-12 col-md-3">
                    <x-card :article=$article />
                </div>
                
            @empty

                <div class="col-12">
                    <h3 class="display-6 fw-normal text-center">Non ci sono articoli</h3>
                    @auth
                    <a class="btn btn-primary" href="{{route('article.create')}}">Crea Articolo</a>
                    @endauth
                </div>
                
            @endforelse
        </div>

    </div>
</x-layout>