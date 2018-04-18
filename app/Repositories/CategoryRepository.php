<?php

namespace App\Repositories;

use App\Criteria\CriteriaOnlyTrashedinterface;
use Prettus\Repository\Contracts\RepositoryInterface;
use Prettus\Repository\Contracts\RepositoryCriteriaInterface;

/**
 * Interface CategoryRepository.
 *
 * @package namespace App\Repositories;
 */
interface CategoryRepository extends RepositoryInterface, RepositoryCriteriaInterface, CriteriaOnlyTrashedinterface
{
    //
}
