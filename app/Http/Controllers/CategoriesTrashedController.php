<?php

namespace App\Http\Controllers;

use App\Criteria\FindOnlyTrashedCriteria;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;


class CategoriesTrashedController extends Controller
{

    /**
     * @var CategoryRepository
     */
    private $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        //$this->repository->pushCriteria(FindOnlyTrashedCriteria::class);
        $categories = $this->repository->onlyTrashed()->paginate(6);
        return view('trashed.categories.index', compact('categories','search'));
    }

}
