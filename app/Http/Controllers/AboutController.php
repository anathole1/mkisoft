<?php

namespace App\Http\Controllers;

use App\Http\Requests\AboutStoreRequest;
use App\Models\About;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\QueryBuilder;

class AboutController extends Controller
{
    public function index(){
        $abouts = QueryBuilder::for(About::class)
        ->defaultSort('title')
        ->allowedSorts(['title','decription'])
        ->allowedFilters(['title','id'])
        ->paginate(5)
        ->withQueryString();

        $abs = About::pluck('title', 'id')->toArray();

        return view('abouts.index',[
            'abouts' =>SpladeTable::for($abouts)
            ->defaultSort('title')
            ->column('title',sortable:true,searchable:true)
            ->selectFilter('id',$abs)
            ->column('action')
        ]);
    }

    public function create(){
        return view('abouts.create');
    }

    public function store(AboutStoreRequest $request){
        About::create($request->validated());

        Toast::title('About was created successfully!')
        ->autoDismiss(5);
        return redirect()->route('abouts.index');
    }

    public function edit(About $about){
        return view('abouts.edit',compact('about'));
    }
    public function update(AboutStoreRequest $request, About $about){
        $about->update($request->validated());
        Toast::title('About updated successful!')->autoDismiss(5);
        return redirect()->route('abouts.index');
    }
    public function destroy(About $about){
        $about->delete();
        Toast::title('Content deleted successful!')->warning()->autoDismiss(5);
        return redirect()->back();
    }
}
