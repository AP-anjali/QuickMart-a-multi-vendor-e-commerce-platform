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

    #all_products{
        border: 2px solid #3d5ee1;
        border-radius: 8px;
    }

    #main-heading{
        color: #2C3E50;
        padding-bottom: 40px;
    }
    .center{
        text-align: center;
        padding-top: 70px;
        align-items: center;
        justify-content: center;
    }
    .table_container{
        margin-bottom: 100px;
    }

    #cat_table{
        margin: auto;
        width: 90%;
        text-align: center;
        border-collapse: collapse; 
        border: 3px solid #454545;
        box-shadow: 5px 5px 5px #929292;
    }

    #cat_table td {
        padding: 10px; 
        border: 1px solid #454545;
    }

    #cat_table td:nth-child(1),
    #cat_table td:nth-child(2),
    #cat_table td:nth-child(3),
    #cat_table td:nth-child(4),
    #cat_table td:nth-child(5),
    #cat_table td:nth-child(6),
    #cat_table td:nth-child(7),
    #cat_table td:nth-child(8),
    #cat_table td:nth-child(9),
    #cat_table td:nth-child(10),
    #cat_table td:nth-child(11),
    #cat_table td:nth-child(12),
    #cat_table td:nth-child(13),
    #cat_table td:nth-child(14),
    #cat_table td:nth-child(15),
    #cat_table td:nth-child(16),
    #cat_table td:nth-child(17),
    #cat_table td:nth-child(18),
    #cat_table td:nth-child(19),
    #cat_table td:nth-child(20),
    #cat_table td:nth-child(21)
    {
        width: 100%; 
        white-space: nowrap;
    }

    #edit_btn{
        text-decoration: none;
        background: #F7F7FA; 
        color: #454545;
        font-weight: 500;
        border: 1px solid rgba(0,0,0,.2); 
        padding: 3% 16%;
        border-radius: 8px; 
        transition : 0s all ease;
    }

    #edit_btn:hover{
        color: black;
        border: 1px solid black; 
        font-weight: 500;
        background: #90EE90;
    }

    #delete_btn{
        text-decoration: none;
        font-weight: 500;
        background: #F7F7FA; 
        color: #454545;
        border: 1px solid rgba(0,0,0,.2); 
        padding: 3% 16%;
        border-radius: 8px; 
        transition : 0s all ease;
    }

    #delete_btn:hover{
        color: black;
        border: 1px solid black; 
        font-weight: 500;
        background: #FF7F7F;
    }

    #header_row{
        font-size: 16px; 
        font-weight: 500; 
        background: #929292; 
        color: black;
    }

    #header_row td{
        border: 3px solid #454545; 
    }

    #all_rows{
        background: #e4e4e4;
    }

    .msg{
        width: 50%;
        height: 50px;
        color: green;
        font-size: 20px;
        border-radius: 6px;
        padding: 8px 0 0 25px;
        background: white;
        border: 1px solid rgba(0,0,0,.2);
        box-shadow: 5px 5px 5px rgba(0,0,0,.2);
        margin-top: 20px;
        margin-left: 20px;
        align-items: center;
        justify-content: center;
    }

    #popup-btn{
        height: 80%;
        margin-bottom: 8px;
        width: 30px;
        padding-bottom: 4px;
        border: 1px solid rgba(0,0,0,.2);
        border-radius: 6px;
        background: rgba(0,0,0,.2);
        margin-left: 33%;
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
            <!-- <div>Hello From main_seller_dashboard_show_all_products_page</div><br> -->

            @if(session('alert'))
                <script>
                    alert("{{ session('alert') }}");
                </script>
            @endif

            @if(Session()->has('delete_product_route_msg'))

                <div class="msg" id="msg1">
                    {{session()->get('delete_product_route_msg')}}
                    <button type="button" onclick = "document.getElementById('msg1').style.display = 'none';" id="popup-btn" >X</button>
                </div>

            @endif
           
            @if(count($particular_seller_all_products) > 0)
                <div class="center">
                    <h2 id="main-heading">All Products You Added</h2>

                    <div class="table_container">
                        <table id="cat_table">
                            <tr id="header_row">
                                <td>SR No.</td>
                                <td>Product Name</td>
                                <td>Product Brand</td>
                                <td>Product Title</td>
                                <td>Product Description</td>
                                <td>Product Price</td>
                                <td>Product Discount Price</td>
                                <td>Product Quantity</td>
                                <td>Product Category</td>
                                <td>Product Keywords</td>
                                <td>Product Color</td>
                                <td>Product Size</td>
                                <td>Product weight</td>
                                <td>Product Status</td>
                                <td>Product Section</td>
                                <td>Product Main image</td>
                                <td>Product Other images</td>
                                <td>Product Uploaded At</td>
                                <td>Product Updated At</td>
                                <td>To Edit Category</td>
                                <td>To Delete Category</td>
                            </tr>

                            @php
                                $srNo = 1; 
                            @endphp

                            @foreach($particular_seller_all_products as $each_product)
                                <tr id="all_rows">
                                    <td>{{ $srNo++ }}</td>
                                    <td>{{$each_product->product_name}}</td>
                                    <td>{{$each_product->product_brand}}</td>
                                    <td>{{$each_product->product_title}}</td>
                                    <td>{{$each_product->product_description}}</td>
                                    <td>{{$each_product->product_price}}</td>
                                    <td>{{$each_product->discount_price}}</td>
                                    <td>{{$each_product->product_quantity}}</td>
                                    <td>{{$each_product->selected_category_name}}</td>
                                    <td>{{$each_product->product_keywords}}</td>
                                    <td>
                                        @if($each_product->product_color)
                                            {{$each_product->product_color}}
                                        @else
                                            No color specified
                                        @endif
                                    </td>
                                    <td>
                                        @if($each_product->product_size)
                                            {{$each_product->product_size}}
                                        @else
                                            No size specified
                                        @endif
                                    </td>
                                    <td>
                                        @if($each_product->product_weight)
                                            {{$each_product->product_weight}}
                                        @else
                                            No weight specified
                                        @endif
                                    </td>
                                    <td>{{$each_product->product_status}}</td>
                                    <td>{{$each_product->selected_section_name}}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $each_product->product_main_image) }}" alt="Main Image" style="max-width: 205px; max-height: 246px;">
                                    </td>
                                    <td>
                                        @if(is_array($each_product->product_other_images) && count($each_product->product_other_images) > 0)
                                            @foreach($each_product->product_other_images as $other_image)
                                                <img src="{{ asset('storage/' . $other_image) }}" alt="Other Image" style="max-width: 200px; max-height: 150px; margin: 0 20px;">
                                            @endforeach
                                        @else
                                            No other images
                                        @endif
                                    </td>
                                    <td>{{ $each_product->created_at }}</td>
                                    <td>{{ $each_product->updated_at  }}</td>
                                    <td><a onclick="return confirm('Are you sure to Edit selected product !')" href="{{ url('/main_seller_dashboard/main_seller_dashboard_update_product_page', $each_product->id) }}" id="edit_btn">Edit</a></td>
                                    <td><a onclick="return confirm('Are you sure to Delete selected product !')" href="{{ url('delete_product_from_seller', $each_product->id) }}" id="delete_btn">Delete</a></td> 
                                </tr>
                            @endforeach

                        </table>
                    </div>
                </div>
            @else
                <script>
                    window.location.href = '{{ route('main_seller_dashboard_nothing_to_show_in_products_record') }}';
                </script>
            @endif
        </div>
    </div>
@endsection