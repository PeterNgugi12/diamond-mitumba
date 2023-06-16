<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use livewire\WithPagination;

class AdminCategoryComponent extends Component
{
    use WithPagination;
    
    public function deleteCategory($id)
    {
        $category =Category::find($id);
        $category->delete();
        session()->flash('message', 'Category has been delected successfully!');
    }
    public function render()
    {
        
        $categories = Category::paginate(1005);
        return view('livewire.admin.admin-category-component', ['categories'=>$categories])->layout('layouts.base');
    }
}
