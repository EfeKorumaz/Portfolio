<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use illuminate\View\View;

class CourseListController extends Controller
{
    public function index(): View
    {
        $courses = Course::orderBy('created_at', 'desc')->get();
        return view('courselist', ['courses' => $courses]);
    }}
