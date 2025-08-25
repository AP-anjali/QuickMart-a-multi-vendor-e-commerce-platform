@extends('main_admin_dashboard_layout')

@section('title')
<title>Administration Dashboard</title>
@endsection

@section('style')
<style>
    #Users{
        /* width: 220px; */
        border-left : 6px solid #305d72;
        background: #B7C9E2;
        border-radius: 4px;
    } 

    #Sellers{
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
        padding: 0 30px;
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
    #cat_table td:nth-child(21),
    #cat_table td:nth-child(22),
    #cat_table td:nth-child(23),
    #cat_table td:nth-child(24),
    #cat_table td:nth-child(25),
    #cat_table td:nth-child(26),
    #cat_table td:nth-child(27),
    #cat_table td:nth-child(28),
    #cat_table td:nth-child(29)
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
        background: #7dd181;
    }

    #document_btn{
        text-decoration: none;
        background: #F7F7FA; 
        color: #454545;
        font-weight: 500;
        border: 1px solid rgba(0,0,0,.2); 
        padding: 1.5% 16%;
        border-radius: 8px; 
        transition : 0s all ease;
    }

    #document_btn:hover{
        color: black;
        border: 1px solid black; 
        font-weight: 500;
        background: #ADD8E6;
    }

    #alert_btn{
        text-decoration: none;
        background: #F7F7FA; 
        color: #454545;
        font-weight: 500;
        border: 1px solid rgba(0,0,0,.2); 
        padding: 3% 16%;
        border-radius: 8px; 
        transition : 0s all ease;
    }

    #alert_btn:hover{
        color: black;
        border: 1px solid black; 
        font-weight: 500;
        background: #c595fa;
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
            <!-- <div>Hello From main_admin_dashboard_show_sellers_page</div><br> -->

            @if(Session()->has('message'))

                <div class="msg" id="msg1">
                    {{session()->get('message')}}
                    <button type="button" onclick = "document.getElementById('msg1').style.display = 'none';" id="popup-btn" >X</button>
                </div>

            @endif

            @if(count($all_sellers) > 0)
            <div class="center">
                <h2 id="main-heading">All Seller Users</h2>

                <div class="table_container">
                    <table id="cat_table">
                        <tr id="header_row">
                            <td>SR No.</td>
                            <td>Seller Name</td>
                            <td>Seller ID</td>
                            <td>User Type</td>
                            <td>Seller Email</td>
                            <td>Seller Phone No.</td>
                            <td>Seller Address</td>
                            <td>Seller Registered Date</td>
                            <td>Seller Username</td>
                            <td>Seller Password</td>
                            <td>Seller Business Name</td>
                            <td>Seller Business Type</td>
                            <td>Seller Business Strength</td>
                            <td>Seller Product Category</td>
                            <td>Seller GST number</td>
                            <td>Seller Business Description </td>
                            <td>Seller Bank Name</td>
                            <td>Seller Bank Branch Name</td>
                            <td>Seller Bank Account IFSC Code</td>
                            <td>Seller Bank Account MICR Code</td>
                            <td>Seller Bank Account Holder Name</td>
                            <td>Seller Bank Account Number</td>
                            <td>Seller Bank Account Type</td>
                            <td>Seller Proof of Bank Account Ownership</td>
                            <td>Record Created at</td>
                            <td>Record Updated at</td>
                            <td>To Edit Seller Record</td>
                            <td>To Alert to Seller</td>
                            <td>To Delete Seller Record</td>
                        </tr>

                        @php
                            $srNo = 1; 
                        @endphp

                        @foreach($all_sellers as $each_seller)
                            <tr id="all_rows">
                                <td>{{ $srNo++ }}</td>  
                                <td>{{ $each_seller->name }}</td>
                                <td>{{ $each_seller->id }}</td>
                                <td>{{ $each_seller->user_type }}</td>
                                <td>{{ $each_seller->email }}</td>
                                <td>{{ $each_seller->phone_no }}</td>
                                <td>{{ $each_seller->address }}</td>
                                <td>{{ $each_seller->registration_date }}</td>
                                <td>{{ $each_seller->username }}</td>
                                <td>{{ $each_seller->confirm_password }}</td>
                                <td>{{ $each_seller->business_name }}</td>
                                <td>{{ $each_seller->business_type }}</td>
                                <td>{{ $each_seller->business_strength }}</td>
                                <td>{{ $each_seller->product_category }}</td>
                                <td>{{ $each_seller->gst_number }}</td>
                                <td>{{ $each_seller->business_description }}</td>
                                <td>{{ $each_seller->bank_name }}</td>
                                <td>{{ $each_seller->bank_branch }}</td>
                                <td>{{ $each_seller->bank_ifsc_code }}</td>
                                <td>{{ $each_seller->bank_micr_code }}</td>
                                <td>{{ $each_seller->account_holder_name }}</td>
                                <td>{{ $each_seller->account_number }}</td>
                                <td>{{ $each_seller->account_type }}</td>

                                <td>
                                    <a href="{{ route('document_viewer', ['id' => $each_seller->id]) }}" target="_blank" id="document_btn">Click For Document</a>
                                </td>

                                <td>{{ $each_seller->created_at }}</td>
                                <td>{{ $each_seller->updated_at }}</td>
                                <td><a onclick="return confirm('Are you sure to Update selected Seller Record !')" href="{{ route('main_admin_dashboard_page_for_updating_seller_record_from_admin', $each_seller->id) }}" id="edit_btn">Edit</a></td>
                                <td><a href="#" id="alert_btn">Alert</a></td>
                                <td><a onclick="return confirm('Are you sure to Delete selected Seller Record !')" href="{{ route('deleting_seller_record_from_admin', $each_seller->id) }}" id="delete_btn">Delete</a></td> 
                            </tr>
                        @endforeach

                    </table>
                </div>
            </div>
            @else
                <script>
                    window.location.href = '{{ route('main_admin_dashboard_nothing_to_show_in_selles_record') }}';
                </script>
            @endif
        </div>
    </div>
@endsection