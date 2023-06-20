<x-app-layout>
    <x-slot name="header">
        <!-- Page Heading -->
        <h2><a href="{{ route('genres.index') }}">List Genres</a></h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Display Genre Details -->
                    <p>Name: {{ $genre->name }}</p>

                    <!-- Edit and Delete Buttons -->
                    <div class="mt-4">
                        <a href="{{ route('genres.edit', $genre->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                        <form action="{{ route('genres.destroy', $genre->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

