<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('books.update', $book->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Titolo</label>
            <input type="text" name="title" id="title" value="{{ $book->title}}">
        </div>

        <div>
            <label for="author">Autore</label>
            <input type="text" name="author" id="author" value="{{ $book->author}}">
        </div>

        <div>
            <label for="edition">Casa editrice</label>
            <input type="text" name="edition" id="edition" value="{{ $book->edition}}">
        </div>

        <div>
            <label for="genre">Genere</label>
            <input type="text" name="genre" id="genre" value="{{ $book->genre}}">
        </div>

        <div>
            <label for="year">Data</label>
            <input type="date" name="year" id="year" value="{{ $book->year}}">
        </div>

        <div>
            <label for="isbn">ISBN</label>
            <input type="text" name="isbn" id="isbn" value="{{ $book->isbn}}">
        </div>

        <div>
            <label for="pages">Pagine</label>
            <input type="text" name="pages" id="pages" value="{{ $book->pages}}">
        </div>

        <input type="submit" value="Salva">
    </form>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

</body>

</html>