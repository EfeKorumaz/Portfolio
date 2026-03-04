@extends('layouts.layoutadmin')

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
                        <th class="px-4 py-3">Course Id</th>
                        <th class="px-4 py-3">Titel</th>
                        <th class="px-4 py-3">Descriptie</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                    @foreach($modules as $module)
                        <tr class="text-gray-700">
                            <td class="px-4 py-3 text-sm">{{$module->id}}</td>
                            <td class="px-4 py-3 text-sm">{{$module->course_id}}</td>
                            <td class="px-4 py-3 text-sm">{{$module->title}}</td>
                            <td class="px-4 py-3 text-sm">{{$module->description}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="container max-w-4xl mx-auto pb-10 flex justify-between items-center px-3">
                <div class="text-xs">
                    {{ $modules->links() }}
                </div>
            </div>
        </div>
        <!-- end body -->
    </div>
@endsection