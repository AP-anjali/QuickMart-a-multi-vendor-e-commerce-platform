@extends('main_seller_dashboard_layout')

@section('title')
<title>Seller Dashboard</title>
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
            <div>Hello From Main Seller Dashboard</div><br>
            @if(isset($seller_session))
                <h3 class="text">Hello, <b>{{ $seller_session->name }}!</b>, You have the Seller Power...</h3>
            @endif
        </div>
    </div>
@endsection