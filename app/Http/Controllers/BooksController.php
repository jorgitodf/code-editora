<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookUpdateRequest;
use App\Models\Book;
use App\Http\Requests\BookRequest;
use App\Repositories\BookRepository;


class BooksController extends Controller
{

    /**
     * @var CategoryRepository
     */
    private $repository;

    public function __construct(BookRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = $this->repository->paginate(6);
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        /* $userid = Auth::user()->id;
        Book::create(['title' => $request->input('title'), 'subtitle'=> $request->input('subtitle'),
                     'price' => $request->input('price'), 'user_id' => $userid]); */
        Book::create($request->allFiles());
        $url = $request->get('redirect_to', route('books.index'));
        $request->session()->flash('message', 'Livro Cadastrado com Sucesso!');
        return redirect()->to($url);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookUpdateRequest $request, Book $book)
    {
        /*$userid = Auth::user()->id;
        if ($userid == $request->input('user_id')) {
            $book->fill($request->all());
            $book->save();
        } */

        $book->fill($request->all());
        $book->save();
        $url = $request->get('redirect_to', route('books.index'));
        $request->session()->flash('message', 'Livro Alterado com Sucesso!');
        return redirect()->to($url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        \Session::flash('message', 'Livro Excluído com Sucesso!');
        return redirect()->to(\URL::previous());
    }
}
