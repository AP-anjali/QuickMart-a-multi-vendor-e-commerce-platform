@extends('main_seller_dashboard_layout')

@section('title')
<title>Content Management</title>
@endsection

@section('style')
<style>
    #Products{
        border-left : 6px solid #305d72;
        background: #B7C9E2;
        border-radius: 4px;
    } 

    #all_products{
        border: 2px solid #3d5ee1;
        border-radius: 8px;
    }

    .displaying_container{
        text-align: center;
        align-items: center;
        justify-content: center;
        display: flex;
        flex-direction: column;
        padding-top: 30px;
    }

    #nothing_to_show_here_img{
        height: 400px;
        border-radius: 20px;
        border: 1px solid rgba(0,0,0,.2);
        box-shadow: 5px 5px 5px rgba(0,0,0,.2);
    }

    #btn{
        background: #8e44ad;
        border: none;
        color: white;
        height: 44px;
        margin-top: 30px;
        padding: 0 20px;
        border-radius: 0.5rem;
        font-size: 20px;
        cursor: pointer;
        text-align: center;
        transition : 0.1s all ease;
    }

    #btn:hover{
        background: #2C3E50;
    }
</style>
@endsection


@section('body')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- <div>Hello From main_seller_dashboard_nothing_to_show_in_products_record</div><br> -->
            <div class="displaying_container">
                <img src="{{ asset('img/nothing_to_show_here.png') }}" id="nothing_to_show_here_img" alt="nothing to show here">
                <input type="button" onclick="window.location.href = '/main_seller_dashboard/main_seller_dashboard_add_new_product_page'" value="Click Here To Add New Record" id="btn">
            </div>
        </div>
    </div>
@endsection