<?php

namespace App\Livewire;

use Illuminate\Support\Facades\File;
use App\Models\Article;
use Livewire\Component;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;

class CreateArticleForm extends Component
{

    use WithFileUploads;

    #[Validate('required', message:'Il campo è obbligatorio')]
    #[Validate('min:3', message:'Il campo richiede minimo 3 caratteri')]
    public $title;

    #[Validate('required', message:'Il campo è obbligatorio')]
    #[Validate('min:10', message:'Il campo richiede minimo 10 caratteri')]
    public $description;
    
    #[Validate('required', message:'Il campo è obbligatorio')]
    #[Validate('numeric', message:'Il campo richiede un numero')]
    public $price;

    #[Validate('required', message:'Il campo è obbligatorio')]
    public $category;
    public $article;

    public $images=[];
    public $temporary_images;


    public function store(){
        
        $this->validate();

        $this->article=Article::create([
            'title'=>$this->title,
            'description'=>$this->description,
            'price'=>$this->price,
            'category_id'=>$this->category,
            'user_id'=>Auth::id(),
        ]);

        if(count($this->images) > 0){
            foreach($this->images as $image){
                $newFileName = "articles/{$this->article->id}";
                $newImage = $this->article->images()->create(['path' => $image->store($newFileName, 'public')]);
                // dispatch(new ResizeImage($newImage->path, 300, 300));
                // dispatch(new GoogleVisionSafeSearch($newImage->id));
                // dispatch(new GoogleVisionLabelImage($newImage->id));

                RemoveFaces::withChain([
                    new ResizeImage($newImage->path, 300, 300),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id)
                ])->dispatch($newImage->id);
            }

            //  Mi comunica : Class "App\Livewire\File" not found
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }

        session()->flash('status', 'Articolo creato correttamente');
        $this->reset();

    }

    public function updatedTemporaryImages(){
        if ($this->validate([
            'temporary_images.*' => 'image|max:1024',
            'temporary_images' => 'max:6'
        ])) {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }

    public function removeImage($key){
        if(in_array($key, array_keys($this->images))){
            unset($this->images[$key]);
        }
    }


    public function render()
    {
        return view('livewire.create-article-form');
    }
}
