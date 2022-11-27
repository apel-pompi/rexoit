@extends('rexoit::layout.app')
@section('content')
<div class="card-header">
    <div class="card-title">Registration Page</div>
</div>
<div class="card-body">
    <form action="{{route('registration')}}" method="post">
        @if (Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif

        @if (Session::has('error'))
            <div class="alert alert-danger">{{Session::get('error')}}</div>
        @endif
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name">
            <small class="form-text text-danger"></small>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email">
            <small class="form-text text-danger"></small>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password">
            <small class="form-text text-danger"></small>
        </div>
        <div class="form-group">
            <label>User Type</label>
            <select name="usertype" id="usertype" class="form-control">
                <option value="">Select User Type</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
            <small class="form-text text-danger"></small>
        </div>
        
        <button type="submit" class="btn btn-primary">Register</button>
        <a href="/login" class="btn btn-info">Login</a>
    </form>
</div>
@endsection