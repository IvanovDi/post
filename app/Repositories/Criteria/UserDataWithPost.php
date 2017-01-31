<?php
namespace App\Repositories\Criteria;

use Bosnadev\Repositories\Criteria\Criteria;
use Bosnadev\Repositories\Contracts\RepositoryInterface as Repository;

class UserDataWithPost extends Criteria {

    public function apply($model, Repository $repository)
    {
        $model = $model->with('posts.comments');
        return $model;
    }
}
