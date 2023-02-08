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
    <div class="container p-5 mt-3 w-25 border rounded" style="margin-bottom: 10rem">
        <form action="/register" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <h1 class="d-flex justify-content-center">{{__('account.register')}}</h1>
                <label>{{__('account.first_name')}}</label>
                <input type="text" class="form-control mb-2" name="first_name">
                @error('first_name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

                <label>{{__('account.last_name')}}</label>
                <input type="text" class="form-control mb-2" name="last_name">
                @error('last_name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

                <label>Email</label>
                <input type="email" class="form-control mb-2" name="email">
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

                <label>{{__('account.role')}}</label>
                <select class="form-control mb-2" name="role">
                    <option value="{{ 2 }}" selected>User</option>
                </select>
                @error('role')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

                <label>{{__('account.gender')}}</label>
                <select class="form-control mb-2" name="gender">
                    @foreach ($genders as $gender)
                        <option value="{{ $gender->gender_id }}">{{ $gender->gender_desc }}</option>
                    @endforeach
                </select>
                @error('gender')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

                <label>{{__('account.picture')}}</label>
                <input type="file" accpet="image/*, .jpeg, .jpg, .png, .gif" class="form-control mb-2" name="display_picture_link">
                @error('display_picture_link')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

                <label>{{__('account.password')}}</label>
                <input type="password" class="form-control mb-2" name="password">
                @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

                <label>{{__('account.conf_password')}}</label>
                <input type="password" class="form-control mb-2" name="confirm_password">

                @error('confirm_password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="pt-5 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary px-5">{{__('account.register')}}</button>
            </div>
            <div class="pt-3 d-flex justify-content-center">
                <p>{{__('account.have_account')}}<span onclick="window.location='/{locale}/login'" class="text-primary">{{__('account.here')}}</span></p>
            </div>
        </form>
    </div>
</body>
@include('layout.footer')
</html>
