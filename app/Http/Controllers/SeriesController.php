<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Autenticador;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use App\Repositories\SeriesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    private $repository;

    public function __construct(SeriesRepository $repository)
    {
        $this->repository = $repository;
        $this->middleware(Autenticador::class)->except('index');
    }

    public function index(Request $request)
    {
        $series = Series::all();
        $mensagemSucesso = session('mensagem.sucesso');

        return view('series.index', [
            'series' => $series,
            'mensagemSucesso' => $mensagemSucesso,
        ]);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        $serie = $this->repository->add($request);
        return to_route('series.index')->with('mensagem.sucesso', "Série {$serie->nome} adicionada com sucesso.");

    }

    public function destroy(Series $series)
    {
        $series->delete();
        return to_route('series.index')->with('mensagem.sucesso', "Série {$series->nome} removida com sucesso.");
    }

    public function edit(Series $series)
    {
        return view('series.edit', [
            'serie' => $series,
        ]);
    }

    public function update(SeriesFormRequest $series, Request $request)
    {
        $series->update($request->all());
        return to_route('series.index')->with('mensagem.sucesso', "Série {$series->nome} Atualizada com sucesso.");
    }
}
