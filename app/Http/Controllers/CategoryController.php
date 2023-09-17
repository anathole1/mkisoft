<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast as FacadesToast;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\QueryBuilder;

class CategoryController extends Controller
{
    public function index(){
        $categories = QueryBuilder::for(Category::class)->defaultSort('name')->allowedSorts(['name'])->allowedFilters(['name','id'])->paginate(5)->withQueryString();
        $categor = Category::pluck('name','id')->toArray();

        return view('categories.index', [
            'categories' =>SpladeTable::for($categories)->defaultSort('name')->column('name', sortable:true, searchable:true)->selectFilter('id',$categor)->column('action')
        ]);
    
    }
    public function create(){
        return view('categories.create');
    }

    public function edit(Category $category){
        return view('categories.edit', compact('category'));
    }

    public function store(CategoryRequest $request):RedirectResponse{
        Category::create($request->validated());
        FacadesToast::title('Category created successful !')->autoDismiss(5);

        return to_route('categories.index');
    }

    public function update(CategoryRequest $request, Category $category):RedirectResponse{
        $category->update($request->validated());
        FacadesToast::title('category updated successfully.')->autoDismiss(5);

        return to_route('categories.index');
    }

    public function destroy(Category  $category){
        $category->delete();
        FacadesToast::title('category deleted successful')->warning()->autoDismiss(5);

        return redirect()->back();
    }
}
