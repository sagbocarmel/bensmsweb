<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 10/19/19
 * Time: 10:36 PM
 */

namespace App\Http\Repositories;


use App\User;
use App\UserRole;

class UserRepository implements UserRepositoryInterface
{
    protected $user_role;
    protected $user;

    /**
     * UserRepository constructor.
     * @param User $user
     * @param UserRole $user_role
     */
    public function __construct(User $user,UserRole $user_role)
    {
        $this->user = $user;
        $this->user_role = $user_role;
    }

    /**
     * @param array $inputs
     * @return User|bool
     */
    public function store(array $inputs)
    {
        $this->user = new User();

        $this->user->username = $inputs['username'];
        $this->user->email = $inputs['email'];
        $this->user->school_name = $inputs['school_name'];
        $this->user->address = $inputs['address'];
        $this->user->phone_number = $inputs['phone_number'];
        $this->user->password = bcrypt($inputs['password']);
        $this->user = $this->user->save();

        return $this->user;
    }

    /**
     * @param $id
     * @param array $inputs
     * @return User|bool
     */
    public function update($id, array $inputs)
    {
        $this->user = User::where('id',$id)->first();

        $this->user->username = $inputs['username'];
        $this->user->email = $inputs['email'];
        $this->user->school_name = $inputs['school_name'];
        $this->user->address = $inputs['address'];
        $this->user->phone_number = $inputs['phone_number'];
        $this->user->password = bcrypt($inputs['password']);
        $this->user = $this->user->save();

        return $this->user;
    }

    /**
     * @return User[]|\Illuminate\Database\Eloquent\Collection
     */
    public function findAll()
    {
        return User::all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
       return User::where('id',$id)->firstOrFail();
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        User::where('id',$id)->delete();
    }

    /**
     * @param $id
     * @param $user_id
     * @param $role_id
     * @return UserRole|bool
     */
    public function updateRole($id, $user_id, $role_id)
    {
        $this->user_role = UserRole::where('id', $id)->first();
        $this->user_role->user_id = $user_id;
        $this->user_role->role_id = $role_id;

        $this->user_role = $this->user_role->save();

        return $this->user_role;
    }

    /**
     * @param $user_id
     * @param $role_id
     * @return UserRole|bool
     */
    public function setRole($user_id, $role_id)
    {
        $this->user_role = new UserRole();
        $this->user_role->user_id = $user_id;
        $this->user_role->role_id = $role_id;

        $this->user_role = $this->user_role->save();

        return $this->user_role;
    }
}