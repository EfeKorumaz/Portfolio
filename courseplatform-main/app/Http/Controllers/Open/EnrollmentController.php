<?php

namespace App\Http\Controllers\Open;


use App\Models\Enrollment;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationStoreRequest;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Spatie\Permission\Middleware\PermissionMiddleware;



class EnrollmentController extends Controller
{
    public function index(): View
    {
        $id = Auth::user()->id;
        $enrollments = Enrollment::where('user_id', $id)->paginate(8);
        return view('open.enrollments.index', ['enrollments' => $enrollments]);
    }
}
