<x-app-layout>
    <x-slot name="header">
        <!-- Page Heading -->
        <h2><a href="{{ route('genres.create') }}">Add New Genre</a></h2>
    </x-slot>

    <!-- Display Genres -->

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <ul>
                        @foreach ($genres as $genre)
                            <li><a href="{{ route('genres.show', $genre->id) }}">{{ $genre->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>




</x-app-layout>
