<?php

namespace CodeEduBook\Repositories;

use App\Criteria\CriteriaTrashedinterface;
use Prettus\Repository\Contracts\RepositoryInterface;
use Prettus\Repository\Contracts\RepositoryCriteriaInterface;

/**
 * Interface CategoryRepository.
 *
 * @package namespace App\Repositories;
 */
interface CategoryRepository extends RepositoryInterface, RepositoryCriteriaInterface, CriteriaTrashedinterface
{
    public function listsWithMutators($column, $key = null);
}
