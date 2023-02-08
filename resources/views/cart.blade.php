<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</head>
@include('layout.header')
<body>
    <div class="m-5">
        @foreach ($carts as $cart)
            <div class="p-3 d-flex flex-row justify-content-between align-items-center">
                <div>
                    <img class="img-thumbnail" src="/items/broccoli.png" alt="Image Not Found..." style="scale: 1">
                </div>
                <div>
                    <h5>{{ $cart->item->item_name }}</h5>
                </div>
                <div>
                    <h5>Rp. {{ number_format($cart->price, 0, ',', ',') }},-</h5>
                </div>
                <div>
                    <form action="/delete-from-cart/{{$cart->item_id}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mx-5">

    </div>
</body>
@include('layout.footer')
</html>
