<?php

namespace App\Http\Controllers;

use App\Http\Requests\BackgroundStoreRequest;
use App\Http\Requests\BackgroundUpdateRequest;
use App\Models\Background;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\QueryBuilder;

class BackgroundController extends Controller
{
    public function index(){
        $backgrounds = QueryBuilder::for(Background::class)->defaultSort('title')->allowedSorts('title')->allowedFilters(['title','id'])->paginate(5)
        ->withQueryString();
        return view('backgrounds.index',[
            'backgrounds'=>SpladeTable::for($backgrounds)->defaultSort('title')->column('title',sortable:true,searchable:true)->column('description')
            ->column('action')
        ]);
    }

    public function create(){
        return view('backgrounds.create');
    }

    public function store(BackgroundStoreRequest $request):RedirectResponse{
        if($request->hasFile('image')){
          $path =public_path('uploads/');
          !is_dir($path) && mkdir($path, 0777, true);

          $imageName = time(). '.'.$request->image->extension();
          $request->image->move($path,$imageName);

          Background::create([
            'title' =>$request->title,
            'image'=>$imageName,
            'description'=>$request->description
          ]);

          Toast::title('History was created successful!')->autoDismiss(5);

          return to_route('backgrounds.index');
        }
        return back();
    }

    public function edit(BackgroundUpdateRequest $request   , Background $background):RedirectResponse{
        $data = $request->validated();
        if($request->hasFile('image')){
            $image_path = "uploads/".$background->image;
            File::delete($image_path);

            $path = public_path('uploads/');
            !is_dir($path) && mkdir($path, 0777, true);

          $imageName = time(). '.'.$request->image->extension();
          $request->image->move($path,$imageName);
          $data['image'] =$imageName;
          $data['title'] =$request->title;
          $data['description']=$request->description;
          $background->update($data);

          Toast::title('History was updated successful!')->autoDismiss(5);
          return to_route('backgrounds.index');
        }else{
            $data['title'] = $request->title;
            $data['description'] = $request->description;
            $background->update($data);
            
            Toast::title('History was updated successful!')->autoDismiss(5);
            return to_route('backgrounds.index');
        }
    }

    public function destroy(Background $background):RedirectResponse{
        $image_path = "uploads/".$background->image;
        File::delete($image_path);

        $background->delete();

        Toast::title('History was deleted successful!')->autoDismiss(5);
        return to_route('backgrounds.index');
    }
}
