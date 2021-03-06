<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Permission;
use Illuminate\Support\Facades\Hash;

class UsersManagerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * User manager page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($view='list')
    {
        
        if($view=='list'){
            $users = User::paginate(25);
            return view('users.list', [ 'users' => $users ]);
        }
        if($view=='create'){
            return view('users.create');
        }

    }

    /**
     * User create form.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create(Request $request,$type='user')
    {   
        return view('users.create'); 
    }
    /**
     * User store.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {
        $user = User::firstOrCreate([
            'name'      => $request->input('name') ,
            'email'     => $request->input('email') ,
            'password'  => Hash::make( $request->input('password') ) ,
        ]);
        return redirect()->route('users', ['created' => $user ]);

    }


     /**
     * User roles manager page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function roles(Request $request)
    {

        $roles = Role::paginate(25);

        return view('users.roles', [ 'roles' => $roles ]);
    }

     /**
     * Permissions manager page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function permissions(Request $request)
    {

        $permissions = Permission::paginate(25);

        return view('users.permissions', [ 'permissions' => $permissions ]);
    }
}
