<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Incidence;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::orderBy('created_at')->get();
        return view('comments.index', ['comments' => $comments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $incidenceId = $request->input('incidence_id');
        $incidence = Incidence::find($incidenceId);

        if (auth()->user()->department_id == $incidence->department_id) {
            return view('comments.form', ['incidence' => $incidence]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->text = $request->text;
        $comment->time_used = $request->time_used;
        $comment->incidence_id = $request->incidence_id;
        $comment->user_id = auth()->user()->id;
        $comment->save();
        $incidenceId = $request->input('incidence_id');
        return redirect()->route('incidences.show', ['incidence' => $incidenceId]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        return view('comments.show', ['comment' => $comment]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        if (auth()->user()->id === $comment->user_id) {
            return view('comments.form', ['comment' => $comment]);
        } else {
            return redirect()->route('incidences.index')
                ->with('error', 'No tienes permisos para editar este comentario.');
        }
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $comment->text = $request->text;
        $comment->time_used = $request->time_used;
        $comment->incidence_id = $request->incidence_id;
        $comment->user_id = auth()->user()->id;
        $comment->save();

        $incidenceId = $request->input('incidence_id');
        return redirect()->route('incidences.show', ['incidence' => $incidenceId]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        if (auth()->user()->id !== $comment->incidence->owner_id) {
            return redirect()->route('incidences.show', ['incidence' => $comment->incidence])
                ->with('error', 'No tienes permisos para eliminar este comentario.');
        }

        $comment->delete();

        return redirect()->route('incidences.show', ['incidence' => $comment->incidence]);
    }

}
