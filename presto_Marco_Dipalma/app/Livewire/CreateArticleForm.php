<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class CreateArticleForm extends Component
{
    #[Validate('required', message:'il campo obbligatorio')]
    #[Validate('min:3', message:'il campo obbligatorio')]
    public $title;

    #[Validate('required', message:'il campo obbligatorio')]
    #[Validate('min:10', message:'il campo obbligatorio')]
    public $description;
    
    #[Validate('required', message:'il campo obbligatorio')]
    #[Validate('numeric', message:'il campo obbligatorio')]
    public $price;

    #[Validate('required', message:'il campo obbligatorio')]
    public $category;
    public $article;


    public function store(){
        
        $this->validate();

        $this->article=Article::create([
            'title'=>$this->title,
            'description'=>$this->description,
            'price'=>$this->price,
            'category_id'=>$this->category,
            'user_id'=>Auth::id(),
        ]);

        $this->reset();

        session()->flash('status', 'Articolo creato correttamente');

    }


    public function render()
    {
        return view('livewire.create-article-form');
    }
}
