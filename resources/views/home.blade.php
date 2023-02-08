<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</head>
@include('layout.header')
<body>
    <div class="row row-cols-2 row-cols-md-5 g-5" style="margin-left: 15rem; margin-right: 15rem">
        @foreach ($items as $item)
            <div class="col">
                <div class="card h-100 text-white text-center mb-3" style="...">
                    <img class="img-thumbnail" src="/items/broccoli.png" alt="Image Not Found" style="...">
                    <div class="card-body">
                        <h6 class="text-dark">{{ $item->item_name }}</h6>
                        <a class="card-text" href="/item/{{ $item->item_id }}">Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center" style="margin-top: 2rem; margin-bottom: 7rem">
        {{$items->links()}}
    </div>
</body>
@include('layout.footer')
</html>
