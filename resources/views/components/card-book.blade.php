<!-- resources/views/components/card-book.blade.php -->

<div class="card mb-3">

    <div class="card-body">

        <h4>{{ $book->title }}</h4>

        <p>{{ $book->description }}</p>

        <p>
            Auteurs :</p>
         <ul> @foreach($book->authors as $author) 
            <li>{{ $author->name }} - {{ $author->pivot->status }}</li> 
              @endforeach
        </ul>
           @can('update', $book)
            <a href="/books/{{ $book->id }}/edit"
           class="btn btn-warning">

            Modifier

        </a>
        @endcan

        @can('delete', $book)

            <form method="POST"
                  action="/books/{{ $book->id }}">

                @csrf
                @method('DELETE')

                <button class="btn btn-danger">

                    Supprimer

                </button>

            </form>

        @endcan

    </div>

</div>