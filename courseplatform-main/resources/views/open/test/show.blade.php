@extends('layouts.layoutpublic')

@section('content')
    <div class="card mt-6">

    <div class="card-body grid grid-cols-1 gap-6 lg:grid-cols-1">
            <div class="p-4">
                <form id="form" class="shadow-md rounded-lg px-8 pt-6 pb-8 mb-4"
                      action="{{ route('open.courses.update', ['course' => $course->id]) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <label class="block text-sm">
                        <span class="text-gray-700">Id</span>
                        <input class="bg-gray-200  block rounded w-full p-2 mt-1 focus:border-purple-400
                        focus:outline-none focus:shadow-outline-purple form-input"
                               name="id" value="{{ $course->id }}" type="text" disabled/>
                    </label>
                    <label class="block text-sm">
                        <span class="text-gray-700">Name</span>
                        <input class="bg-gray-200  block rounded w-full p-2 mt-1 focus:border-purple-400
                        focus:outline-none focus:shadow-outline-purple form-input"
                               name="title" value="{{ $course->title }}" type="text" disabled/>
                    </label>
                    <label class="block text-sm">
                        <span class="text-gray-700">Description</span>
                        <textarea
                            class="bg-gray-200 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight
                            focus:outline-none focus:shadow-outline" name="description"
                            id="description" rows="7" disabled>{{ $course->description }}</textarea>
                    </label>
                    <label class="block text-sm">
                        <span class="text-gray-700">Start Date</span>
                        <input class="bg-gray-200  block rounded w-full p-2 mt-1 focus:border-purple-400
                        focus:outline-none focus:shadow-outline-purple form-input"
                               name="start_date" value="{{ $course->start_date }}" type="text" disabled/>
                    </label>

                    <label class="block text-sm">
                        <span class="text-gray-700">End Date</span>
                        <input class="bg-gray-200  block rounded w-full p-2 mt-1 focus:border-purple-400
                        focus:outline-none focus:shadow-outline-purple form-input"
                               name="end_date" value="{{ $course->end_date }}" type="text" disabled/>
                    </label>
                </form>
            </div>
        </div>
    </div>

@endsection
