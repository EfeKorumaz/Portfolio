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
                        <th class="px-4 py-3">Enrollment Id</th>
                        <th class="px-4 py-3">User Id</th>
                        <th class="px-4 py-3">Course Id</th>
                        <th class="px-4 py-3">Enroll Out</th>

                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                    @foreach($enrollments as $enrollment)
                        <tr class="text-gray-700">
                            <td class="px-4 py-3 text-sm">{{$enrollment->id}}</td>
                            <td class="px-4 py-3 text-sm">{{$enrollment->user_id}}</td>
                            <td class="px-4 py-3 text-sm">{{$enrollment->course_id}}</td>
                            <td>
                                <div class="flex items-center space-x-4 text-sm">
                                    <a href="{{ route('open.enrollments.delete', ['enrollment' => $enrollment->id]) }}">Enroll Out</a>
                                </div>
                            </td>
                        </tr>
                        
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="container max-w-4xl mx-auto pb-10 flex justify-between items-center px-3">
                <div class="text-xs">
                    {{ $enrollments->links() }}
                </div>
            </div>
        </div>
        <!-- end body -->
    </div>
@endsection