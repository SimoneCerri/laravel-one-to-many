<?php

namespace App\Http\Controllers\Admin; //add \Admin to path

use App\Models\Type;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use App\Http\Controllers\Controller; //add Controller
use Illuminate\Support\Str;

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
        $validatedRequest = $request->validated();
        //dd($validatedRequest);
        $slug = Str::slug($request->name,'-');
        $validatedRequest['slug'] = $slug;
        $name = $validatedRequest['name'];
        Type::create($validatedRequest);
        return to_route('admin.types.index')->with('status', "Add successfully type -> '$name' !");
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
        $types = Type::all();
        return view('admin.types.edit', compact('type','types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
        //dd($request['oldName']);
        $oldName = $request['oldName'];
        //dd($request);
        //dd($request->validated());
        $validatedRequest = $request->validated();
        $slug = Str::slug($request->name, '-');
        $validatedRequest['slug'] = $slug;
        //dd($validatedRequest);
        $type->update($validatedRequest);
        $name = $type['name'];
        return to_route('admin.types.index')->with('status', "Type -> '$oldName' updated in '$name' with success !");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $name = $type['name'];
        $type->delete();
        return to_route('admin.types.index')->with('status', "Deleted -> '$name' type with success..");
    }
}
