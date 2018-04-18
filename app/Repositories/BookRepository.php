<?php

namespace App\Repositories;

use App\Criteria\CriteriaOnlyTrashedinterface;
use Prettus\Repository\Contracts\RepositoryCriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface BookRepository.
 *
 * @package namespace App\Repositories;
 */
interface BookRepository extends RepositoryInterface, RepositoryCriteriaInterface, CriteriaOnlyTrashedinterface
{
    //
}
