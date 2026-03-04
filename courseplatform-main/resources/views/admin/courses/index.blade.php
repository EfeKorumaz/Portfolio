@extends('layouts.layoutadmin')
@include('admin.courses.topmenu')

@section('content')
    <div class="card mt-6">

        @if(session('status'))
            <div class="card-body">
                <div class="bg-green-400 text-green-800 rounded-lg shadow-md p-6 pr-10 mb-8" style="min-width: 240px">{{ session('status') }}</div>
            </div>
        @endif
        @if(session('status-wrong'))
            <div class="card-body">
                <div class="bg-red-400 text-red-800 rounded-lg shadow-md p-6 pr-10 mb-8" style="min-width: 240px">{{ session('status-wrong') }}</div>
            </div>
        @endif
        <!-- body -->
        <div class="card-body grid grid-cols-1 gap-6 lg:grid-cols-1">
            <div class="p-4">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                        <!-- deze dingen moeten veranderd wroden op basis van anderen file -->
                        <th class="px-4 py-3">Id</th>
                        <th class="px-4 py-3">Naam</th>
                        <th class="px-4 py-3">Descriptie</th>
                        <th class="px-4 py-3">Start Datum</th>
                        <th class="px-4 py-3">Eind Datum</th>
                        <th class="px-4 py-3">Details</th>
                        <th class="px-4 py-3">Edit</th>
                        <th class="px-4 py-3">Delete</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                    @foreach($courses as $course)
                        <tr class="text-gray-700">
                            <td class="px-4 py-3 text-sm">{{$course->id}}</td>
                            <td class="px-4 py-3 text-sm">{{$course->title}}</td>
                            <td class="px-4 py-3 text-sm">{{$course->description}}</td>
                            <td class="px-4 py-3 text-sm">{{$course->start_date}}</td>
                            <td class="px-4 py-3 text-sm">{{$course->end_date}}</td>
                            <td class="px-4 py-3 text-sm"><a href="{{ route('admin.courses.show', ['course' => $course->id]) }}">Details</a></td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    <a href="{{ route('admin.courses.edit', ['course' => $course->id]) }}">Wijzigen</a>
                                </div>
                            </td>
                            <td>
                                <div class="flex items-center space-x-4 text-sm">
                                    <a href="{{ route('admin.courses.delete', ['course' => $course->id]) }}">Verwijderen</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150
                        bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700
                        focus:outline-none focus:shadow-outline-purple">
            <a href="/admin/courses/create">Create Course</a>
            </div>
            <div class="container max-w-4xl mx-auto pb-10 flex justify-between items-center px-3">
                <div class="text-xs">
                    {{ $courses->links() }}
                </div>
            </div>
        </div>
        <!-- end body -->
    </div>
@endsection