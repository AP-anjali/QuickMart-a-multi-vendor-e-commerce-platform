@extends('main_admin_dashboard_layout')

@section('title')
<title>Delivery Team Application Management</title>
@endsection

@section('style')
<style>
    #Users{
        border-left : 6px solid #305d72;
        background: #B7C9E2;
        border-radius: 4px;
    } 

    #Delivery_Team{
        border: 2px solid #3d5ee1;
        border-radius: 8px;
    }

    .displaying_container{
        text-align: center;
        align-items: center;
        justify-content: center;
        display: flex;
        flex-direction: column;
        padding-top: 7%;
    }

    #nothing_to_show_here_img{
        height: 400px;
        border-radius: 20px;
        border: 1px solid rgba(0,0,0,.2);
        box-shadow: 5px 5px 5px rgba(0,0,0,.2);
    }
</style>
@endsection


@section('body')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="displaying_container">
                <img src="{{ asset('img/nothing_to_show_here.png') }}" id="nothing_to_show_here_img" alt="nothing to show here">
            </div>
        </div>
    </div>
@endsection