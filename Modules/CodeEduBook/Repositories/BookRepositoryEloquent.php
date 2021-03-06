<?php

namespace CodeEduBook\Repositories;

use App\Criteria\CriteriaTrashedTrait;
use App\Repositories\RepositoryRestoreTrait;
use CodeEduBook\Repositories\BookRepository;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeEduBook\Models\Book;
use App\Validators\BookValidator;

/**
 * Class BookRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class BookRepositoryEloquent extends BaseRepository implements BookRepository
{

    use CriteriaTrashedTrait;
    use RepositoryRestoreTrait;

    protected $fieldSearchable = [
        'title' => 'like',
        'author.name' => 'like'
    ];


    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Book::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function withTrashed()
    {
        // TODO: Implement withTrashed() method.
    }
}
