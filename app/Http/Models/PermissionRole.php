<?php
/**
 * Created by PhpStorm.
 * User: tuantruong
 * Date: 7/25/18
 * Time: 10:16 AM
 */

namespace App\Http\Models;


use App\MyCore\Models\DBTable;

class PermissionRole extends DBTable
{
    protected $table = 'permission_role';
    public $timestamps = false;


    /**
     * @param $id
     * @return mixed
     */
    public function getPermissions($id) {
        $select = $this->select();

        $data = $select->where('role_id', $id)
            ->orderBy('permission_id', 'asc')
            ->pluck('permission_id')
            ->toArray();


        if($data == null)
        {
            return $data=1000;
        }

        return $data;
    }

    public function edit($id, $ids) {

        $this->where('role_id', $id)->delete();

        foreach ($ids as $permissionId) {
            $object = new PermissionRole();
            $object->permission_id = $permissionId;
            $object->role_id = $id;
            $object->save();
        }
        return $id;
    }
}