@extends('layouts.app')
@section('content')
<table class="table table-striped">
    @if ($sedcards !=null)
    <thead>
        <tr class="table-primary">
            <th>Name</th>
            <th>Title</th>
            <th>dateOfBirth</td>
            <th>Description</th>
            <th>Price</th>
            <th>Status</th>
            <th>View</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sedcards as $sedcard)
        <tr>
            <td>{{$sedcard->name}}</td>
            <td>{{$sedcard->title}}</td>
            <td>{{$sedcard->dateOfBirth}}</td>
            <td>{{$sedcard->description}}</td>
            <td>{{$sedcard->priceDescription}}</td>
            <td>{{$sedcard->isActive}}</td>
            <td>
                <a  href="{{route('user.show', $sedcard->id)}}">click</a>
            </td>
        </tr>
        @endforeach 
    </tbody>
        
    @endif
@endsection
