<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseStoreRequest;
use App\Http\Requests\CourseUpdateRequest;
use App\Models\Course;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Spatie\Permission\Middleware\PermissionMiddleware;

class CourseController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return[
            new Middleware(PermissionMiddleware::using('index course'), only:['index']),
            new Middleware(PermissionMiddleware::using('show course'), only:['show']),
            new Middleware(PermissionMiddleware::using('create course'), only:['create', 'store']),
            new Middleware(PermissionMiddleware::using('edit course'), only:['edit', 'update']),
            new Middleware(PermissionMiddleware::using('delete course'), only:['delete', 'destroy']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $courses = Course::paginate(8);
        return view('admin.courses.index', ['courses' => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $course = new Course();
        $course->title = $request->title;
        $course->description = $request->description;
        $course->start_date = $request->start_date;
        $course->end_date = $request->end_date;
        $course->save();

        return to_route('admin.courses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course): View
    {
        return view('admin.courses.show', ['course' => $course]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course): View
    {
        return view('admin.courses.edit', ['course' => $course]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $course->title = $request->title;
        $course->description = $request->description;
        $course->start_date = $request->start_date;
        $course->end_date = $request->end_date;
        $course->save();

        return to_route('admin.courses.index')->with('status', 'Course updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
     public function delete(Course $course): View
    {
        return view('admin.courses.delete', ['course' => $course]);
    }

    public function destroy(Course $course): RedirectResponse
    {
        $course->delete();
        return to_route('admin.courses.index')->with('status', 'Course deleted successfully!');
    }
}