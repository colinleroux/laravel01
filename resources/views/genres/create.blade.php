<x-app-layout>
    <x-slot name="header">
        <!-- Page Heading -->
        <h2>Create Genre</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('genres.store') }}" method="POST">
                        @csrf

                        <!-- Genre Name -->
                        <div class="mb-4">
                            <label for="name" class="block">Name:</label>
                            <input type="text" name="name" id="name" required>
                        </div>

                        <!-- Save Button -->
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

In this updated code, I added some spacing and styling classes to improve the appearance of the form. The <div> element inside the form has a mb-4 class, which adds margin-bottom for spacing between form fields. The save button has a blue background color, white text, and rounded corners. You can modify the styling classes according to your preference.

