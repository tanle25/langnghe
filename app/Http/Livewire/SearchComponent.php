<?php

namespace App\Http\Livewire;

use App\Admin\Product;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class SearchComponent extends Component
{

    public $keyword;

    public $searchResults;

    public function mount()
    {
        # code...
        $this->searchResults = new Collection();
        $this->keyword ="";
    }
    public function updatedKeyword()
    {
        # code...
        // dd($this->keyword);
        $this->searchResults = Product::where('name','LIKE',"%$this->keyword%")->limit(10)->get();

        // dd($this->searchResults);
    }
    public function render()
    {
        return view('livewire.search-component');
    }
}
