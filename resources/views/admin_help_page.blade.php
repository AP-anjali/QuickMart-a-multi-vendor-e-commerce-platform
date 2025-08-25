@extends('admin_dashboard_layout')

@section('style')
<style type="text/css">
    #Help{
        border-left : 6px solid #305d72;
        background: #B7C9E2;
        border-radius: 4px;
    }    

    #Help:hover{
        border-left: none;
        background: var(--primary-color);
    }

    body.dark #Help{
        border-left : 6px solid white;
        background: #18191A;
        border-radius: 4px;
    }

    body.dark #Help:hover{
        border-left: none;
        background: var(--primary-color);
    }
</style>
@endsection

@section('body')
<section class="home">
        <div class="text">Hello From admin_help_page</div>
</section>
@endsection