@extends('admin_dashboard_layout')

@section('title')
<title>Admin Dashboard</title>
@endsection

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
    @if(isset($admin_session))
        <h1 class="text">Hello, <b>{{ $admin_session->username }}!</b>, You have the Administration Power...</h1>
    @endif
    <div class="text">Hello From Admin Dashboard</div>
</section>
@endsection