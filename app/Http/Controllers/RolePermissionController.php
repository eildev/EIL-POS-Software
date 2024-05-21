<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\DB;
class RolePermissionController extends Controller
{
    /////////////////////////Permission////////////////////////////

    public function AllPermissionView(){
        $permission = Permission::all();
        return view('pos.role_and_permission.permission.all_permission',compact('permission'));
    }
    public function AddPermission(){
       return view('pos.role_and_permission.permission.add_permission');
    }
    public function StorePermission(Request $request){
        $permission = Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name,
    ]);
    $notification = [
        'message' => 'Permission Added Successfully',
        'alert-type' => 'info'
    ];
    return redirect()->route('all.permission')->with($notification);
    }//
    public function EditPermission($id){
        $permissions = Permission::findOrFail($id);
        return view('pos.role_and_permission.permission.edit_permission',compact('permissions'));
    }
    public function updatePermission(Request $request){
        $id = $request->permission_id;
        $permission = Permission::findOrFail($id)->update([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);
        $notification = [
            'message' => 'Permission Updated Successfully',
            'alert-type' => 'info'
        ];
        return redirect()->route('all.permission')->with($notification);
    }
    public function DeletePermission($id){
        $permission = Permission::findOrFail($id)->delete();
        $notification = [
            'message' => 'Permission Deleted Successfully',
            'alert-type' => 'info'
        ];
        return redirect()->back()->with($notification);
    }
/////////////////////////Role////////////////////////////
    public function AllRoleView(){
        $role = Role::all();
        return view('pos.role_and_permission.role.all_role',compact('role'));
    }//
    public function AddRole(){
        return view('pos.role_and_permission.role.add_role');
    }//
    public function StoreRole(Request $request){
        $role = Role::create([
            'name' => $request->name
        ]);
        $notification = [
            'message' => 'Role Added Successfully',
            'alert-type' => 'info'
        ];
        return redirect()->route('all.role')->with($notification);
    }
    public function EditRole($id){
        $roles = Role::findOrFail($id);
        return view('pos.role_and_permission.role.edit_role',compact('roles'));
    }
    public function updateRole(Request $request){
        $id = $request->role_id;
        $role = Role::findOrFail($id)->update([
            'name' => $request->name,
        ]);
        $notification = [
            'message' => 'Role Updated Successfully',
            'alert-type' => 'info'
        ];
        return redirect()->route('all.role')->with($notification);
    }
    public function DeleteRole($id){
         Permission::findOrFail($id)->delete();
        $notification = [
            'message' => 'Role Deleted Successfully',
            'alert-type' => 'info'
        ];
        return redirect()->back()->with($notification);
    }
    ///////////////////////////////Role In Permission All Methods////////////////////////
    public function AddRolePermission(){
        $role = Role::all();
        $permission = Permission::all();
        $permission_group = User::getPermissiongroup();
        return view('pos.role_and_permission.role_permission.add_role_permission',compact('role','permission','permission_group'));
    }//
    public function StoreRolePermission(Request $request){
        $data = array();
        $permissions   = $request->permission;
        foreach ($permissions as $key=> $item){
            $data['role_id'] =  $request->role_id;
            $data['permission_id'] = $item;
            DB::table('role_has_permissions')->insert($data);
        }
        $notification = [
            'message' => 'Role Permission Added Successfully',
            'alert-type' => 'info'
        ];
        return redirect()->route('all.role')->with($notification);
    }
}
