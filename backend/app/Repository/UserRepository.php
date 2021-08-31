<?php
namespace App\Repository;

use App\Repository\RepositoryInterface;
use App\User;

class UserRepository implements RepositoryInterface
{
    private $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    //To create and update data
    public function createUpdateData($condition, $parameters)
    {
        return $resultSet = $this->model->updateOrCreate($condition, $parameters);
    }

    //To create data
    public function createData($data){
        return $resultSet = $this->model->create($data);
    }

    //To fetch data
    public function getData($conditions, $method, $withArr = [],$toArray)
    {
        $query = $this->model->whereNotNull('id');

        if (!empty($conditions['id'])) {
            $query->where('id', $conditions['id']);
        }

        if (!empty($conditions['name'])) {
            $query->where('name', $conditions['name']);
        }

        if (!empty($conditions['email'])) {
            $query->where('email', $conditions['email']);
        }

    
        if (!empty($conditions['email_verified_at'])) {
            $query->where('email_verified_at', $conditions['email_verified_at']);
        }

        if (!empty($conditions['password'])) {
            $query->where('password', $conditions['password']);
        }

        if (!empty($conditions['role_id'])) {
            $query->where('role_id', $conditions['role_id']);
        }

        if (!empty($withArr)) {
            $query->with($withArr);
        }

        $resultSet = $query->orderBy('created_at', 'desc')->$method();

        if (!empty($resultSet) && $toArray) {
            $resultSet = $resultSet->toArray();
        }

        return $resultSet;
    }
}
