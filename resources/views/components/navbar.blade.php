<!-- resources/views/components/navbar.blade.php -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <div class="container">

        <a class="navbar-brand"
           href="/books">

            Books App

        </a>

        <div>

            @auth

                <a href="/books/create"
                   class="btn btn-success">

                    Ajouter Book

                </a>

                <form method="POST"
                      action="{{ route('logout') }}"
                      class="d-inline">

                    @csrf

                    <button class="btn btn-danger">

                        Logout

                    </button>

                </form>

            @endauth


            @guest

                <a href="/login"
                   class="btn btn-primary">

                    Login

                </a>

            @endguest

        </div>

    </div>

</nav>