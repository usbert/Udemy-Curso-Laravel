<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
   

    <main class="container"> 
        
        <h1>Index</h1>
        
        <a href="{{route('user.create')}}"  class="btn btn-primary">Adicionar Outro</a>

        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Editar</th>
                <th scope="col">Deletar</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                  <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td><a type="button" href="{{ route('user.show', $user->id) }}" class="btn btn-success" />Ver</td>
                    <td><a type="button" href="{{ route('user.edit', $user->id) }}" class="btn btn-warning" />Editar</td>
                    <td>
                      <form action="{{route('user.destroy', $user->id)}}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger" />Deletar</button>
                      </form>
                    </td>
                  </tr>
                <tr>
               @endforeach
            </tbody>
            </table>

    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>