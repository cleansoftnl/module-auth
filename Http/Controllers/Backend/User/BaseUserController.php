<?php namespace Cms\Modules\Auth\Http\Controllers\Backend\User;

use Cms\Modules\Core\Http\Controllers\BaseBackendController;
use Cms\Modules\Auth as Auth;
use Former;

class BaseUserController extends BaseBackendController
{
    public function boot()
    {
        parent::boot();

        $this->theme->setTitle('User Manager');
        $this->theme->breadcrumb()->add('User Manager', route('admin.user.manager'));
    }

    public function getUserDetails(Auth\Models\User $user)
    {
        Former::populate($user);
        $this->theme->setTitle('User: '.e($user->screenname));
        $this->theme->breadcrumb()->add($user->screenname, route('admin.user.edit', $user->id));

        return compact('user');
    }

}
