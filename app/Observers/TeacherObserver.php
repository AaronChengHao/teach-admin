<?php

namespace App\Observers;

use App\Teacher;
use Illuminate\Support\Facades\Hash;

class TeacherObserver
{
    /**
     * 监听创建的事件。
     *
     * @return void
     */
    public function creating(Teacher $teacher)
    {
        $userModel = config('admin.database.users_model');
//            $permissionModel = config('admin.database.permissions_model');
//            $roleModel = config('admin.database.roles_model');
        $adminUserModel = new $userModel();
        $adminUserModel->username = $teacher->account;
        $adminUserModel->name = $teacher->name;
        $adminUserModel->password = Hash::make($teacher->password);
        $adminUserModel->saveOrFail();
        $adminUserModel->roles()->attach(3);
        $teacher->password = Hash::make($teacher->password);
    }

    /**
     * 监听删除事件。
     *
     * @return void
     */
    public function deleting(Teacher $teacher)
    {
    }

    /**
     * 监听更新的事件。
     *
     * @return void
     */
    public function updating(Teacher $teacher)
    {
        $userModel = config('admin.database.users_model');
        $adminUserModel = new $userModel();
        $adminUserModel = $adminUserModel->whereUsername($teacher->getOriginal('account'))->first();
        if (!empty($adminUserModel)) {
            $adminUserModel->username = $teacher->account;
            $adminUserModel->password = $teacher->password;
            $adminUserModel->saveOrFail();
        }
    }
}