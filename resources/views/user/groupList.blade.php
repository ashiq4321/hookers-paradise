@extends('layouts.app')
@section('content')
@include('inc.userNavbar')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Owner group information') }}</div>
                <a href="{{route('user.create')}}">ADD group<a>
              
                <div class="card-body">
                        <table border="1">
                            <tr>
                                <th>NAME</th>
                                <th>Title</th>
                                <th>Phone Number</th>
                                <th>Action</th>
                            </tr>
                            @if ($groups != null)
                                @foreach($groups as $group)
                                    <tr>
                                        <td>{{$group->name}}</td>
                                        <td>{{$group->title}}</td>
                                        <td>{{$group->phoneNumber}}</td>
                                        <td>
                                        <a href="{{route('user.edit',$group->id)}}">Edit</a>|
                                        <a href="{{route('user.groupmember',$group->id)}}">members</a>|
                                        <a href="{{route('user.deleteGroup',$group->id)}}">Delete</a>
                                        
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                            <tr><td>No sedcard is created</td></tr>
                            @endif
                            
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
