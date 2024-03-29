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
        
        <h1>Endereço</h1>
        <h2>{{$user->name}}</h2>
        
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Rua</th>
                <th scope="col">Número</th>
                </tr>
            </thead>
            <tbody>
                  <tr>
                    <th scope="row">{{$user->address->street}}</th>
                    <th scope="row">{{$user->address->number}}</th>
                  </tr>
                <tr>
            </tbody>
            </table>

            <a href="{{route('user.index')}}"  class="btn btn-primary">Voltar</a>


    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>