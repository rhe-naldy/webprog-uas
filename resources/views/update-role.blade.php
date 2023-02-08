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
    <div class="m-5">
        <h1>{{ $account->first_name }} {{ $account->last_name }}</h1>
        <br>
        <br>
        <p>Role: </p>

        <form action="/{locale}/update-role/{{$account->account_id}}" method="POST">
            @method('PATCH')
            @csrf
            <select class="form-control mb-2" name="role">
                @foreach ($roles as $role)
                <option value="{{$role->role_id}}" @if ($account->role->role_name == $role->role_name)
                    selected
                @endif>{{$role->role_name}}</option>
                @endforeach
            </select>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</body>
@include('layout.footer')
</html>
