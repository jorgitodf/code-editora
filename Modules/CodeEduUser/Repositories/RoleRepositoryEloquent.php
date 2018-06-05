<?php

namespace CodeEduUser\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeEduUser\Models\Role;

/**
 * Class RoleRepositoryEloquent.
 *
 * @package namespace CodeEduUser\Repositories;
 */
class RoleRepositoryEloquent extends BaseRepository implements RoleRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Role::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function updatePermissions(array $permissions, $id)
    {
        $model = $this->find($id);
        $model->permissions()->detach();
        if (count($permissions)){
            $model->permissions()->sync($permissions);
        }
        return $model;
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
