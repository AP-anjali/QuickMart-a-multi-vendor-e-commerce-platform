@extends('seller_dashboard_layout')

@section('style')
<style type="text/css">
    /* #Dashboard{
        border-left : 4px solid #3c748f;
        background: #b1cfde;
        border-radius: 4px;
    }    

    #Dashboard:hover{
        border-left: none;
        background: var(--primary-color);
    } */

    #Dashboard{
        border-left : 6px solid #305d72;
        background: #B7C9E2;
        border-radius: 4px;
    }    

    #Dashboard:hover{
        border-left: none;
        background: var(--primary-color);
    }

    body.dark #Dashboard{
        border-left : 6px solid white;
        background: #18191A;
        border-radius: 4px;
    }

    body.dark #Dashboard:hover{
        border-left: none;
        background: var(--primary-color);
    }
</style>
@endsection

@section('body')
<section class="home">
    @if(isset($seller_session))
        <h1 class="text">Hello, <b>{{ $seller_session->name }}!</b></h1>
    @endif
    <div class="text">Hello From Seller Dashboard</div>
</section>
@endsection