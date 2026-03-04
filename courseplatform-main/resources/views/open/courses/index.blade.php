@extends('layouts.layoutpublic')

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
                        <th class="px-4 py-3">Id</th>
                        <th class="px-4 py-3">Naam</th>
                        <th class="px-4 py-3">Descriptie</th>
                        <th class="px-4 py-3">Start Datum</th>
                        <th class="px-4 py-3">Eind Datum</th>
                        <th class="px-4 py-3">Aantal Modules</th>
                        <th class="px-4 py-3">Details</th>
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
                            <td class="px-4 py-3 text-sm">{{$course->modules->count() }}</td>
                            <td class="px-4 py-3 text-sm"><a href="{{ route('open.courses.show', ['course' => $course->id]) }}">Details</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
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