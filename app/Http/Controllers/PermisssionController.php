<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;

class PermisssionController extends Controller
{
    public static function loadPermissions($user_type) {
        
        $sess = Array();
        $perm = Permission::where('type_id', $user_type)->get();
        foreach($perm as $item) {
            $sess[$item->regra] = (boolean) $item->permissao;
        }
        //dd($sess);
        session(['user_permissions' => $sess]);
    }

    public static function isAuthorized($rule) {
        $permissions = session('user_permissions');
        return $permissions[$rule];
    }
        
}
