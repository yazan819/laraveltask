<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create</title>
</head>
<body>
    <h1>create</h1>
    <form action="{{route('netflix.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div>
            <label for="">movie_name</label>
            <input type="text" name="movie_name" placeholder="movie_name" required>
        </div>
        <div>
            <label for="">movie_description</label>
            <input type="text" name="movie_description" placeholder="movie_description" required>
        </div>
        <div>
            <label for="">movie_gener</label>
            <input type="text" name="movie_gener" placeholder="movie_gener" required>
        </div>
        <div>
            <label for="">movie_img</label>
            <input type="file" name="movie_img" placeholder="movie_img" required>
        </div>
        <div>
            <input type="submit" value="Save a New Films">
        </div>
    </form>

</body>
</html>
