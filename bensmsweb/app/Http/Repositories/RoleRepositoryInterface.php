<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 10/19/19
 * Time: 10:41 PM
 */

namespace App\Http\Repositories;


interface RoleRepositoryInterface
{
    public function store(Array $inputs);
    public function update($id, Array $inputs);
    public function findAll();
    public function find($id);
    public function delete($id);
}