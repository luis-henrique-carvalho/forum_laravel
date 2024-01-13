<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSupportRequest;
use App\Http\Requests\UpdateSupportRequest;
use App\Models\Support;

class SupportController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $supports = Support::latest()->paginate(10)->withQueryString();

        return view('supports.index', [
            'supports' => $supports,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('supports.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSupportRequest $request)
    {
        Support::create($request->validated());

        return redirect()->route('supports.index')->withSuccess('Suporte criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Support $support)
    {
        return view('supports.show', [
            'support' => $support,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Support $support)
    {
        return view('supports.edit', [
            'support' => $support,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupportRequest $request, Support $support)
    {
        $support->update($request->validated());

        return redirect()->route('supports.index')->withSuccess('Suporte atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Support $support)
    {
        $support->delete();

        return redirect()->route('supports.index')->withSuccess('Suporte excluído com sucesso!');
    }
}
