<!-- resources/views/components/layout.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>Books App</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body>

    <nav class="navbar navbar-light bg-light mb-4">

        <div class="container">

            <a href="/books"
               class="navbar-brand">
                Gestion des livres
            </a>
        <a href="/books/create"
               class="navbar-brand">
                Ajouter un livre
            </a>
        </div>

    </nav>

    <div class="container">

        {{ $slot }}

    </div>

</body>

</html>