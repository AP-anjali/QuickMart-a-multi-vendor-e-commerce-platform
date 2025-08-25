@extends('main_seller_dashboard_layout')

@section('title')
<title>Product Management</title>
@endsection

@section('style')
<style>
    #Products{
        border-left : 6px solid #305d72;
        background: #B7C9E2;
        border-radius: 4px;
    } 

    #Update_product{
        border: 2px solid #3d5ee1;
        border-radius: 8px;
    }

    #main-heading{
        color: #2C3E50;
        padding-bottom: 20px;
    }
    .center{
        text-align: center;
        padding-top: 70px;
        align-items: center;
        justify-content: center;
    }
    .form_container{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    #form{
        border: 2px solid rgba(0,0,0,.2);
        box-shadow: 5px 5px 5px rgba(0,0,0,.2);
        padding : 0 80px;
        margin-bottom: 50px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    #text{
        margin-top: 40px;
        height: 50px;
        width: 400px;
        border: 1px solid rgba(0,0,0,.2);
        border-radius: 6px;
        padding: 25px;
        box-shadow: 5px 5px 5px rgba(0,0,0,.2);
        transition: 0.3s all ease;
    }
    #text:focus{
        border: 1px solid #616161;
        box-shadow: 3px 3px 3px #616161;
    }

    #btn{
        background: #8e44ad;
        border: none;
        color: white;
        height: 44px;
        width: 177.97px;
        margin-bottom: 40px;

        border-radius: 0.5rem;
        font-size: 20px;
        cursor: pointer;
        text-align: center;
        transition : 0.1s all ease;
    }

    #btn:hover{
        background: #2C3E50;
    }
    .page-wrapper{
        /* overflow-x: auto; */
        overflow: auto;
    }

    ::-webkit-scrollbar {
        width: 9px;
        height: 10px;
    }

    ::-webkit-scrollbar-thumb {
        background-color: #929292;
        border-radius: 10px;
    }

    ::-webkit-scrollbar-track {
        background: #B7C9E2;
    }

    ::-webkit-scrollbar-thumb:hover {
        background-color: #454545;
    }
</style>
@endsection


@section('body')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- <div>Hello From show_main_image_for_update_product_page</div><br> -->
            <div class="center">
                <h2 id="main-heading">Your Product's Current Main Image</h2>

                <div class="form_container">
                    <div id="form">
                        <img src="{{ asset('storage/' . $product_to_show_main_image->product_main_image) }}" alt="main image of product to show for product editing" style="max-width: 205px; max-height: 246px; margin-top: 20px;">
                        <input type="button" value="Go Back" id="btn" style="margin-top: 60px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    document.getElementById('btn').addEventListener('click', function() {
        history.back();
    });
</script>
@endsection