<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</head>
@include('layout.header')
<body>
    <div>
        <table class="table" style="padding-left: 10rem">
            <thead>
                <tr>
                    <th scope="col">{{__('account.account')}}</th>
                    <th scope="col">{{__('account.action')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($accounts as $account)
                @if ($account->account_id != Auth::user()->account_id)
                <tr>
                    <td>{{ $account->first_name }} {{ $account->last_name }} - {{ $account->role->role_name }}</td>
                    <td class="d-flex flex-row">
                        <a class="btn btn-primary" href="/{locale}/update-role/{{$account->account_id}}">{{__('account.update')}} {{__('account.role')}}</a>
                        <form class="px-3" action="/delete-account/{{$account->account_id}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger" type="submit">{{__('account.delete')}}</button>
                        </form>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</body>
@include('layout.footer')
</html>
