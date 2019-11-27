<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 10/19/19
 * Time: 10:37 PM
 */

namespace App\Http\Repositories;


interface UserRepositoryInterface
{
    public function store(array $inputs);
    public function update($id, Array $inputs);
    public function updateRole($id, $user_id, $user_role);
    public function setRole($user_id, $user_role);
    public function getRole($user_id);
    public function findAll();
    public function find($id);
    public function findByData($email, $phone_number, $username);
    public function delete($id);
    public function findForUpdateByData($id,$email,$phone_number, $username);


}