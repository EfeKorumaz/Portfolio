<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EnrollmentStoreRequest;
use App\Http\Requests\EnrollmentUpdateRequest;
use App\Models\Enrollment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Spatie\Permission\Middleware\PermissionMiddleware;

class EnrollmentController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return[
            new Middleware(PermissionMiddleware::using('index enrollment'), only:['index']),
            new Middleware(PermissionMiddleware::using('show enrollment'), only:['show']),
            new Middleware(PermissionMiddleware::using('create enrollment'), only:['create', 'store']),
            new Middleware(PermissionMiddleware::using('edit enrollment'), only:['edit', 'update']),
            new Middleware(PermissionMiddleware::using('delete enrollment'), only:['delete', 'destroy']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $enrollments = Enrollment::paginate(8);
        return view('admin.enrollments.index', ['enrollments' => $enrollments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.enrollments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $enrollment = new Enrollment();
        $enrollment->user_id = $request->user_id;
        $enrollment->course_id = $request->course_id;
        $enrollment->save();

        return to_route('admin.enrollments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Enrollment $enrollment): View
    {
        return view('admin.enrollments.show', ['enrollment' => $enrollment]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enrollment $enrollment): View
    {
        return view('admin.enrollments.edit', ['enrollment' => $enrollment]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Enrollment $enrollment)
    {
        $enrollment->user_id = $request->user_id;
        $enrollment->course_id = $request->course_id;
        $enrollment->save();

        return to_route('admin.enrollments.index')->with('status', 'enrollment updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
     public function delete(Enrollment $enrollment): View
    {
        return view('admin.enrollments.delete', ['enrollment' => $enrollment]);
    }

    public function destroy(Enrollment $enrollment): RedirectResponse
    {
        $enrollment->delete();
        return to_route('admin.enrollments.index')->with('status', 'enrollment deleted successfully!');
    }
}