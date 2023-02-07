<!DOCTYPE html>
<html lang="en">
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
    <div class="row row-cols-1 row-cols-md-4 g-4 m-2">
        {{-- SHOW PRODUCT --}}
        @foreach ($products as $product)
            <div class="col">
                <div class="card h-100 text-white text-center bg-dark mb-3" style="...">
                    <img class="card-ing-top" src="{{ url($product->image) }}" alt="Image Not Found" style="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">Rp.{{ number_format($product->price, 0, '.', '.') }}</p>
                    </div>
                    <div class="flex">
                        <a href="/updateProduct/{{$product->id}}" type="submit" class="btn btn-primary w-50">Update</a>
                    </div>
                    <form method="POST" action="/deleteData/{{$product->id}}">
                        {{-- CSRF --}}
                        @csrf
                        {{-- METHOD DELETE --}}
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-50">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    <div class="m-5 d-flex justify-content-center">
        {{$products->withQueryString()->links()}}
    </div>
</body>
@include('layout.footer')
</html>
