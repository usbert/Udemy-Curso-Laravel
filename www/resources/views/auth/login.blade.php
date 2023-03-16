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
        
        <h2>Login</h2>
        
        <form action="{{route('post.login')}}" method="post">
        
        @csrf
       
          <div class="mb-3">
              <label for="email" class="form-label">E-mail</label>
              <input type="text" class="form-control border border-primary" name="email" id="email">
          </div>

           <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control border border-primary" name="password" id="password">
            </div>

            <button type="submit" class="btn btn-primary">Acessar</button>
        </form>

    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>