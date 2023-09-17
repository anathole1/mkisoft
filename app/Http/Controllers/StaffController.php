<?php

namespace App\Http\Controllers;

use App\Http\Requests\StaffStoreRequest;
use App\Http\Requests\StaffUpdateRequest;
use App\Models\Staff;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\QueryBuilder;

class StaffController extends Controller
{
    public function index(){
        $staffs = QueryBuilder::for(Staff::class)
        ->defaultSort('title')
        ->allowedSorts(['title'])
        ->allowedFilters(['title'])
        ->paginate(5)
        ->withQueryString();
        // $categories = Category::pluck('name', 'id')->toArray();
        return view('staff.index', [
            'staffs' => SpladeTable::for($staffs)
            ->defaultSort('title')
            ->column('names', sortable:true, searchable:true,canBeHidden:false)
            ->column('title')
            ->column('image')
            ->column('action')

        ]);


    }
    public function create(){
        return view('staff.create');
    }

    public function store(StaffStoreRequest $request):RedirectResponse {

        if($request->hasFile('image')){
            
            $path = public_path('uploads/');
            !is_dir($path) && mkdir($path, 0777, true);

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move($path, $imageName);
           
            Staff::create([
                'title' => $request->title,
                'image' =>  $imageName,
                'names'=>$request->names,

            ]);

           Toast::title('staff was created Successful!')
            ->autoDismiss(5);
            return to_route('staffs.index');
        }
        return back();

    }

    public function edit(Staff $staff){
        return view('staff.edit', compact('staff'));
    }

    public function update(StaffUpdateRequest $request, Staff $staff){
        if($request->hasFile('image')){
            $image_path = "uploads/".$staff->image;
            File::delete($image_path);
            $path = public_path('uploads/');

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move($path, $imageName);
            
            $staff->update([
                'title' => $request->title,
                'image' =>  $imageName,
                'names'=>$request->names,

            ]);

          Toast::title('Staff was Updated Successful!')
            ->autoDismiss(5);
            return to_route('staffs.index');
        }
        else{
            $staff->update([
                'title' => $request->title,
                'names'=>$request->names,

            ]);

            Toast::title('staffs was Updated Successful!')
            ->autoDismiss(5);
            return to_route('staffs.index');
    }
  }
  public function destroy(Staff $staff){
    $image_path = "uploads/".$staff->image;
    File::delete($image_path);
    $staff->delete();
    Toast::title('Staff Deleted Successful!')->warning() ->autoDismiss(5);
    return redirect()->back();
  }
}
