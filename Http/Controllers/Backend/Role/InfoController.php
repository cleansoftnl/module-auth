<?php

namespace App\Modules\Auth\Http\Controllers\Backend\Role;

use App\Modules\Auth\Repositories\Role\RepositoryInterface as RoleRepo;
use App\Modules\Auth\Models\Role;

class InfoController extends BaseRoleController
{
    public function getForm(Role $role, RoleRepo $roles)
    {
        $data = $this->getRoleDetails($role);

        return $this->setView('admin.role.edit-basic', $data);
    }

    public function redirect(Role $role)
    {
        return redirect()->route('admin.role.edit', $role->id);
    }
}
