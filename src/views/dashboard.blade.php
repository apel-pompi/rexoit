@extends('rexoit::layout.app')
@section('content')
<div class="card-header">
    <div class="card-title">
        Hi, 
        @foreach ($location as $item)
            @if ($item->usertype=='admin')
                Admin
                @break;
            @else
                User
            @endif
        @endforeach
        <p class="text-right">
            <a href="/logout" class="btn btn-danger">Logout</a>
        </p>
    </div>
</div>
<div class="card-body">
    <table class="table">
        <tr>
            <th>User Type</th>
            <th>User Name</th>
            <th>Email</th>
            <th>Lattitude</th>
            <th>Longitude</th>
        </tr>
        @foreach ($location as $value)
            
            <tr>
                <td>{{$value->acname}}</td>
                <td>{{$value->name}}</td>
                <td>{{$value->email}}</td>
                <td>{{$value->lattitude}}</td>
                <td>{{$value->longitude}}</td>
            </tr>
        @endforeach
    </table>
</div>

@endsection