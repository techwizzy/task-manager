<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($value='')
    {
         $users = User::all();
          
        
         
         $data= array();
         foreach ($users as $user) {
             $btnEdit = '<a  href="'.url('admin/users/edit', ['id' => $user->id]) . '" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                <i class="fa fa-lg fa-fw fa-pen"></i>
            </a>';
            $btnDelete = '<a class="btn btn-xs btn-default text-danger mx-1 shadow" href="'.url('admin/users/delete', ['id' => $user->id]) . '" title="Delete">
                  <i class="fa fa-lg fa-fw fa-trash"></i>
              </a>';
           $btnDetails = '<a  href="'.url('admin/users/show', ['id' => $user->id]) . '" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                   <i class="fa fa-lg fa-fw fa-eye"></i>
               </a>';
              
              $data []=[$user->id, $user->name, $user->email,'<nobr>'.$btnEdit.$btnDetails.$btnDelete.'</nobr>'];
         }
          

        return view('users.index', ['users' => $data]);
    }

    public function edit($id='')
    {
         $user = User::findOrFail($id);
         return view('users.edit', ['user'=>$user]);
    }

    public function update(Request $request, $id='')
    {
        if ($id !=null) {
            $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
        ]);

          if ($validator->fails()) {
            return redirect('admin/users/edit/'.$id)
                        ->withErrors($validator)
                        ->withInput();
          }
          
          
            $user = User::find($id);
             if ($request->new_password !=null) {
                $validator = Validator::make($request->all(),[
                    'new_password' => ['required'],
                    'new_confirm_password' => ['same:new_password'],
                ]);

                if ($validator->fails()) {
                return redirect('admin/users/edit/'.$id)
                        ->withErrors($validator)
                        ->withInput();
                }
          
   
              $user->password = Hash::make($request->new_password);
           }

            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
            return redirect('admin/users')->with('status', 'user updated!');
        }
    }

    public function show(User $user)
    {
         return view('users.show', compact('user'));
    }

     public function create()
     {
            return view('users.create');
     }

        /**
         * Add User
         *
         */
        public function store(Request $request)
        {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'confirm_password' => 'same:password'
            ]);

            User::create($request->all());

            return redirect()->route('users')
                ->with('status', 'User created successfully.');
        }
   
       public function destroy(User $user)
        {
            $user->delete();

            return redirect()->route('users')
                ->with('status', 'User deleted successfully');
        }
}
