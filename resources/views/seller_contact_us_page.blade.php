@extends('seller_dashboard_layout')

@section('style')
<style type="text/css">
    #contact-us{
        border-left : 6px solid #305d72;
        background: #B7C9E2;
        border-radius: 4px;
    }    

    #contact-us:hover{
        border-left: none;
        background: var(--primary-color);
    }

    body.dark #contact-us{
        border-left : 6px solid white;
        background: #18191A;
        border-radius: 4px;
    }

    body.dark #contact-us:hover{
        border-left: none;
        background: var(--primary-color);
    }
</style>
@endsection

@section('body')
<section class="home">
        <div class="text">Hello From seller_contact_us_page</div>
</section>
@endsection