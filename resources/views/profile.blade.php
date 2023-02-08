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
    <div class="d-flex flex-row" style="margin-left: 10rem; margin-right: 10rem">
        <div class="d-flex justify-content-end align-items-center" style=" margin-bottom: 10rem">
            <img src="{{ url($account->display_picture_link) }}" alt="Image Not Found..." style="width: 20rem; height: 20rem">
        </div>
        <div class="container p-3 px-5 mt-3 w-50 border rounded" style="margin-bottom: 5rem;">
            <form action="/update-profile" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <h1 class="d-flex justify-content-center">Profile</h1>
                    <label>First Name</label>
                    <input type="text" class="form-control mb-2" name="first_name" value={{ $account->first_name }}>
                    @error('first_name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror

                    <label>Last Name</label>
                    <input type="text" class="form-control mb-2" name="last_name" value={{ $account->last_name }}>
                    @error('last_name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror

                    <label>Email</label>
                    <input type="email" class="form-control mb-2" name="email"  value={{ $account->email }}>
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror

                    <label>Role</label>
                    <select class="form-control mb-2" name="role" disabled>
                        <option value="user" @if ($account->role->role_name == "user")
                            selected
                        @endif>User</option>
                        <option value="admin" @if ($account->role->role_name == "admin")
                            selected
                        @endif>Admin</option>
                    </select>
                    @error('role')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror

                    <label>Gender</label>
                    <select class="form-control mb-2" name="gender">
                        @foreach ($genders as $gnd)
                        <option value="{{ $gnd->gender_id }}" @if ($account->gender->gender_desc == $gnd->gender_desc)
                            selected
                        @endif>{{ $gnd->gender_desc }}</option>
                        @endforeach
                    </select>
                    @error('gender')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror

                    <label>Display Picture</label>
                    <input type="file" accpet="image/*, .jpeg, .jpg, .png, .gif" class="form-control mb-2" name="display_picture_link" id="display">
                    @error('display_picture_link')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror

                    <label>New Password</label>
                    <input type="password" class="form-control mb-2" name="password">
                    @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror

                    <label>Confirm New Password</label>
                    <input type="password" class="form-control mb-2" name="confirm_password">
                    @error('confirm_password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="d-flex pt-3 justify-content-center">
                    <button type="submit" class="btn btn-primary px-5">Update</button>
                </div>
            </form>
        </div>
    </div>
</body>
@include('layout.footer')
</html>
