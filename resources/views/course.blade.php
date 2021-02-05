@extends('layouts.web')

@section('content')

    {{-- Course Content --}}
    <div class="grid grid-cols-3 gap-4 ">

        {{-- list of lessons --}}
        <div class="p-8 bg-gray-200 col-span-1">
            <ul class="flex flex-col">
                <li class="font-medium text-sm text-gray-400 uppercase mb-4">Contenido</li>
                @foreach ($course->posts as $post)
                    <li class="flex items-center text-gray-600 mt-2">
                        {{ $post->name }}
                        @if ($post->free)
                        <span class="text-xs text-gray-500 font-semibold bg-gray-300 px-2 rounded-full ml-auto">Gratis</span>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
        {{-- End list off lessons --}}

        {{-- Info about course --}}
        <div class="text-gray-700 col-span-2">
            <img src="{{ $course->image }}" alt="">
            <h2 class="text-4xl">{{ $course->name }}</h2>
            <p>{{ $course->description }}</p>
            <div class="flex mt-3">
                <img src="{{ $course->user->avatar }}" class="h-10 w-10 rounded-full mr-2" alt="">
                <div>
                    <p class="text-gray-500 text-sm">{{ $course->user->name }}</p>
                    <p class="text-gray-300 text-xs">{{ $course->created_at->diffForHumans() }}</p>
                </div>
            </div>
            {{-- Similar Courses --}}
            <div class="grid grid-cols-2 gap-4 my-8">
                @foreach ($course->similar() as $course)
                    <x-course-card :course="$course" />
                @endforeach
            </div>
            {{-- End of similar Courses --}}
        </div>
        {{-- End Info about course --}}

    </div>
    {{-- End Course Content --}}

    <div class="text-center mt-4">
        <h1 class="text-3xl text-gray-700 mb-2 uppercase">Últimos cursos</h1>
        <h2 class="text-xl text-gray-600">Fórmate online como profesional en tecnología</h2>
    </div>

    <livewire:course-list>
@endsection