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

    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "poppins", sans-serif;
    }
    body{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        background-color: #f5f5f9;
    }
    .container{
        width: 80%;
        margin: 6% auto;
        /* margin: 9px; */
        position: relative;
        bottom: 40px;
        display: flex;
        height: 623px;
        /* height: 565px; */
        box-shadow: 0 12px 18px rgba(54, 176, 138, 0.005);
        border-radius: 6px;
        background: #FFF;
    }
    .login-link{
        background-color: #696cff;
        /* background-image: url('bg-shapes.svg'); */
        background-position: bottom left;
        background-repeat: no-repeat;
        width: 35%;
        /* width: 400px; */
        padding: 3%;
    }
    .signup-form-container{
        width: 70%;
        max-width: 700px;
        padding: 3% 0;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .logo{
        font-weight: 600;
        color: #FFF;
    }
    .side-big-headning{
        font-weight: 800;
        color: #FFF;
        font-size: 1.6rem;
        margin: 46% 0 5%;
    }
    .primary-bg-text{
        color: #eff0ff;
        font-weight: 500;
        text-align: center;
    }
    a.loginbtn{
        text-decoration: none;
        color: #FFF;
        width: 70%;
        font-weight: 500;
        display: inline-block;
        margin: 7% 15%;
        text-align: center;
        border: 2px solid #eff0ff;
        border-radius: 24px;
        padding: 3% 0;
    }
    a.loginbtn:hover{
        color: #696cff;
        background-color: #FFF;
    }
    .big-headning{
        font-weight: 900;
        font-size: 2rem;
        color: #696cff;
    }
    .social-media-platform{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .social-media-platform a{
        color: #1a1d86;
        text-decoration: none;
        border-radius: 50%;
        display: inline-flex;
        border: 1px solid #e0e3e2;
        margin: 12%;
        padding: 13%;
    }
    .progressanjali-bar{
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 4% 0;
        width: 90%;
    }
    .progressanjali-bar .stage{
        width: 30%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
    .progressanjali-bar .tool-tip{
        color: #1a1d86;
        font-weight: 600;
    }
    .progressanjali-bar .stageno{
        margin: 6% 0;
        padding: 2% 7%;
        border-radius: 50%;
        background-color: #f5f5f9;
        color: #000;
    }

    .button-container{
        display: flex;
        align-items: center;
        margin: 4% 0;
    }

    .text-fields{
        display: flex;
        align-items: center;
        border: 1px solid #ccc;
        padding: 2%;
        margin: 0 2%;
        width: 46%;
        border-radius: 4px;
        color: #84848d;
    }
    input{
        border: none;
        outline: none;
        background: inherit;
        padding-left: 10px;
        color: #84848d;
        /* width: 400%; */
        margin-left: 4%;
        font-size: 1rem;
    }
    .signup-form-content{
        width: 100%;
        padding: 0 3%;
    }
    .text-fields.product_name::after{
        content: 'Product Name';
        background-color: #fff;
        position: relative;
        padding: 0 4%;
        left: -215px;
        color: #696cff;
        top: -28px;
        white-space: nowrap;
    }

    .text-fields.product_brand::after{
        content: 'Product Brand';
        background-color: #fff;
        position: relative;
        padding: 0 4%;
        left: -215px;
        color: #696cff;
        top: -28px;
        white-space: nowrap;
    }

    .text-fields.product_title::after{
        content: 'Product Title';
        background-color: #fff;
        position: relative;
        padding: 0 4%;
        left: -215px;
        color: #696cff;
        top: -28px;
        white-space: nowrap;
    }

    .text-fields.product_description::after{
        content: 'Product Description';
        background-color: #fff;
        position: relative;
        padding: 0 4%;
        left: -215px;
        color: #696cff;
        top: -28px;
        white-space: nowrap;
    }

    .text-fields.product_price::after{
        content: 'Product Price';
        background-color: #fff;
        position: relative;
        padding: 0 4%;
        left: -215px;
        color: #696cff;
        top: -28px;
        white-space: nowrap;
    }

    .text-fields.discount_price::after{
        content: 'Product Discount Price';
        background-color: #fff;
        position: relative;
        padding: 0 4%;
        left: -215px;
        color: #696cff;
        top: -28px;
        white-space: nowrap;
    }

    .text-fields.product_quantity::after{
        content: 'Product Quantity';
        background-color: #fff;
        position: relative;
        padding: 0 4%;
        left: -215px;
        color: #696cff;
        top: -28px;
        white-space: nowrap;
    }
    .text-fields.selected_category_name::after{
        content: 'Product Category';
        background-color: #fff;
        position: relative;
        padding: 0 4%;
        left: -200px;
        color: #696cff;
        top: -28px;
        white-space: nowrap;
    }
    .text-fields.selected_section_name::after{
        content: 'Product Section';
        background-color: #fff;
        position: relative;
        padding: 0 4%;
        left: -180px;
        color: #696cff;
        top: -28px;
        white-space: nowrap;
    }

    .text-fields.product_status::after{
        content: 'Product Status';
        background-color: #fff;
        position: relative;
        padding: 0 4%;
        left: -180px;
        color: #696cff;
        top: -28px;
        white-space: nowrap;
    }

    .text-fields.product_keywords::after{
        content: 'Product Keywords';
        background-color: #fff;
        position: relative;
        padding: 0 4%;
        left: -215px;
        color: #696cff;
        top: -28px;
        white-space: nowrap;
    }

    .text-fields.product_color::after{
        content: 'Product Color';
        background-color: #fff;
        position: relative;
        padding: 0 4%;
        left: -215px;
        color: #696cff;
        top: -28px;
        white-space: nowrap;
    }

    .text-fields.product_size::after{
        content: 'Product Size';
        background-color: #fff;
        position: relative;
        padding: 0 4%;
        left: -215px;
        color: #696cff;
        top: -28px;
        white-space: nowrap;
    }
    .text-fields.product_weight::after{
        content: 'Product Weight';
        background-color: #fff;
        position: relative;
        padding: 0 4%;
        left: -215px;
        color: #696cff;
        top: -28px;
        white-space: nowrap;
    }
 
    #my_list{
        border: none;
        outline: none;
        background: inherit;
        color: #84848d;
        margin-top: 4px;
        padding-left: 10px;
        font-size: 1rem;
    }
    #my_list10{
        border: none;
        outline: none;
        background: inherit;
        color: #84848d;
        margin-top: 4px;
        padding-left: 20px;
        font-size: 1rem;
    }
    .text-fields.business_type select {
        padding-left: 20px; 
    }
    #my_list2{
        border: none;
        outline: none;
        background: inherit;
        color: #84848d;
        margin-top: 4px;
        padding-left: 10px;
        font-size: 1rem;
    }
    .text-fields.business_strength select {
        padding-left: 20px; 
    }
    #my_list3{
        border: none;
        outline: none;
        background: inherit;
        color: #84848d;
        margin-top: 4px;
        font-size: 1rem;
    }
    .text-fields.product_category select {
        padding-left: 20px; 
    }
    #my_list4{
        border: none;
        outline: none;
        background: inherit;
        color: #84848d;
        margin-top: 4px;
        font-size: 1rem;
    }
    .text-fields.account_type select {
        padding-left: 5px; 
    }
    .file_uploader{
        display: flex;
        width: 280px;
        align-items: center;
        margin-left: 14px;
        height: 60px;
        border-radius: 4px;
        border: 1px solid #ccc;
        color: #84848d;
        padding: 2%;
    }

    .file_uploader_heading{
        background-color: #FFF;
        position: relative;
        padding: 0 8px;
        left: -260px;
        color: #696cff;
        top: -28px;
        white-space: nowrap;
    }

    .file_uploader2{
        display: flex;
        width: 280px;
        align-items: center;
        margin-left: -30px;
        height: 60px;
        border-radius: 4px;
        border: 1px solid #ccc;
        color: #84848d;
        padding: 2%;
    }

    .file_uploader_heading2{
        background-color: #FFF;
        position: relative;
        padding: 0 8px;
        left: -260px;
        color: #696cff;
        top: -28px;
        white-space: nowrap;
    }

    #proof_of_bank_account_ownership{
        cursor: pointer;
    }
    .pagination-btns{
        display: flex;
        justify-content: center;
        margin: 3% 0;
        padding: 0 4%;
    }
    .nextpage, .previouspage{
        background-color: #8789ff;
        color: #FFF;
        width: 45%;
        cursor: pointer;
        padding: 2%;
        margin: 20px;
        font-weight: 500;
        font-size: 1rem;
        border-radius: 4px;
        border: none;
        outline: none;
    }
    .nextpage:hover, .previouspage:hover{
        background-color: #696cff;
    }
    .tc-container input{
        width: 10%;
        margin-left: 4%;
        accent-color: #696cff;
    }
    .tc a{
        text-decoration: none;
        color: #696cff;
    }
    .tc a:hover{
        color: #1a1d86;
    }
    label.tc{
        margin-left: 4%;
        white-space: nowrap;
    }
    .khaskao{
        margin-top: 5px;
        margin-bottom: 10px;
        margin-left: 170px;
        width: 290px;
    }
    #product_main_image{
        padding-top: 5px;
    }
    #product_other_images{
        padding-top: 5px;
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

    .change_color{
        background: #ab65f8;
        transition: 0s all ease;
    }

    .change_color:hover{
        background: #2c3e50;
    }

    li span{
        font-weight: 500;
    }

    li a{
        font-weight: 500;
    }

    .submenu ul li a{
        margin-top: 5px;
    }
