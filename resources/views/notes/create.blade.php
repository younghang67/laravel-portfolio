<x-general.header />
<main class="container mx-auto flex justify-center items-center">
    <form action="">
        @csrf
        <div>
            <label>Title</label>
            <input class="border-solid border-2 rounded-md block" type="text" required>
        </div>
        <div>
            <label>Note</label>
            <input class="border-solid border-2 rounded-md block" type="text" required>
        </div>
        <button class=" bg-amber-300 p-4" type="submit">
            create
        </button>
    </form>
</main>

<x-general.footer />
