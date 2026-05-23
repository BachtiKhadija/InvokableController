
<x-layout>

    @if(session('success'))
        <x-alert type="success">
            {{session('success')}}
        </x-alert>
    @endif
    <h1 class="mb-4">
        Liste des livres
    </h1>

    @foreach($books as $book)

        <x-card-book :book="$book" />

    @endforeach

</x-layout>