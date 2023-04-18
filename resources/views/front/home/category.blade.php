@extends('layouts.front')
@section('content')
<section class="py-1 text-center container">
    <div class="col-lg-4 col-md-8 mx-auto mt-1 fixed-top py-2">
        @if(Session::has('ok'))
        <h6 class=" alert alert-success alert-dismissible fade show border border-dark border-2" role="alert">{{Session::get('ok')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </h6>
        @endif
    </div>
</section>

<a href="#" class="text-decoration-none" style="color:black;">
    <div class="up sticky-bottom">
        <i class="bi bi-chevron-up"></i>
    </div>
</a>
<section class="py-1 text-center container shadow_new">
    <a class="navbar-brand" href="{{ url('/') }}">
        <h1 class="m-5">Back to Restaurants offers</h1>
        {{-- <button type="submit" class="btn btn-ligt" style="width:auto;">
            <h1 class="m-5">Back to Restaurants </h1>
        </button> --}}
        <hr class="border border-second border-0 opacity-75">
    </a>
</section>
<section class="container shadow_new">
    <h3 class=" mb-4 text-start"><i>Restaurants offer {{$category}} to you</i></h3>
    <hr class="border border-second border-1 opacity-75">
</section>

{{-- @include('front.home.common.category') --}}

<div class="page">
    <div class="container ">
        {{-- CIA keiciam steilpeliu skaiciu  --}}
        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-3 g-3">
            @forelse($foods as $food)
            <div id="{{ $food['id'] }}" class="col d-flex justify-content-md-between">
                <div class="card g-0 shadow p-2 bg-body-tertiary rounded">
                    <img src="{{asset($food->photo)}}" class="img-fluid rounded shadow bg-body-tertiary " alt=" hotel">

                    <div class=" card-body ">
                        <a class="list-group-item list-group-item-action " href="{{route('list-restaurant',$food->foodReataurants_name->id)}}">
                            <h6>Restaurant: <b style="font-size:17px;"><i>
                                        {{$food->foodReataurants_name->title}}</b></i></h6>
                        </a>
                        <h6>City: <b><i>{{$food->foodCities_no->title}}</i></b></h6>
                        <h6>Category: <b><i>{{$food->foodCategory_no->title}}</i></b></h6>
                        {{-- <h6>City: <b><i>{{$food->foodReataurants_name->city}}</i></b></h6> --}}
                        <h6>Addres: <b><i>{{$food->foodReataurants_name->addres}}</i></b></h6>
                        <h6>Open: <b><i>{{$food->foodReataurants_name->open}}</i></b></h6>
                        <h6>Close: <b><i>{{$food->foodReataurants_name->close}}</i></b></h6>
                        <hr class="border border-second border-2 opacity-50">
                        <h4><b><i>{{$food->title}}</b></i></h4>
                        <span class="text-muted">{{$food->add}}</span>
                        <h4 @if($food->price<20) style="color:crimson;" @endif>Price: <b><i>{{$food->price}} &euro;</b></i></h4>
                        <hr class="border border-second border-2 opacity-50">
                        {{-- <form action="{{route('update-rate')}}" method="post"> --}}
                        <div class="gap-3 align-items-center d-flex justify-content-center">
                            Rating:<b><i>{{$food->rating}}</i></b>
                            {{-- Rate:
                            <input type="hidden" name="product" value="{{$food->id}}">
                            <input type="hidden" name="user_name" value="{{$name}}">
                            <input type="number" min="1" max="5" name="rated" value="" placeholder="1 - 5" class="form-control imputnumber"> --}}
                            {{-- <div class="btn-group">
                                <button type="submit" class="btn btn-outline-secondary">RATE</button>
                            </div> --}}
                        </div>
                        {{-- @csrf --}}
                        {{-- </form> --}}
                        {{-- <hr class="border border-second border-2 opacity-50"> --}}
                        <form action="{{route('update-reviews')}}" method="get">
                            <div class="gap-3 align-items-center d-flex justify-content-center mt-3">
                                <input type="hidden" name="product" value="{{$food->id}}">
                                {{-- <input type="hidden" name="count" value="{{$food->counts}}"> --}}
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-outline-secondary" style="width:200px;">Rating & Reviews</button>
                                </div>
                            </div>
                            @csrf
                        </form>

                        <hr class="border border-second border-2 opacity-50">
                        <form action="{{route('add-basket')}}" method="post">
                            <div class="col-md-12 gap-3 align-items-center d-flex justify-content-center">
                                <div class="col-md-2">
                                    Qty:
                                </div>
                                <div class="col-md-2">
                                    <input type="number" class="form-control" name="count" value="1" min="1">
                                    <input type="hidden" name="id" value="{{$food->id}}">
                                </div>
                                <div class="col-md-1 ">
                                    <div class="form-contro">
                                        <button type="submit" class="btn btn-dark">
                                            <i class="bi bi-cart-check-fill"></i>
                                        </button>
                                    </div>
                                </div>
                                @csrf
                        </form>
                    </div>
                    <div class=" col-md-12 d-flex">
                        <div class="col-md-4">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-xxl-12 col-xl-12 col-lg-12">
            <div class="card shadow bg-body-tertiary rounded d-flex ">
                <div class="card-header justify-content-md-between align-items-center">
                    <h1>Oops! No match found. Try again</h1>
                </div>
                <div class="card-header justify-content-md-between align-items-center">
                    <a href="{{route('start')}}" class="btn btn-secondary">BACK</a>
                </div>
            </div>
        </div>
        @endforelse
    </div>
    <div class="mt-4">
        @if($perPageShow!='All')
        {{$foods->links()}}
        @endif
    </div>
</div>
<hr class="border border-second border-0 opacity-50 m-1">

@endsection