@extends('main_admin_dashboard_layout')

@section('title')
<title>Administration Dashboard</title>
@endsection

@section('style')
<style>
    #Dashboard{
        border-left : 6px solid #305d72;
        background: #B7C9E2;
        border-radius: 4px;
    } 
</style>
@endsection


@section('body')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div>Hello From Main Admin Dashboard</div><br>
            @if(isset($admin_session))
                <h3 class="text">Hello, <b>{{ $admin_session->username }}!</b>, You have the Administration Power...</h3>
            @endif
        </div>
    </div>
@endsection