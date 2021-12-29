@section('pageTitle', 'JH Furniture')
@extends('layouts.master')
@section('content')
<div class="container">
    <h1 class="text-center fs-2 mt-5">Update Profile</h1>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if(session('success'))
    <div class="alert alert-success" id="alert" role="alert">
        Success Update Profile!
    </div>
    @endif
    <div class="d-flex justify-content-center mt-5">
        <form action="/update-user/{{ Auth::user()->id }}" method="POST" class="w-50">
            @csrf
            @guest

            @else
            <div class="mb-3">
                <label for="" class="form-label">Full Name</label>
                <input value="{{ Auth::user()->name }}" type="" class="form-control" id="name" aria-describedby="" name="name">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input value="{{ Auth::user()->email }}" type="email" class="form-control" name="email" id="email">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="password">
            </div>
            @if(!Str::endsWith(Auth::user()->email, '@jh.com'))
            <div class="mb-3">
                <label for="" class="form-label">Gender</label>
                <select class="form-select" aria-label="select gender" name="gender" id="gender">
                    <option selected>{{Auth::user()->gender}}</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Address</label>
                <textarea value="a" class="form-control" placeholder="Input Your Address" id="address" style="height: 100px" name="address">{{Auth::user()->address ?? ''}}</textarea>
            </div>
            @endif
            @endguest


            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
    </div>

</div>
<script>
    // const updateProfile = () => {
    //     event.preventDefault();
    //     const name = document.getElementById('name').value;
    //     const email = document.getElementById('email').value;
    //     const password = document.getElementById('password').value;
    //     const address = document.getElementById('address').value;

    //     $.ajax({
    //         type: "POST",
    //         url: "/update-user",
    //         data: {
    //             "_token": "{{ csrf_token() }}",
    //             "id": "{{ Auth::user()->id }}",
    //             "name": name,
    //             email,
    //             password,
    //             address
    //         },
    //         success: function(result) {
    //             // alert.classList.remove('d-none')
    //             // setTimeout(() => {
    //             //     alert.classList.add('d-none')
    //             // }, 5000);
    //             console.log('tes')
    //         },
    //         error: (err) => {
    //             console.log(err)
    //         }
    //     })
    // }
</script>
@endsection