<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ModuleStoreRequest;
use App\Http\Requests\ModuleUpdateRequest;
use App\Models\Module;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Spatie\Permission\Middleware\PermissionMiddleware;

class ModuleController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return[
            new Middleware(PermissionMiddleware::using('index module'), only:['index']),
            new Middleware(PermissionMiddleware::using('show module'), only:['show']),
            new Middleware(PermissionMiddleware::using('create module'), only:['create', 'store']),
            new Middleware(PermissionMiddleware::using('edit module'), only:['edit', 'update']),
            new Middleware(PermissionMiddleware::using('delete module'), only:['delete', 'destroy']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $modules = Module::paginate(8);
        return view('admin.modules.index', ['modules' => $modules]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.modules.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $module = new Module();
        $module->course_id = $request->course_id;
        $module->title = $request->title;
        $module->description = $request->description;
        $module->save();

        return to_route('admin.modules.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Module $module): View
    {
        return view('admin.modules.show', ['module' => $module]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Module $module): View
    {
        return view('admin.modules.edit', ['module' => $module]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Module $module)
    {
        $module->course_id = $request->course_id;
        $module->title = $request->title;
        $module->description = $request->description;
        $module->save();

        return to_route('admin.modules.index')->with('status', 'module updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
     public function delete(Module $module): View
    {
        return view('admin.modules.delete', ['module' => $module]);
    }

    public function destroy(Module $module): RedirectResponse
    {
        $module->delete();
        return to_route('admin.modules.index')->with('status', 'module deleted successfully!');
    }
}