<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
</head>
<body>

<form method="post" action="{{route('create')}}">
    @csrf
    <h2>Wpisz tytul i opis ksiazki</h2>
    <input type="text" name="title" placeholder="Tytul"> <br>
    <input type="text" name="description" placeholder="Opis"> <br>
    <input type="submit" value="Wyslij">
</form>
<p>@isset($message) @empty(!$message) {{$message}} @endempty @endisset</p>
</body>
</html>
