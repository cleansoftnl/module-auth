<?php namespace Cms\Modules\Auth\Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    public function run()
    {
        $models = [
            [
                'username'    => 'admin',
                'email'       => 'xlink@cybershade.org',
                'password'    => 'password',
                'verified_at' => Carbon::now(),
                'role'        => 1,
            ],

        ];

        $seedModel = config('auth.model');
        foreach ($models as $model) {
            $user = with(new $seedModel)->create(array_except($model, 'role'));

            $user->roles()->attach(array_get($model, 'role'), ['caller_type' => $user->getCallerType()]);
        }
    }
}
