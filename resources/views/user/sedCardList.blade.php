@extends('layouts.app')
@section('content')
@include('inc.userNavbar')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Owner SedCard information') }}</div>
                <a href="{{route('sedcard.create')}}">ADD SedCard<a>
              
                <div class="card-body">
                        <table border="1">
                            <tr>
                                <th>NAME</th>
                                <th>Title</th>
                                <th>Date of birth</th>
                                <th>Phone Number</th>
                                <th>Active status</th>
                                <th>Action</th>
                            </tr>
                            @if ($sedcards != null)
                                @foreach($sedcards as $sedcard)
                                    <tr>
                                        <td>{{$sedcard->name}}</td>
                                        <td>{{$sedcard->title}}</td>
                                        <td>{{$sedcard->dateOfBirth}}</td>
                                        <td>{{$sedcard->phoneNumber}}</td>
                                        <td>{{$sedcard->isActive}}</td>
                                        <td>
                                        <a href="{{route('sedcard.edit',$sedcard->id)}}}">view</a>|
                                        <a href="{{route('sedcard.delete',$sedcard->id)}}}">Delete</a></td>
                                        @foreach ($groups as $group)
                                            @if ($group['sedcard_id']==$sedcard->id)
                                        <td>This sedcard rquested to join in{{$group['group_id']}}<a href="{{route('user.acceptGroup',['id' => $group['group_id'],'member'=>$group['sedcard_id']])}}}">accept</a>|
                                                                                                <a href="{{route('user.declineGroup',['id' => $group['group_id'],'member'=>$group['sedcard_id']])}}}">delete</a></td>
                                            @endif
                                        @endforeach
                                        
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
