<x-app-layout>
    <x-slot name="header">
        <!-- Page Heading -->
        <h2>Edit Book</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('books.update', $book->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Book Title -->
                        <div class="mb-4">
                            <label for="title" class="block">Title:</label>
                            <input type="text" name="title" id="title" value="{{ $book->title }}" required>
                            @error('title')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- ISBN 10 -->
                        <div class="mb-4">
                            <label for="isbn_10" class="block">ISBN 10:</label>
                            <input type="text" name="isbn_10" id="isbn_10" value="{{ $book->isbn_10 }}" required>
                            @error('isbn_10')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- ISBN 13 -->
                        <div class="mb-4">
                            <label for="isbn_13" class="block">ISBN 13:</label>
                            <input type="text" name="isbn_13" id="isbn_13" value="{{ $book->isbn_13 }}" required>
                            @error('isbn_13')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Authors -->
                        <div class="mb-4">
                            <label for="authors" class="block">Authors:</label>
                            <select name="authors[]" id="authors" multiple required>
                                @foreach ($authors as $author)
                                    <option value="{{ $author->id }}" {{ in_array($author->id, $book->authors->pluck('id')->toArray()) ? 'selected' : '' }}>
                                        {{ $author->fullName() }}
                                    </option>
                                @endforeach
                            </select>
                            @error('authors')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Save Button -->
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

