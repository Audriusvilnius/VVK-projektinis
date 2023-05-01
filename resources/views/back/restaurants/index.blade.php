@extends('layouts.app')
@section('content')
<section class="py-1 text-center container">
    <div class="col-lg-4 col-md-8 mx-auto mt-1 fixed-top py-2">
        @if(Session::has('ok'))
        <h6 class=" alert alert-success alert-dismissible fade show border border-dark border-2" role="alert">{{Session::get('ok')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></h6>
        @endif
        @if(Session::has('not'))
        <h6 class=" alert alert-danger alert-dismissible fade show" role="alert">{{Session::get('not')}}
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
<div class="container mb-5" style="min-height: 100vh;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header justify-content-between align-content-between d-flex ">
                    <h1>All Restourants</h1>
                    <a href="{{route('restaurants-create')}}" class="btn btn-light "><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">

                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                        </svg></a>
                </div>
            </div>

            @forelse($restaurants as $restaurant)
            <div id="{{ $restaurant['id'] }}" class="card mt-2" style="max-width: 1wm;">
                <div class="row g-0 shadow p-3 bg-body-tertiary rounded">
                    <div class="col-md-4">
                        <img src="{{asset($restaurant->photo)}}" class="img-fluid rounded" alt="imageset">
                    </div>
                    {{-- sekciaj padalinta i dvus pradzia--}}
                    <div class="col-md-4">
                        <div class="card-body ms-2">
                            <h6>Restaurant: <b><i>{{$restaurant->title}}</i></b></h6>
                            <h6>City: <b><i>{{$restaurant->city}}</i></b></h6>
                            <h6>Addres: <b><i>{{$restaurant->addres}}</i></b></h6>
                            <div class="col-md-12 d-flex">
                                <div class="col-md-3">
                                    <h6>Open: <b><i>{{$restaurant->open}}</i></b></h6>
                                </div>
                                <div class="col-md-3">
                                    <h6>Close: <b><i>{{$restaurant->close}}</i></b></h6>
                                </div>
                            </div>
                            <h6>Dish qty.: <b><i>{{$restaurant->food_Restaurant()->count()}}</i></b></h6>
                            <h6 class="card-title text-muted">Phone:</h6>
                            <p class="card-text"><small class="text-muted">{{$restaurant->phone}}</small></p>
                        </div>
                    </div>
                    {{-- sekciaj padalinta i dvus pabaiga--}}
                    <div class="col-md-4">
                        <div class="card-body">
                            <h6 class="card-title">Description:</h6>
                            <textarea class="form-control" placeholder="{{$restaurant->des}}" rows="5" cols="auto"></textarea>

                            <div class="list-table__buttons gap-3 mt-3">
                                <a href="{{route('restaurants-edit', $restaurant)}}" class="btn btn-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg></a>
                                <form action="{{route('restaurants-delete', $restaurant)}}" method="post">
                                    <button type="submit" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                        </svg></button>
                                    @csrf
                                    @method('delete')
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <h2 class="list-group-item">No types yet</h2>
            @endforelse
        </div>
    </div>
</div>
@endsection
