
<x-layout>

    @if(session('success'))
        <div class="alert alert-success">
            {{session('success') }}
        </div>
    @endif
    <h1 class="mb-4">
        Liste des livres
    </h1>

    @foreach($books as $book)

        <x-card-book :book="$book" />

    @endforeach

</x-layout>