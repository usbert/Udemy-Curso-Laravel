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
        
        <h2>Novo Usuário</h2>
        
        <form action="{{route('user.store')}}" method="post">
        
          @csrf
        {{--  @foreach($errors->all() as $error) --}}
        {{--      <li>{{$error}}</li> --}}
        {{--    @endforeach --}}

          <div class="mb-3">
              <label for="name" class="form-label">Nome</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{old('name')}}">
              @error('name')
                <div class="invalid-feedback">{{$message}}</div>
              @enderror
          </div>
          <div class="mb-3">
              <label for="email" class="form-label">E-mail</label>
              <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{old('email')}}">
              @error('email')
                 <div class="invalid-feedback">{{$message}}</div>
              @enderror
          </div>
          <div class="mb-3">
              <label for="password" class="form-label">Senha</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
               @error('password')
                 <div class="invalid-feedback">{{$message}}</div>
              @enderror
          </div>

          <div class="form-check">
            <input type="radio" class="form-check-input @error('term') is-invalid @enderror" name="term" id="term">
            <label for="flexRadioDefault" class="form-label">Termo de Uso para teste</label>
            @error('term')
                 <div class="invalid-feedback">{{$message}}</div>
              @enderror
          </div>


            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>

    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>