<?php

namespace App\Http\Controllers;

use App\Http\Requests\Note\StoreRequest;
use App\Http\Requests\Note\UpdateRequest;
use App\Models\Notes;
use Illuminate\Http\Request;
use Laravel\Prompts\Note;
use PHPUnit\Framework\MockObject\Stub\ReturnStub;

use function PHPUnit\Framework\returnCallback;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $notes = auth()->user()->notes()->latest()->get();

        return view('notes.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();

        Notes::create($data);

        return redirect()->route('notes.index')->with('success', 'Note Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Notes $notes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notes $notes)
    {
        if ($notes->user_id !== auth()->id()) {
            abort(403);
        }
        return view('notes.edit', compact('notes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Notes $notes)
    {
        abort_if($notes->user_id !== auth()->id(), 403);
        $validated = $request->validated();
        $notes->update($validated);
        return redirect()->route('notes.index')->with('success', 'Note Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notes $notes)
    {
        if ($notes->user_id !== auth()->id()) {
            abort(403);
        }
        $notes->delete();

        return redirect()->route('notes.index')->with('success', 'Note Deleted Successfully');
    }
}
