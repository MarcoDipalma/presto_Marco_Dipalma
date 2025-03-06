<x-layout>
    <div class="container-fluid text-center">
        <div class="row vh-100 hustify-content-center align-items-center">
            <div class="col-12">
                <h1 class="display-1 text-white">Presto.it</h1>
                @auth
                <a class="btn btn-outline-light" href="{{route('article.create')}}">Crea il tuo articolo</a>
                @endauth
            </div>
        </div>
    </div>
</x-layout>