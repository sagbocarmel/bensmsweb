<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 10/19/19
 * Time: 10:40 PM
 */

namespace App\Http\Repositories;


use App\Role;

class RoleRepository implements RoleRepositoryInterface
{
    protected $role;

    /**
     * RoleRepository constructor.
     * @param Role $role
     */
    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    /**
     * @param array $inputs
     * @return Role|bool
     */
    public function store(array $inputs)
    {
        $this->role = new Role();
        $this->role->name = $inputs['name'];
        $this->role->description = $inputs['description'];
        $this->role = $this->role->save();

        return $this->role;
    }

    /**
     * @param $id
     * @param array $inputs
     * @return Role|bool
     */
    public function update($id, array $inputs)
    {
        $this->role = Role::where('id', $id)->first();
        $this->role->name = $inputs['name'];
        $this->role->description = $inputs['description'];
        $this->role = $this->role->save();

        return $this->role;
    }

    /**
     * @return Role[]|\Illuminate\Database\Eloquent\Collection
     */
    public function findAll()
    {
        return Role::all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return Role::where('id', $id)->firstOrFail();
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        $this->role = Role::where('id', $id)->delete();
    }
}