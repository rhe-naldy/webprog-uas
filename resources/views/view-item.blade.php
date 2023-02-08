<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $item->item_name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</head>
@include('layout.header')
<body>
    <div class="m-5 d-flex flex-row">
        <div class="rounded m-5 p-2 d-flex flex-column align-items-center">
            <h2>{{ $item->item_name }}</h2>
            <img class="img-thumbnail" src="/items/broccoli.png" alt="Image Not Found">
        </div>
        <div class="m-5 d-flex flex-column">
            <div class="d-flex flex-column px-5">
                <h5 class="font-weight-bold mt-3">Price: Rp. {{ number_format($item->price, 0, ',', ',') }},-</h5>
                <p>{{ $item->item_desc }}</p>
            </div>
            <div class="d-flex flex-row-reverse p-5">
                <form action="/{locale}/buy-item/{{$item->item_id}}" method="POST">
                    @csrf
                    <button class="btn btn-primary" type="submit">Buy</button>
                </form>
            </div>
        </div>

    </div>
</body>
@include('layout.footer')
</html>
