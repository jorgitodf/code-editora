<?php

namespace App\Repositories;

use CodeEduBook\Repositories\CategoryRepository;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\User;

/**
 * Class CategoryRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements CategoryRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function listsWithMutators($column, $key = null)
    {
        // TODO: Implement listsWithMutators() method.
    }

    public function onlyTrashed()
    {
        // TODO: Implement onlyTrashed() method.
    }

    public function withTrashed()
    {
        // TODO: Implement withTrashed() method.
    }
}
