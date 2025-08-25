@extends('main_admin_dashboard_layout')

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
        justify-content: center;
        flex-wrap: nowrap; /* Prevent images from wrapping to the next line */
        justify-content: space-between; 
        border: 2px solid rgba(0,0,0,.2);
        box-shadow: 5px 5px 5px rgba(0,0,0,.2);
        padding : 0 80px;
        width: 100%;
        margin-bottom: 50px;
        align-items: center;

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
            <!-- <div>Hello From show_other_images_to_admin_for_update_product_page</div><br> -->
            <div class="center">
                <h2 id="main-heading">Product's Current Other Images</h2>

                <div class="form_container">
                    <div id="form">
                        @if(is_array($product_to_show_other_images->product_other_images) && count($product_to_show_other_images->product_other_images) > 0)
                            @foreach($product_to_show_other_images->product_other_images as $other_image)
                                <img src="{{ asset('storage/' . $other_image) }}" alt="Other Image" style="max-width: 300px; max-height: 250px; margin: 10px 20px;">
                            @endforeach
                        @else
                            No other images
                        @endif
                        <br>
                        <input type="button" value="Go Back" id="btn" style="margin-top: 30px;">
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