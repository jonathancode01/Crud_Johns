<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>CRUD para o Luan</title>
</head>
<body>

<table>
    <thead>

    <form action="/api/players" method="POST">
        @csrf
        <p>Digite seu nome</p>
        <label for="name"></label>
        <input type="text" name="name" id="name">
        <br>
        <p>Digite seu email</p>
        <label for="email"></label>
        <input type="email" name="email" id="email">
        <br>
        <br>
        <button type="submit">Enviar</button>

    </form>
    <br>
    <br>
<table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th>Email</th>
          </tr>
        </thead>

    @foreach($players as $player)

<tbody>


          <tr>
            <th scope="row">1</th>
            <td>{{ $player->name }}</td>
            <td>{{ $player->email }}</td>
          </tr>
        </tbody>

@endforeach
  </table>

    @foreach($players as $player)
        <tr>
            <tr>
                <td scope="row">{{ $loop->index + 1 }}</td>
                <form action="/players/{{ $player->id }}" method="POST">
                    @csrf
                    @method('DELETE')

                </form>
            </tr>
        </tr>



    @endforeach

    <br>
    <br>
</thead>
</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
