<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;

class TenantController extends Controller
{

    public function index(){
        $users = collect();
        Tenant::all()->runForEach(function () use ($users) {
            foreach(User::all() as $user){
                $users->push($user);
            }
        });
        $tenants = Tenant::all();
        return view('tenant.index',compact('tenants','users'));
    }
    public function create(){
        return view('tenant.create');
    }

    public function store(Request $request){
        $tenant1 = Tenant::create(['id'=>$request->name]);
        $tenant1->domains()->create(['domain' => $request->name.'.localhost']);
        return redirect()->route('tenant.index');
    }
}