</style>
@endsection

@section('body')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- <div>Hello From main_admin_dashboard_update_product_page</div><br> -->

            @if(Session()->has('update_product_admin_route_msg'))

                <div class="msg" id="msg1">
                    {{session()->get('update_product_admin_route_msg')}}
                    <button type="button" onclick = "document.getElementById('msg1').style.display = 'none';" id="popup-btn" >X</button>
                </div>

            @endif
            


            <div class="container">
                <div class="login-link" id = "loginLink">
                    <div class="logo">
                        <i class='bx bxs-objects-vertical-bottom'></i>
                        <span class="text">QUICKMART</span>
                    </div>
                    <p class="side-big-headning" style="text-align: center;">Product Updating</p>
                    <p class="primary-bg-text">Update selected Products Attributes<br>With All The Required Informations</p>
                    <a onclick="return confirm('Are you sure to Exit From Product Editing !')" href="{{ route('main_admin_dashboard_show_products_page') }}" class="loginbtn">Exit</a>
                </div>
                <form action="{{ route('admin_update_products_form_submission_route', $product_to_update->id) }}" method = "post" class="signup-form-container" enctype="multipart/form-data">
                    @csrf
                    <p class="big-headning">Edit Uploaded Product</p>
                    <div class="progressanjali-bar">
                        <div class="stage">
                            <p class="tool-tip">Basic Information</p>
                            <p class="stageno stageno-1">1</p>
                        </div>
                        <div class="stage">
                            <p class="tool-tip">Product Attributes</p>
                            <p class="stageno stageno-2">2</p>
                        </div>
                        <div class="stage">
                            <p class="tool-tip">Image selection</p>
                            <p class="stageno stageno-3">3</p>
                        </div>
                        <div class="stage">
                            <p class="tool-tip">submission</p>
                            <p class="stageno stageno-4">4</p>
                        </div>
                    </div>
                    <div class="signup-form-content">
                        <div class="stage1-content">
                            <div class="button-container">
                                <div class="text-fields product_name">
                                    <label for="product_name"><i class='bx bx-user-circle iconanjali' style='color:#6487cb'></i></label>
                                    <input type="text" name="product_name" id="product_name" value = "{{ $product_to_update->product_name }}" required>
                                </div>
                                <div class="text-fields product_brand">
                                    <label for="product_brand"><i class='bx bx-envelope' style='color:#6487cb'></i></label>
                                    <input type="text" name="product_brand" id="product_brand" value = "{{ $product_to_update->product_brand }}" required>
                                </div>
                            </div>
                            <div class="button-container">
                                <div class="text-fields product_title">
                                    <label for="product_title"><i class='bx bx-phone-call' style='color:#6487cb'></i></label>
                                    <input type="text" name="product_title" id="product_title" value = "{{ $product_to_update->product_title }}" required>
                                </div>
                                <div class="text-fields product_description">
                                    <label for="product_description"><i class='bx bxl-periscope' style='color:#6487cb' ></i></label>
                                    <input type="text" name="product_description" id="product_description" value = "{{ $product_to_update->product_description }}" required>
                                </div>
                            </div>
                            <div class="button-container">
                                <div class="text-fields product_price">
                                    <label for="product_price"><i class='bx bx-phone-call' style='color:#6487cb'></i></label>
                                    <input type="number" name="product_price" id="product_price" value = "{{ $product_to_update->product_price }}" required>
                                </div>
                                <div class="text-fields discount_price">
                                    <label for="discount_price"><i class='bx bxl-periscope' style='color:#6487cb' ></i></label>
                                    <input type="number" name="discount_price" id="discount_price" value = "{{ $product_to_update->discount_price }}" required>
                                </div>
                            </div>
                            <div class="pagination-btns">
                                <input type="button" value="Previous" class="previouspage stagebtn1a">
                                <input type="button" value="Next" class="nextpage stagebtn1b" onclick = "stage1to2()">
                            </div>
                        </div>
                        <div class="stage2-content">
                            <div class="button-container">
                                <div class="text-fields product_quantity">
                                    <label for="product_quantity"><i class='bx bx-user-circle iconanjali' style='color:#6487cb'></i></label>
                                    <input type="number" name="product_quantity" min="0" id="product_quantity" value = "{{ $product_to_update->product_quantity }}" required>
                                </div>
                                <div class="text-fields selected_category_name">
                                    <label for="selected_category_name"><i class='bx bx-envelope' style='color:#6487cb'></i></label>
                                    <select name="selected_category_name" id="my_list2" required>
                                        <option value = "{{ $product_to_update->selected_category_name }}" selected>{{ $product_to_update->selected_category_name }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>

                                        @foreach($all_categories as $each_category)
                                            <option value="{{$each_category->catagory_name}}">{{$each_category->catagory_name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="button-container">
                                <div class="text-fields product_keywords">
                                    <label for="product_keywords"><i class='bx bx-phone-call' style='color:#6487cb'></i></label>
                                    <input type="text" name="product_keywords" id="product_keywords" value = "{{ $product_to_update->product_keywords }}" required>
                                </div>
                                <div class="text-fields product_color">
                                    <label for="product_color"><i class='bx bxl-periscope' style='color:#6487cb' ></i></label>
                                    <input type="text" name="product_color" id="product_color" value="{{ $product_to_update->product_color ? $product_to_update->product_color : 'Not specified' }}">
                                </div>
                            </div>
                            <div class="button-container">
                                <div class="text-fields product_size">
                                    <label for="product_size"><i class='bx bx-phone-call' style='color:#6487cb'></i></label>
                                    <input type="text" name="product_size" id="product_size" value="{{ $product_to_update->product_size ? $product_to_update->product_size : 'Not specified' }}">
                                </div>
                                <div class="text-fields product_weight">
                                    <label for="product_weight"><i class='bx bxl-periscope' style='color:#6487cb' ></i></label>
                                    <input type="number" name="product_weight" id="product_weight" value="{{ $product_to_update->product_weight ? $product_to_update->product_weight : '00' }}">
                                </div>
                            </div>
                            <div class="pagination-btns">
                                <input type="button" value="Previous" class="previouspage stagebtn2a" onclick = "stage2to1()">
                                <input type="button" value="Next" class="nextpage stagebtn2b" onclick = "stage2to3()">
                            </div>
                        </div>
                        <div class="stage3-content">
                            <div class="button-container">
                                <div class="text-fields selected_section_name khaskao" style = "width: 290px;">
                                    <label for="selected_section_name"><i class='bx bx-objects-vertical-bottom' style='color:#6487cb'></i></i></label>
                                    <select name="selected_section_name" id="my_list" required>
                                        <option value="{{ $product_to_update->selected_section_name }}" selected>{{ $product_to_update->selected_section_name }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                                        @foreach($all_sections as $each_section)
                                            <option value="{{$each_section->section_name}}">{{$each_section->section_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="button-container">
                                <div class="file_uploader">
                                    <label for="product_main_image"><i  class='bx bxs-folder-open' style='color:#6487cb'></i></label>
                                    <input type="file" name="product_main_image" id="product_main_image">
                                </div>
                                <div class="file_uploader_heading">Main Image</div>

                                <div class="file_uploader2">
                                    <label for="product_other_images"><i  class='bx bxs-folder-open' style='color:#6487cb'></i></label>
                                    <input type="file" name="product_other_images[]" id="product_other_images" multiple>
                                </div>
                                <div class="file_uploader_heading2">Other Images</div>

                            </div>
                            <div class="pagination-btns" style = "margin-top: -20px;">
                                <input type="button" value="Current Main Image" class="previouspage stagebtn3a change_color" id="mainImageBtn">
                                <input type="button" value="Current Other Images" class="nextpage stagebtn3b change_color" id="otherImagesBtn">
                            </div>
                            <div class="pagination-btns" style = "margin-top: -20px;">
                                <input type="button" value="Previous" class="previouspage stagebtn3a" onclick = "stage3to2()">
                                <input type="button" value="Next" class="nextpage stagebtn3b" onclick = "stage3to4()">
                            </div>
                        </div>
                        <div class="stage4-content">
                            <div class="button-container">
                                <div class="text-fields product_status khaskao" style = "width: 290px;">
                                    <label for="product_status"><i class='bx bx-objects-vertical-bottom' style='color:#6487cb'></i></i></label>
                                    <select name="product_status" id="my_list10" required>
                                            <option value="active" selected>active&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                                            <option value="inactive">inactive&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                                    </select>
                                </div>
                            </div>
                            <div class="tc-container">
                                <br>
                                <label for="tc" class="tc">
                                    <input type="checkbox" name="tc" id="tc" required>
                                    By submitting your details, you agree to the <a href="#">terms and conditions</a>
                                </label>
                            </div>
                            <br>
                            <div class="pagination-btns">
                                <input type="button" value="Previous" class="previouspage stagebtn4a" onclick = "stage4to3()">
                                <input type="submit" value="Update" class="nextpage stagebtn4b">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    let signUpContent = document.querySelector(".signup-form-container"),
    stagebtn1b = document.querySelector(".stagebtn1b"),
    stagebtn2a = document.querySelector(".stagebtn2a"),
    stagebtn2b = document.querySelector(".stagebtn2b"),
    stagebtn3a = document.querySelector(".stagebtn3a"),
    stagebtn3b = document.querySelector(".stagebtn3b"),
    previouspage = document.querySelector(".previouspage"),
    signUpContent1 = document.querySelector(".stage1-content"),
    signUpContent2 = document.querySelector(".stage2-content"),
    signUpContent3 = document.querySelector(".stage3-content"),
    signUpContent4 = document.querySelector(".stage4-content");

    signUpContent2.style.display = "none"
    signUpContent3.style.display = "none"
    signUpContent4.style.display = "none"
    previouspage.style.display = "none"

    function validateStage1() {
        var product_name = document.getElementById("product_name").value;
        var product_brand = document.getElementById("product_brand").value;
        var product_title = document.getElementById("product_title").value;
        var product_description = document.getElementById("product_description").value;
        var product_price = document.getElementById("product_price").value;
        var discount_price = document.getElementById("discount_price").value;

        if ((!product_name.trim() || !product_name === "{{ $product_to_update->product_name }}") &&
            (!product_brand.trim() || !product_brand === "{{ $product_to_update->product_brand }}") &&
            (!product_title.trim() || !product_title === "{{ $product_to_update->product_title }}") &&
            (!product_description.trim() || !product_description === "{{ $product_to_update->product_description }}") &&
            (!product_price.trim() || !product_price === "{{ $product_to_update->product_price }}") &&
            (!discount_price.trim() || !discount_price === "{{ $product_to_update->discount_price }}")) {
            alert("Please fill in all required fields in Stage 1");
            return false;
        }

        return true;
    }

    function validateStage2() {
        var product_quantity = document.getElementById("product_quantity").value;
        var selected_category_name = document.getElementById("my_list2").value;
        var product_keywords = document.getElementById("product_keywords").value;
        var product_color = document.getElementById("product_color").value;
        var product_size = document.getElementById("product_size").value;
        var product_weight = document.getElementById("product_weight").value;

        document.getElementById("product_color").value = product_color.trim() !== "" ? product_color : "Not specified";
        document.getElementById("product_size").value = product_size.trim() !== "" ? product_size : "Not specified";
        document.getElementById("product_weight").value = product_weight.trim() !== "" ? product_weight : "Not specified";

        if ((!product_quantity.trim() || !product_quantity === "{{ $product_to_update->product_quantity }}") &&
            (!selected_category_name.trim() || !selected_category_name === "{{ $product_to_update->selected_category_name }}") &&
            (!product_keywords.trim() || !product_keywords === "{{ $product_to_update->product_keywords }}") &&
            (!product_color.trim() || !product_color === "{{ $product_to_update->product_color }}" || product_color === "Not specified") &&
            (!product_size.trim() || !product_size === "{{ $product_to_update->product_size }}" || product_size === "Not specified") &&
            (!product_weight.trim() || !product_weight === "{{ $product_to_update->product_weight }}" || product_weight === "00")) {
            alert("Please fill in all required fields in Stage 2");
            return false;
        }

        return true;
    }

    function validateStage3() {
        var selected_section_name = document.getElementById("my_list").value;

        if ((!selected_section_name.trim() || !selected_section_name === "{{ $product_to_update->selected_section_name }}")) {
            alert("Please fill in all required fields in Stage 3");
            return false;
        }

        return true;
    }


    function stage1to2(){
        if (validateStage1()) {
            signUpContent1.style.display = "none";
            signUpContent3.style.display = "none";
            signUpContent2.style.display = "block";
            signUpContent4.style.display = "none";
            document.querySelector(".stageno-1").innerText = "✔";
            document.querySelector(".stageno-1").style.backgroundColor = "#52ec61";
        }
    }

    function stage2to1(){
        signUpContent1.style.display = "block"
        signUpContent3.style.display = "none"
        signUpContent2.style.display = "none"
        signUpContent4.style.display = "none"
    }

    function stage2to3(){
        if (validateStage2()) {
            signUpContent1.style.display = "none"
            signUpContent3.style.display = "block"
            signUpContent2.style.display = "none"
            signUpContent4.style.display = "none"
            document.querySelector(".stageno-2").innerText = "✔";
            document.querySelector(".stageno-2").style.backgroundColor = "#52ec61";
        }
    }

    function stage3to2(){
        signUpContent1.style.display = "none"
        signUpContent3.style.display = "none"
        signUpContent2.style.display = "block"
        signUpContent4.style.display = "none"
    }

    function stage3to4(){
        if (validateStage3()) {
            signUpContent1.style.display = "none"
            signUpContent3.style.display = "none"
            signUpContent2.style.display = "none"
            signUpContent4.style.display = "block"
            document.querySelector(".stageno-3").innerText = "✔";
            document.querySelector(".stageno-3").style.backgroundColor = "#52ec61";
        }
    }

    function stage4to3(){
        signUpContent1.style.display = "none"
        signUpContent3.style.display = "block"
        signUpContent2.style.display = "none"
        signUpContent4.style.display = "none"
    }

    document.getElementById('mainImageBtn').addEventListener('click', function() {
        var id_for_updatepage_url = {{ $product_to_update->id }}; 
        var productId = {{ $product_to_update->id }}; 
        window.location.href = '/main_admin_dashboard/main_admin_dashboard_update_product_page/' + id_for_updatepage_url + '/show_main_image_to_admin_for_update_product_page/' + productId;
    });

    document.getElementById('otherImagesBtn').addEventListener('click', function() {
        var id_for_updatepage_url = {{ $product_to_update->id }}; 
        var productId = {{ $product_to_update->id }}; 
        window.location.href = '/main_admin_dashboard/main_admin_dashboard_update_product_page/' + id_for_updatepage_url + '/show_other_images_to_admin_for_update_product_page/' + productId;
    });

    document.addEventListener('DOMContentLoaded', function() {
        var textFields = document.querySelectorAll('.text-fields input');

        textFields.forEach(function(input) {
            input.addEventListener('focus', function() {
                this.parentElement.style.borderColor = '#696cff';
            });

            input.addEventListener('blur', function() {
                this.parentElement.style.borderColor = ''; 
            });
        });
    });
</script>
@endsection