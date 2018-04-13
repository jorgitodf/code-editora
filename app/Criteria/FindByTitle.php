<?php

namespace App\Criteria;


use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class FindByTitle implements CriteriaInterface
{
    public function __construct($title)
    {
        $this->title = $title;
    }


    /**
     * Apply criteria in query repository
     *
     * @param                     $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        //return $model->where('title', $this->title);
        return $model->where('title', 'LIKE', "%{$this->title}%");
    }
}