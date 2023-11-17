<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create</title>
</head>
<body>
    <h1>edit</h1>
    <form action="{{route('netflix.update', ['movie' => $movie])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div>
            <label for="">movie_name</label>
            <input type="text" name="movie_name" placeholder="movie_name" value="{{$movie->movie_name}}">
        </div>
        <div>
            <label for="">movie_description</label>
            <input type="text" name="movie_description" placeholder="movie_description" value="{{$movie->movie_description}}">
        </div>
        <div>
            <label for="">movie_gener</label>
            <input type="text" name="movie_gener" placeholder="movie_gener" value="{{$movie->movie_gener}}">
        </div>
        <div>
            <label for="">movie_img</label>
            <input type="file" name="movie_img" placeholder="movie_img" value="{{$movie->movie_img}}">
        </div>
        <div>
            <input type="submit" value="update">
        </div>
    </form>

</body>
</html>
