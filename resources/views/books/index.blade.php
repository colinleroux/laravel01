<x-app-layout>
    <x-slot name="header">
        <!-- Page Heading -->
        <h2><a href="{{ route('books.create') }}">Add New Book</a></h2>
    </x-slot>
    @if(session('bookDeleted'))
        <div class="text-green-500">Book deleted</div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($books->isEmpty())
                        <p>No books found.</p>
                    @else
                        <!-- Display table of books -->
                        <table class="table-auto w-full">
                            <thead>
                            <tr>
                                <th class="px-4 py-2">Title</th>
                                <th class="px-4 py-2">ISBN 10</th>
                                <th class="px-4 py-2">ISBN 13</th>
                                <th class="px-4 py-2">Authors</th>
                                <th class="px-4 py-2">Actions</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($books as $book)
                                <tr>
                                    <td class="px-4 py-2"><a href="{{ route('books.show', $book->id) }}">{{ $book->title }}</a></td>
                                    <td class="px-4 py-2">{{ $book->isbn_10 }}</td>
                                    <td class="px-4 py-2">{{ $book->isbn_13 }}</td>
                                    <td class="px-4 py-2">
                                        @foreach ($book->authors as $author)
                                            {{ $author->fullName() }}@if (!$loop->last), @endif
                                        @endforeach
                                    </td>
                                    <td class="px-4 py-2">
                                        <!-- Action buttons -->
                                        <!-- Add edit and delete buttons with appropriate routes -->
                                        <a href="{{ route('books.edit', $book->id) }}" class="text-blue-500">Edit</a>
                                    </td>
                                    <td class="px-4 py-2">
                                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this book?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500">Delete</button>
                                        </form>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No books found.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        <br>
                        <br>

                        <!-- Pagination links -->
                        {{ $books->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

