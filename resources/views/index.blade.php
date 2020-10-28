<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($books as $book)
        <div>
        <h2> Titolo: {{ $book->title }}</h2>
            <h3> Autore: {{ $book->author }}</h3>
            <small>Casa editrice: {{ $book->edition }}</small>
        </div>
    @endforeach
</body>
</html>