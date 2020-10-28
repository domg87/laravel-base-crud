<ul>
    <li>
        <img src="{{$book->image}}" alt="">
    </li>
    <li>{{$book->isbn}}</li>
    <li>{{$book->title}}</li>
    <li>{{$book->author}}</li>
    <li>{{$book->year}}</li>
    <li>{{$book->genre}}</li>
    <li>{{$book->edition}}</li>
    <li>{{$book->pages}}</li>
</ul>

<form action="{{route("books.destroy", $book->id)}}" method="POST">
    @method("DELETE")
    @csrf
    <input type="submit" value="Cancella">
</form>