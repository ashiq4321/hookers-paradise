@extends('../layouts.app')
@include('../admin.layouts.adminNavbar')
@section('title')
    <h5>{{ __('Users') }}</h5>
@endsection
@section('breadcrumbs')
    <a href="{{route('admin.')}}">{{__('Admincenter')}}</a> >
    {{__('Users')}}
@endsection
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{__('Name')}}</th>
                <th scope="col">{{__('Email')}}</th>
                <th scope="col">{{__('Roles')}}</th>
                <th scope="col" class="text-right">{{__('Actions')}}</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tr>
            <td scope="col">{{ $user->id }}</td>
            <td scope="col">{{ $user->name }}</td>
            <td scope="col">{{ $user->email }}</td>
            <td scope="col">{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</td>
            <td scope="col" class="text-right">
                @can('users-view')
                    <a href="{{route('admin.users.show', $user)}}"><button type="button" class="btn btn-primary">{{__('View')}}</button></a>
                @endcan
                @can('users-edit')
                    <a href="{{route('admin.users.edit', $user)}}"><button type="button" class="btn btn-warning">{{__('Edit')}}</button></a>
                @endcan
                @can('users-delete')
                    <form style="display: inline" action="{{route('admin.users.destroy', $user)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">{{__('Delete')}}</button>
                    </form>
                @endcan
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

@endsection
