<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>netflix</h1>
    <div>
        <div>
            <a href="{{route('netflix.create')}}"> create a movie</a>
        </div>
        <table border="1">
            <tr>
                <th style="margin: 10px">ID</th>
                <th>movie_name</th>
                <th>movie_description</th>
                <th>movie_gener</th>
                <th>movie_img</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach ($movies as $movie)
                <tr>
                    <td>{{$movie->id}}</td>
                    <td>{{$movie->movie_name}}</td>
                    <td>{{$movie->movie_description}}</td>
                    <td>{{$movie->movie_gener}}</td>
                    <td><img src="{{ asset('storage/images/'.$movie->movie_img) }}" width="80px" height="80px" alt="Movie Image"></td>
                    <td>
                        <a href="{{route('netflix.edit',['movie' => $movie])}}">Edit</a>
                    </td>
                    <td>
                        <form method="post" action="{{route('netflix.destroy',['movie' => $movie])}}">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>

            @endforeach
        </table>
    </div>

</body>
</html>
