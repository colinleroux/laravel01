<x-app-layout>
    <x-slot name="header">
        <!-- Page Heading -->
        <h2>Add Book</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('books.store') }}" method="POST">
                        @csrf

                        <!-- Book Title -->
                        <div class="mb-4">
                            <label for="title" class="block">Title:</label>
                            <input type="text" name="title" id="title" required>
                        </div>

                        <!-- ISBN 10 -->
                        <div class="mb-4">
                            <label for="isbn_10" class="block">ISBN 10:</label>
                            <input type="text" name="isbn_10" id="isbn_10" required>
                        </div>

                        <!-- ISBN 13 -->
                        <div class="mb-4">
                            <label for="isbn_13" class="block">ISBN 13:</label>
                            <input type="text" name="isbn_13" id="isbn_13" required>
                        </div>

                        <!-- Authors -->
                        <div class="mb-4">
                            <label for="authors" class="block">Authors:</label>
                            <select name="authors[]" id="authors" multiple required>
                                @foreach ($authors as $author)
                                    <option value="{{ $author->id }}">{{ $author->fullName() }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Create Button -->
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
