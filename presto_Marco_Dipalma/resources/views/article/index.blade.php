<x-layout>

    <div class="container-fluid text-center pt-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 text-center text-white">
                <h1>Tutti gli articoli</h1>
            </div>
        </div>

        <div class="row justify-content-center align-items-center py-5">
            @forelse ($articles as $article)
                <div class="col-12 col-md-4">
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
    <div class="d-flex justify-content-center">
        <div>
            {{$articles->links()}}
        </div>
    </div>

</x-layout>