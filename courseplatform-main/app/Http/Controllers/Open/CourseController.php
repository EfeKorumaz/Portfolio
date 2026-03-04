<?php

namespace App\Http\Controllers\Open;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CourseController extends Controller
{
    public function index(): View
    {
        $courses = Course::paginate(8);
        return view('open.courses.index', ['courses' => $courses]);
    }
    public function show(Course $course): View
    {
        return view('open.courses.show', ['course' => $course]);
    }
}
