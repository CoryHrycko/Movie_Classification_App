<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <buton>
            +
        </button>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @foreach($movies as $movie)
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                {{$movie->title}}  {{$movie->format}}  {{$movie->length}}  {{$movie->release_year}}   {{$movie->rating}}
                </div>
            </div>
        @endforeach
        </div>
    </div>

</x-app-layout>
