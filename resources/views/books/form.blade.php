<!-- resources/views/books/form.blade.php -->

<x-layout>

    <h2 class="mb-4">

        {{isset($book) ? 'Modifier Book' : 'Ajouter Book' }}

    </h2>

    <form method="POST"
          action="{{ isset($book) ? '/books/'.$book->id : '/books' }}">

        @csrf

        @if(isset($book))

            @method('PUT')

        @endif


        <div class="mb-3">

            <label>Titre</label>

            <input type="text"
                   name="title"
                   class="form-control"
                   value="{{ $book->title ?? '' }}">

        </div>


        <div class="mb-3">

            <label>Description</label>

            <textarea name="description"
                      class="form-control">{{ $book->description ?? '' }}</textarea>

        </div>


        <div class="mb-3">

            <label>ISBN</label>

            <input type="text"
                   name="isbn"
                   class="form-control"
                   value="{{ $book->isbn ?? '' }}">

        </div>


        <div class="mb-3">

            <label>Pages</label>

            <input type="number"
                   name="pages"
                   class="form-control"
                   value="{{ $book->pages ?? '' }}">

        </div>


        <button class="btn btn-primary">

            {{ isset($book) ? 'Modifier' : 'Ajouter' }}

        </button>

    </form>

</x-layout>