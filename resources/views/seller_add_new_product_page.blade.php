@extends('seller_dashboard_layout')

@section('style')
<style type="text/css">
    #add-new-product{
        border-left : 6px solid #305d72;
        background: #B7C9E2;
        border-radius: 4px;
    }    

    #add-new-product:hover{
        border-left: none;
        background: var(--primary-color);
    }

    body.dark #add-new-product{
        border-left : 6px solid white;
        background: #18191A;
        border-radius: 4px;
    }

    body.dark #add-new-product:hover{
        border-left: none;
        background: var(--primary-color);
    }
</style>
@endsection

@section('body')
<section class="home">
        <div class="text">Hello From seller_add_new_product_page</div>
</section>
@endsection