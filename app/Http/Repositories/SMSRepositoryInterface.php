<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 10/19/19
 * Time: 10:38 PM
 */

namespace App\Http\Repositories;


interface SMSRepositoryInterface
{
    public function store(Array $inputs);
    public function update($id, Array $inputs);
    public function findAll();
    public function findAllBySchool($idSchool);
    public function find($id);
    public function delete($id);
    public function deleteAllBySchool($idSchool);
}