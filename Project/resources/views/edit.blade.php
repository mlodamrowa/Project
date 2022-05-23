<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
</head>
<body>
<table>
    <form action="{{route('edit')}}" method="post">
        @method('PATCH')
        @csrf
        <input type="hidden" name="send" value="true">
        <input type="hidden" name="id" value="{{$table[0]->id}}">
        <input type="text" name="title" value="{{$table[0]->title}}"><br>
        <input type="text" name="description" value="{{$table[0]->Description}}"><br>
        <input type="submit" value="Modyfikuj">
    </form>
</table>
</body>
</html>
