<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

        public function index()
        {
            $users = Admin::orderBy('id','DESC')->paginate(10);

            return view('admin.users.index', compact( 'users'));

        }//end of index



    public function create()
    {

        return view('admin.users.create');

    }//end of create
    public function store(Request $request)
    {

        // return $request->all();

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required',

        ]);

        $request->merge(['password' => bcrypt($request->password)]);


        // return $request->all();
        $admin = Admin::create($request->all());

        session()->flash('success', 'Admin Has Been Added Succefully');

        return redirect()->route('dashboard.users.index');

    }//end of store

    public function edit(Admin $admin)
    {

        return view('admin.users.edit', compact('admin'));

    }//end of edit

    public function update(Request $request,$id)
    {

        $admin = Admin::find($id);
        $data = $this->validate(request(),[
            'name'              => 'required',
            'email' => 'required|email',
            'password'          => 'sometimes|nullable|min:6',
        ],[],[

            'required' => 'This Field Is Required',
            'name.string' => 'Admin Name Must Be Letter',
             'password.min' => 'Password Must Be At Least 6 Nember',
         ]);

        if(request()->has('password')){
            $data['password'] = bcrypt(request('password'));
        }

        $admin->update($request->all());


        session()->flash('success', 'Admin has been updated successfully');
        return redirect()->route('admin.admins.index');

    }//end of update

    public function destroy($id)
    {

        $admin = Admin::find($id)->delete();
        session()->flash('success', 'Admin has been Deleted successfully');
        return redirect()->route('admin.users.index');

    }//end of destroy
}
