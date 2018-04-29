<?php

namespace CodeEduBook\Repositories;

use App\Criteria\CriteriaTrashedinterface;
use App\Repositories\RepositoryRestoreInterface;
use Prettus\Repository\Contracts\RepositoryCriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface BookRepository.
 *
 * @package namespace App\Repositories;
 */
interface BookRepository extends RepositoryInterface, RepositoryCriteriaInterface, CriteriaTrashedinterface, RepositoryRestoreInterface
{
    //
}
