<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</head>
@include('layout.header')
<body>
    <div class="container p-5 mt-3 w-25 border rounded">
        <form action="/{locale}/login" method="POST">
            @csrf
            <div class="form-group">
                <h1 class="d-flex justify-content-center">Login</h1>
                <label>Email</label>
                <input type="email" class="form-control mb-2" name="email">
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

                <label>Password</label>
                <input type="password" class="form-control mb-2" name="password">
                @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="pb-4 d-flex align-items-center">
                <label>Remember me</label>
                <input class="mx-2" type="checkbox" name="remember" checked={{Cookie::get('emailCookie') != null}}>
            </div>
            <div>
                @error('credentials')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary px-5">Login</button>
            </div>
            <div class="pt-4 d-flex justify-content-center">
                <p>Don't have an account yet? Register <span onclick="window.location='/register'" class="text-primary">here</span></p>
            </div>
        </form>
    </div>
</body>
@include('layout.footer')
</html>
