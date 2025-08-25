@extends('seller_dashboard_layout')

@section('style')
<style type="text/css">
    #about-us{
        border-left : 6px solid #305d72;
        background: #B7C9E2;
        border-radius: 4px;
    }    

    #about-us:hover{
        border-left: none;
        background: var(--primary-color);
    }

    body.dark #about-us{
        border-left : 6px solid white;
        background: #18191A;
        border-radius: 4px;
    }

    body.dark #about-us:hover{
        border-left: none;
        background: var(--primary-color);
    }
</style>
@endsection

@section('body')
<section class="home">
        <div class="text">Hello From seller_about_us_page</div>
</section>
@endsection