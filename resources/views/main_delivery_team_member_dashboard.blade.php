@extends('main_delivery_team_member_dashboard_layout')

@section('title')
<title>Delivery Team Member Dashboard</title>
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
            <div>Hello From Main Delivery Team Member Dashboard</div><br>
            @if(isset($delivery_team_member_session))
                <h3 class="text">Hello, <b>{{ $delivery_team_member_session->name }}!</b>, You have the Delivery Team Member Power...</h3>
            @endif
        </div>
    </div>
@endsection