@extends('../layouts.app')
@include('../admin.layouts.adminNavbar')
@section('title')
    <h5>{{ __('Dashboard') }}</h5>
@endsection
@section('breadcrumbs')
    {{__('Admincenter')}}
@endsection
@section('content')
    {{__('Dashboard!')}}
@endsection
