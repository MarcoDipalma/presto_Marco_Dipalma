<x-layout>
    
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-12 text-center text-white">
                <h1>{{__('ui.Pubblica un articolo')}}</h1>
            </div>
        </div>

        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-6">
                <livewire:create-article-form/>
            </div>
        </div>

    </div>

</x-layout>