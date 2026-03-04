<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LessontoreRequest;
use App\Http\Requests\LessonUpdateRequest;
use App\Models\Lesson;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Spatie\Permission\Middleware\PermissionMiddleware;

class LessonController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return[
            new Middleware(PermissionMiddleware::using('index lesson'), only:['index']),
            new Middleware(PermissionMiddleware::using('show lesson'), only:['show']),
            new Middleware(PermissionMiddleware::using('create lesson'), only:['create', 'store']),
            new Middleware(PermissionMiddleware::using('edit lesson'), only:['edit', 'update']),
            new Middleware(PermissionMiddleware::using('delete lesson'), only:['delete', 'destroy']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $lessons = Lesson::paginate(8);
        return view('admin.lessons.index', ['lessons' => $lessons]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.lessons.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $lesson = new Lesson();
        $lesson->module_id = $request->module_id;
        $lesson->title = $request->title;
        $lesson->description = $request->description;
        $lesson->duration = $request->duration;
        $lesson->save();

        return to_route('admin.lessons.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lesson $lesson): View
    {
        return view('admin.lessons.show', ['lesson' => $lesson]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lesson $lesson): View
    {
        return view('admin.lessons.edit', ['lesson' => $lesson]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lesson $lesson)
    {
        $lesson->module_id = $request->module_id;
        $lesson->title = $request->title;
        $lesson->description = $request->description;
        $lesson->duration = $request->duration;
        $lesson->save();

        return to_route('admin.lessons.index')->with('status', 'lesson updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
     public function delete(Lesson $lesson): View
    {
        return view('admin.lessons.delete', ['lesson' => $lesson]);
    }

    public function destroy(Lesson $lesson): RedirectResponse
    {
        $lesson->delete();
        return to_route('admin.lessons.index')->with('status', 'lesson deleted successfully!');
    }
}