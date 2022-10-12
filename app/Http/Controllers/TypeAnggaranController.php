<?php

namespace App\Http\Controllers;

use App\Models\TypeAnggaran;
use Illuminate\Http\Request;

/**
 * Class TypeAnggaranController
 * @package App\Http\Controllers
 */
class TypeAnggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeAnggarans = TypeAnggaran::orderBy('name', 'ASC')->paginate();

        return view('type-anggaran.index', compact('typeAnggarans'))
            ->with('i', (request()->input('page', 1) - 1) * $typeAnggarans->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeAnggaran = new TypeAnggaran();
        return view('type-anggaran.create', compact('typeAnggaran'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(TypeAnggaran::$rules);

        $typeAnggaran = TypeAnggaran::create($request->all());

        return redirect()->route('admin.type_anggaran.index')
            ->with('success', 'TypeAnggaran created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $typeAnggaran = TypeAnggaran::find($id);

        return view('type-anggaran.show', compact('typeAnggaran'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $typeAnggaran = TypeAnggaran::find($id);

        return view('type-anggaran.edit', compact('typeAnggaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  TypeAnggaran $typeAnggaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeAnggaran $typeAnggaran)
    {
        request()->validate(TypeAnggaran::$rules);

        $typeAnggaran->update($request->all());

        return redirect()->route('admin.type_anggaran.index')
            ->with('success', 'TypeAnggaran updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $typeAnggaran = TypeAnggaran::find($id)->delete();

        return redirect()->route('admin.type_anggaran.index')
            ->with('success', 'TypeAnggaran deleted successfully');
    }
}
