<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProgramStoreRequest;
use App\Http\Requests\ProgramUpdateRequest;
use App\Models\Category;
use App\Models\Program;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\QueryBuilder;

class ProgramController extends Controller
{
    public function index(){
        $programs = QueryBuilder::for(Program::class)
        ->defaultSort('title')
        ->allowedSorts(['title'])
        ->allowedFilters(['title', 'category_id'])
        ->paginate(5)
        ->withQueryString();
        $categories = Category::pluck('name', 'id')->toArray();
        return view('programs.index', [
            'programs' => SpladeTable::for($programs)
            ->defaultSort('title')
            ->column('title', sortable:true, searchable:true,canBeHidden:false)
            ->column('description')
            ->column('image')
            ->column('action')
            ->selectFilter('category_id',$categories)


        ]);
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id')->toArray();
        return view('programs.create', compact('categories'));

    }

    public function store(ProgramStoreRequest $request):RedirectResponse {
        if($request->hasFile('image')){
            
            $path = public_path('uploads/');
            !is_dir($path) && mkdir($path, 0777, true);

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move($path, $imageName);
           
            Program::create([
                'title' => $request->title,
                'image' =>  $imageName,
                'description'=>$request->description,
                'category_id' => $request->category_id
            ]);

            Toast::title('Program was created Successful!')
            ->autoDismiss(5);
            return to_route('programs.index');
        }
        return back();


    }

    public function edit(Program $program){
        
        $categories = Category::pluck('name', 'id')->toArray();
        return view('programs.edit', compact('program','categories'));
    }

    public function update(ProgramUpdateRequest $request, Program $program){
        $request->validated();
        if($request->hasFile('image')){
            $image_path = "uploads/".$program->image;
            File::delete($image_path);

            $path = public_path('uploads/');

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move($path, $imageName);
            
            $program->update([
                'title' => $request->title,
                'image' =>  $imageName,
                'description'=>$request->description,
                'category_id' => $request->category_id
            ]);

            Toast::title('Program was Updated Successful!')
            ->autoDismiss(5);
            return to_route('programs.index');
        }
        else{
            $program->update([
                'title' => $request->title,
                'description'=>$request->description,
                'category_id' => $request->category_id
            ]);

            Toast::title('Program was Updated Successful!')
            ->autoDismiss(5);
            return to_route('programs.index');
        }


    }
    public function destroy(Program $program){
        $image_path = "uploads/".$program->image;
        File::delete($image_path);
        $program->delete();
        Toast::title('Program Deleted Successful!')->warning() ->autoDismiss(5);
        return redirect()->back();
    }
}
