<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookUpdateRequest;
use App\Models\Book;
use App\Http\Requests\BookRequest;
use App\Repositories\BookRepository;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class BooksController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $books = $this->repository->paginate(6);
        return view('books.index', compact('books','search'));
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

        $data = $request->all();
        $data['user_id'] = \Auth::user()->id;
        $this->repository->create($data);
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
    public function update(BookUpdateRequest $request, $id)
    {
        /*$userid = Auth::user()->id;
        if ($userid == $request->input('user_id')) {
            $book->fill($request->all());
            $book->save();
        } */

        try {
            $data = $request->except(['user_id']);
            $this->repository->update($data, $id);
            $url = $request->get('redirect_to', route('books.index'));
            $request->session()->flash('message', 'Livro Alterado com Sucesso!');
            return redirect()->to($url);
        } catch (QueryException $e) {
            return ['error'=>true, 'Livro não pode ser editado pois existe um ou mais clientes vinculados a ele.'];
        } catch (ModelNotFoundException $e) {
            $message = 'Livro não encontrado!';
            return redirect()->to('errors.error_filed')->with('message', $message);
        } catch (\Exception $e) {
            return ['error'=>true, 'Ocorreu algum erro ao editar o Livro.'];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->repository->delete($id);
            \Session::flash('message', 'Livro Excluído com Sucesso!');
            return redirect()->to(\URL::previous());
        } catch (QueryException $e) {
            return ['error'=>true, 'Projeto não pode ser apagado pois existe um ou mais clientes vinculados a ele.'];
        } catch (ModelNotFoundException $e) {
            return ['error'=>true, 'Projeto não encontrado.'];
        } catch (\Exception $e) {
            return ['error'=>true, 'Ocorreu algum erro ao excluir o projeto.'];
        }
    }
}
