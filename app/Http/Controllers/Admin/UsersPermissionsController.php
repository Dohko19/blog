<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UsersPermissionsController extends Controller
{
    public function update(Request $request, User $user)
    {
    	$user->permissions()->detach();

    	// if ($request->filled('permissions'))
    	// {
    	// 	$user->givePermissionTo($request->permissions);
    	// }
    	$user->syncPermissions($request->permissions);

    	return back()->withFlash('Los Permisos han sido actualizados');
    }
}
