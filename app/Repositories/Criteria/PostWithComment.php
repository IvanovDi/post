<?php
namespace App\Repositories\Criteria;

use Bosnadev\Repositories\Criteria\Criteria;
use Bosnadev\Repositories\Contracts\RepositoryInterface as Repository;

class PostWithComment extends Criteria {

    public function apply($model, Repository $repository)
    {
        $model = $model->with('comments');
        return $model;
    }
}
