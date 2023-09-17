<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\QueryBuilder;

class UserController extends Controller
{
    public function index(){
        $users = QueryBuilder::for(User::class)
        ->defaultSort('name')
        ->allowedSorts(['name'])
        ->allowedFilters(['name','id'])
        ->paginate(5)
        ->withQueryString();

        return view('users.index', [
            'users' => SpladeTable::for($users)
            ->defaultSort('name')
            ->column('name', sortable:true, searchable:true)
            ->column('email')

            ->column('action')

        ]);

    }

    public function create(){
        return view('users.create');
    }

    public function store(Request $request){

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required'],
        ]);

       User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Toast::title('User Created successful')->autoDismiss(5);
        return to_route('users.index');
    }
    public function destroy(User $user){
        $user->delete();
        Toast::title('user Deleted Successful!')->warning() ->autoDismiss(5);
        return redirect()->back();
    }
}
