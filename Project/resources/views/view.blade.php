<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
</head>
<body>
<table>
    <tr>
        <th>ID</th>
        <th>Tytul</th>
        <th>Opis</th>
        <th>Utworzono</th>
        <th>Ostatnia modyfikacja</th>
        <th>Modyfikuj</th>
        <th>Usun</th>
    </tr>
    @foreach($table as $books)
        <tr>
            <td>{{$books->id}}</td>
            <td>{{$books->title}}</td>
            <td>{{$books->Description}}</td>
            <td>{{$books->created_at}}</td>
            <td>{{$books->updated_at}}</td>
            <td>
                <form method="post" action="{{route('edit')}}">
                    @method( 'PATCH' )
                    @csrf
                    <input type="hidden" name="id" value="{{$books->id}}">
                    <input type="submit" value="Modyfikuj">
                </form>
            </td>
            <td>
                <form method="post" action="{{route('delete')}}">
                    @method( 'DELETE' )
                    @csrf
                    <input type="hidden" name="id" value="{{$books->id}}">
                    <input type="submit" value="Usun">
                </form>
            </td>
        </tr>
    @endforeach
</table>
</body>
</html>
