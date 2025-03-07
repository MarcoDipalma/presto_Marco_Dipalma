<div>
    
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form wire:submit="store" class="shadow-lg p-3 mb-5 bg-black.bg-gradient rounded">

        <div class="mb-3">
            <label for="title" class="form-label">Titolo:</label>
            <input type="text" wire:model.blur="title" class="form-control" id="title" @error('title') is-invalid @enderror>
            <div class="text-danger">@error('title') {{ $message }} @enderror</div>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione:</label>
            <textarea type="text" wire:model.blur="description" class="form-control" id="description" cols="30" rows="10"></textarea @error('description') is-invalid @enderror>
            <div class="text-danger">@error('description') {{ $message }} @enderror</div>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Prezzo:</label>
            <input type="text" wire:model.blur="price" class="form-control" id="price" @error('price') is-invalid @enderror>
            <div class="text-danger">@error('price') {{ $message }} @enderror</div>
        </div>

        <div class="mb-3">
            <select wire:model.blur="category" id="category" class="form-control" @error('category') is-invalid @enderror>
                <option label disabled>Seleziona una categoria</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            <div class="text-danger">@error('category') {{ $message }} @enderror</div>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Salva</button>
        </div>
    </form>

</div>
