<?php

namespace App\Http\Controllers\Admin; //add \Admin to path

use App\Models\Type;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use App\Http\Controllers\Controller; //add Controller

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.types.index',['types'=> Type::orderByDesc('id')->paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTypeRequest $request)
    {
        return to_route('admin.types.index')->with('status', "Add successfully type -> NAME");
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        return view('admin.types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        return view('admin.types.edit', compact('types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
        return to_route('admin.types.index')->with('status', "Type -> NAME updated with success !");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        return to_route('admin.types.index')->with('status', "Deleted -> NAME type with success..");
    }
}
