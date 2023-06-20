<x-app-layout>
    <x-slot name="header">
        <!-- Page Heading -->
        @isset($book)
            <h2>{{ $book->title }}</h2>
        @else
            <h2>Book Not Found</h2>
        @endisset
    </x-slot>

    <!-- Book Details -->
    @isset($book)
        <div>
            <p><strong>Title:</strong> {{ $book->title }}</p>
            <p><strong>ISBN 10:</strong> {{ $book->isbn_10 }}</p>
            <p><strong>ISBN 13:</strong> {{ $book->isbn_13 }}</p>
            <p><strong>Authors:</strong>
                @foreach ($book->authors as $author)
                    {{ $author->fullName() }}@if (!$loop->last), @endif
                @endforeach
            </p>
        </div>

        <!-- Actions -->
        <div>
            <a href="{{ route('books.edit', $book->id) }}">Edit</a>
            <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </div>
    @endisset
</x-app-layout>
