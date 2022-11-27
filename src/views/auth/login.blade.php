@extends('rexoit::layout.app')
@section('content')
<div class="card-header">
    <div class="card-title">Login Page</div>
</div>
<div class="card-body">
    <form action="" method="post">
        @if (Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif

        @if (Session::has('error'))
            <div class="alert alert-danger">{{Session::get('error')}}</div>
        @endif
        @csrf
        <p id="demo"></p>
        <input type="hidden" name="activity_name">
        <div class="form-group">
            <label>Email address</label>
            <input type="email" class="form-control" name="email">
            <small class="form-text text-danger"></small>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password">
            <small class="form-text text-danger"></small>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="/registration" class="btn btn-info">Register</a>
    </form>
</div>
<script>
    var x = document.getElementById("demo");
    $(document).ready(function(){
        if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
        } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
        }
    });
    
    
    function showPosition(position) {
        x.innerHTML = "<input type='hidden' name='latitude' value='"+position.coords.latitude+"'/>" + 
        "<input type='hidden' name='longitude' value='"+position.coords.longitude+"'/>";
    }
    </script>
@endsection