<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('test') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Books</h1>

                    @if ($books->isEmpty())
                        <p>No books found.</p>
                    @else
                        <!-- Display table of books -->
                        <table>
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>ISBN</th>
                                <th>Authors</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($books as $book)
                                <tr>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->isbn }}</td>
                                    <td>
                                        @foreach ($book->authors as $author)
                                            {{ $author->fullName() }}@if (!$loop->last), @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        <!-- Action buttons -->
                                        <!-- Add edit and delete buttons with appropriate routes -->
                                        <a href="{{ route('books.edit', $book->id) }}">Edit</a>
                                        <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">Delete</button>
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

                        <!-- Pagination links -->

                        {{ $books->links() }}


                    @endif
                    <a href="{{ route('books.create') }}">Add Book</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
