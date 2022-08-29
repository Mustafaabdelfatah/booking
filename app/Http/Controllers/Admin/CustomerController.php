<?php

namespace App\Http\Controllers\Admin;
use DB;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\CustomerRequest;
use App\Http\Requests\Admin\CustomerUpdateRequest;

class CustomerController extends Controller
{

    public function index()
    {
        $customers = User::orderBy('id','DESC')->paginate(10);
        return view('admin.customers.index',compact('customers'));
    }



}
