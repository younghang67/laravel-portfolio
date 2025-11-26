<x-general-layout>
    <main class="container mx-auto flex justify-center items-center flex-col">
        <h2 class="text-2xl font-bold mt-8">Create Notes</h2>
        <form class="mt-6" action="{{ route('notes.update', $notes->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label>Title</label>
                <input name="title" class="border-solid border-2 rounded-md block" type="text"
                    value="{{ $notes->title }}" required>
            </div>
            <div>
                <label>Note</label>
                <input name="body" class="border-solid border-2 rounded-md block" type="text"
                    value="{{ $notes->body }}" required>
            </div>
            <button
                class="mt-4 bg-blue-500 px-4 py-2 text-white rounded-md font-semibold hover:scale-105 transition-all cursor-pointer"
                type="submit">
                update
            </button>
        </form>
    </main>
</x-general-layout>
