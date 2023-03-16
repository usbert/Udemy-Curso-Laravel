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
        
        <h2>Registre-se</h2>
        
        <form action="{{route('user.store')}}" method="post">
        
        @csrf
       
          <div class="mb-3">
              <label for="name" class="form-label">Nome</label>
              <input type="text" class="form-control border border-primary" name="name" id="name">
          </div>
          <div class="mb-3">
              <label for="email" class="form-label">E-mail</label>
              <input type="text" class="form-control border border-primary" name="email" id="email">
          </div>
          
          <div class="mb-3">
            <label for="street" class="form-label">Rua</label>
            <input type="text" class="form-control border border-primary @error('street') is-invalid @enderror" name="street" id="street" value="{{old('street')}}">
            @error('street')
               <div class="invalid-feedback">{{$message}}</div>
            @enderror
          </div>

           <div class="mb-3">
            <label for="number" class="form-label">Número</label>
            <input type="text" class="form-control border border-primary @error('Number') is-invalid @enderror" " name="number" id="number" value="{{old('number')}}">
            @error('number')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
           </div>

           <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control border border-primary" name="password" id="password">
            </div>
            <div class="mb-3">
                <label for="password-confirmation" class="form-label">Confirme a Senha</label>
                <input type="password" class="form-control border border-primary" name="password-confirmation" id="password-confirmation">
            </div>

            <div class="form-check">
                <input type="radio" class="form-check-input" name="term" id="term">
                <label for="flexRadioDefault" class="form-label">Termo de Uso para teste</label>
              </div>

            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>

    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>