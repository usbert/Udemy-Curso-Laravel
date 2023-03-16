<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input:not(:placeholder-shown) {
            background-color:  #cbf0ff!important;
            border-color: #000000;
        }
        textarea:not(:placeholder-shown) {
            background-color:  #cbf0ff!important;
            border-color: #000000;
        }
        select:not(:placeholder-shown) {
            background-color:  #cbf0ff!important;
            border-color: #000000;
        }
        </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    
<main class="container"> 
        
        <h2>Novo Post</h2>
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
        @endif
        @if (\Session::has('warning'))
            <div class="alert alert-warning">
                <ul>
                    <li>{!! \Session::get('warning') !!}</li>
                </ul>
            </div>
        @endif
        <form action="{{route('post.store')}}" method="post">
        
          @csrf
          {{-- <div class="form-group mb-3">
                <label for="user_id" class="form-label">Usuário</label>
                
                <select class="form-control" name="user_id">
                    <option value="" selected>-- Selecione o Usuário --</option>
                    @foreach ($users as $user)
                        <option value="{{$user->id}}}">{{$user->id}} - {{$user->name}}</option>
                    @endforeach
                </select>
          </div> --}}

          <div class="mb-3">
              <label for="title" class="form-label">Titulo</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{old('title')}}">
              @error('title')
                <div class="invalid-feedback">{{$message}}</div>
              @enderror
          </div>
          <div class="mb-3">
              <label for="content" class="form-label">Texto</label>
              <textarea class="form-control" name="content" id="content" value="{{old('content')}}"></textarea>
          </div>
         
            <button type="submit" class="btn btn-primary">Cadastrar Post</button>
        </form>

    </main>

</main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>