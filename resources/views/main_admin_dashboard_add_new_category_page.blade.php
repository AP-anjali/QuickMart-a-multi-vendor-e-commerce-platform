@extends('main_admin_dashboard_layout')

@section('title')
<title>Administration Dashboard</title>
@endsection

@section('style')
<style>
    #Categories{
        border-left : 6px solid #305d72;
        background: #B7C9E2;
        border-radius: 4px;
    } 
    #Add_New_Category{
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
</style>
@endsection

@section('body')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- <div>Hello From main_admin_dashboard_add_new_category_page</div><br> -->

            @if(Session()->has('message'))

                <div class="msg" id="msg1">
                    {{session()->get('message')}}
                    <button type="button" onclick = "document.getElementById('msg1').style.display = 'none';" id="popup-btn" >X</button>
                </div>

            @endif

            <div class="center">
                <h2 id="main-heading">Add New Product Category</h2>

                <div class="form_container">
                    <form action="{{ route('adding_new_catagory') }}" method="POST" id="form">
                        @csrf
                        <input type="text" name="catagory_name" placeholder = "Enter Product Category name..." id="text"><br><br>
                        <input type="submit" value="Add" id="btn">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection