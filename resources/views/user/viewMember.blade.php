@extends('layouts.app')
@section('content')
@include('inc.userNavbar')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Handle member') }}</div>
            <form method="post" action="{{route('user.memberSearch',['id' => $id])}}">
                    @csrf
                        <div class="container box">
                    <div class="panel panel-default">
                        <div class="panel-body">
                        <div class="table-responsive">
                        <h3 align="center">search to add member : <span id="total_records"></span></h3>
                        <input type="text" name="search" id="search" class="form-control" placeholder="Search to add member" />
                        <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                            <th>NAME</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody >
                            @if ($sedcards != null)
                            @foreach($sedcards as $sedcard)
                                <tr>
                                    <td>{{$sedcard->name}}</td>
                                    <td>{{$sedcard->title}}</td>
                                    <td>
                                    <a href="{{route('user.addMember',['id' => $id,'sedcard'=>$sedcard->id])}}">send friend request</a>
                                    
                                    </td>
                                </tr>
                            @endforeach
                            @endif
                        </tbody>
                        </table>
                        </div>
                        </div>    
                    </div>
                    </div>
              </form>
                <div class="card-body">
                    <div class="table-responsive">
                        <h3 align="center">Total members :{{count($members)}}</h3>
                        
                        <div class="panel-heading">members List</div>
                        <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                            <th>NAME</th>
                            <th>Title</th>
                            <th>Phone Number</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($members as $member)
                        <tr>
                            <td>{{$member->name}}</td>
                            <td>{{$member->title}}</td>
                            <td>{{$member->phoneNumber}}</td>
                            
                            <td>
                            <a href="{{route('user.deleteMember',['id' => $id,'member'=>$member->id])}}">remove</a>
                            
                            </td>
                        </tr>
                        @endforeach 
                        </tbody>
                        </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
