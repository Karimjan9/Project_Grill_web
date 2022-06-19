<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\products;
use App\Models\User;
use App\Models\user_role;
use App\Models\user_status;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function allusers(){
        $allusers=User::all();
        $users=User::paginate(5);
        $statuses=user_status::all();
        $allstatus=Array();
        foreach($statuses as $status){
            $allstatus[$status->id]=$status->status;
        }
        // return $allstatus;

        $roles=user_role::all();
        $allRoles=Array();
        foreach($roles as $role){
            $allRoles[$role->id] = $role->role;
        }
        //  return $allRoles;
        return view('admin.allusers')->with('allusers',$allusers)->with('users',$users)->with('allstatus',$allstatus)->with('allRoles',$allRoles);
        
    }
    public function edit_user($id){
        $edit=User::find($id);
        $status=user_status::all();
        $role=user_role::all();
        return view('admin.edit_user')->with('user',$edit)->with('status',$status)->with('role',$role);
    }
    public function change_user($id,Request $request){
        $changed=User::find($id);
        $changed->surname=$request->familiya;
        $changed->name=$request->name;
        $changed->fathername=$request->fathername;
        $changed->email=$request->email;
        $changed->phone=$request->phone;
        if($request->user_status!=""){
            $changed->status=$request->user_status;
        }
        if($request->user_role!=""){
            $changed->role=$request->user_role;
        }
        $changed->save();
        return redirect('/allusers')->with('edit_product','User changed successfully!!!');
    }
    public function delete_user($id){
        $delete=User::find($id);
        $delete->delete();
        return redirect('/allusers')->with('delete_product','User deleted successfully!!!');
    }
}
