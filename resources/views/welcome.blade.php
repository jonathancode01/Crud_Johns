<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CRUD</title>
</head>
<body>

<table>
    <thead>
      <h5>CRUD</h5>
    <form action="/players" method="POST">
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
        <button class="btn btn-secondary" type="submit">Enviar</button>

    </form>
    <br>
    <br>

                    <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th>Email</th>
                        <th>Ações</th>
                    </tr>
                    </thead>

<tbody>
            @foreach($players as $player)
        <tr>
            <td scope="row">{{ $loop->index + 1 }}</td>
            <td>{{ $player->name }}</td>
            <td>{{ $player->email }}</td>
            <td>
                <!-- Botão de editar -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $player->id }}">Editar</button>

                <!-- Modal de edição -->
                <div class="modal fade" id="exampleModal{{ $player->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar informações</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/players/{{ $player->id }}" method="POST">
                                    @csrf
                                    @method('PUT') <!-- Corrigido para usar 'PUT' -->
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Nome:</label>
                                        <input type="text" class="form-control" id="recipient-name" value="{{ $player->name }}" name="name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="recipient-email" class="col-form-label">Email:</label>
                                        <input type="email" class="form-control" id="recipient-email" value="{{ $player->email }}" name="email">
                                    </div>
                                </form>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <button type="button" class="btn btn-primary update-btn" data-player-id="{{ $player->id }}">Atualizar dados</button>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        document.querySelectorAll('.update-btn').forEach(function(btn) {
                            btn.addEventListener('click', function() {
                                var playerId = this.dataset.playerId;
                                var form = document.querySelector('#exampleModal' + playerId + ' form');
                                var formData = new FormData(form);

                                fetch('/players/' + playerId, {
                                    method: 'POST', // Altere o método para POST
                                    headers: {
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'), // Obtendo o token CSRF
                                        'Content-Type': 'application/json',
                                        'Accept': 'application/json'
                                    },
                                    body: JSON.stringify(Object.fromEntries(formData.entries()))
                                })
                                .then(response => {
                                    if (!response.ok) {
                                        throw new Error('Erro ao atualizar o jogador');
                                    }
                                    window.location.reload();
                                })
                                .catch(error => {
                                    console.error('Erro ao atualizar o jogador:', error);
                                });

                            });
                        });
                    });
                </script>

                <!-- Formulário de exclusão -->
                <form action="/players/{{ $player->id }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger">DELETAR</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
    <br>
    <br>
</thead>
</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
