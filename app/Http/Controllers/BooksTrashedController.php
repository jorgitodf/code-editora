<?php

namespace App\Http\Controllers;

use App\Criteria\FindOnlyTrashedCriteria;
use App\Repositories\BookRepository;
use Illuminate\Http\Request;


class BooksTrashedController extends Controller
{

    /**
     * @var BookRepository
     */
    private $repository;

    public function __construct(BookRepository $repository)
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
        $books = $this->repository->onlyTrashed()->paginate(6);
        return view('trashed.books.index', compact('books','search'));
    }

}
