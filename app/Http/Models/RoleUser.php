<?php

/**
 * Created by PhpStorm.
 * User: tuantruong
 * Date: 7/24/18
 * Time: 4:29 PM.
 */

namespace App\Http\Models;

use App\MyCore\Models\DBTable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RoleUser extends DBTable
{
    protected $table = 'role_user';
    protected $primaryKey = 'user_id';
    public $timestamps = false;

    /**
     * @param $data
     *
     * @return bool
     */
    public function add($data, $id)
    {
        $object = new RoleUser();
        $data['user_id'] = $id;

        $data = $this->formatData($data);
        $this->filterColumns($data, $object);

        return $object->save();
    }

    /**
     * @param $data
     *
     * @return mixed
     */
    public function formatData($data)
    {
        if (isset($data['role_id'])) {
            $data['role_id'] = (int) $data['role_id'];
        }

        if (!isset($data['user_id'])) {
            $data['user_id'] = Auth::id();
        }

        return $data;
    }

    /**
     * @param $filters
     *
     * @return mixed
     */
    public function formatFilters($filters)
    {
        if ($filters['sort'] == 'name') {
            $filters['sort'] = 'roles.'.$filters['sort'];
        } else {
            $filters['sort'] = 'users.'.$filters['sort'];
        }

        return $filters;
    }

    /**
     * @param array $filters
     *
     * @return array
     */
    public function getShowAll($filters = array())
    {
        $sql = DB::table('users')
            ->leftJoin("{$this->table}", 'users.user_id', '=', "{$this->table}.user_id")
            ->leftJoin('roles', "{$this->table}.role_id", '=', 'roles.id')
            ->select('users.*', 'roles.*');

        if (!empty($keyword = $filters['search'])) {
            $sql->where(function ($query) use ($keyword) {
                $query->where('name', 'LIKE', '%'.$keyword.'%');
            });
        }

        $filters = $this->formatFilters($filters);

        $total = $sql->count();

        $data = $sql->skip($filters['offset'])
            ->take($filters['limit'])
            ->orderBy($filters['sort'], $filters['order'])
            ->get()
            ->toArray();

        return ['total' => $total, 'data' => $data];
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function getRoleId($id)
    {
        return self::select()
            ->where('user_id', $id)
            ->first();
    }

    /**
     * @param $id
     * @param $data
     */
    public function edit($id, $data)
    {
        $object = $this->where('user_id', $id)->first();

        if ($object == null) {
            $object = new RoleUser();
            $object->user_id = $id;
            $object->role_id = (int) $data['role_id'];

            $object->save();
        }

        $object->role_id = (int) $data['role_id'];

        $object->save();

        return $id;
    }
}
