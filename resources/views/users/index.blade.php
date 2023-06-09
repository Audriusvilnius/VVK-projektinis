@extends('layouts.app')
@section('content')
<div class="container pt-5" style="min-height: 100vh;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-between mb-2">
                    <div class="pull-left">
                        <h2>{{__('Users Management')}}</h2>
                    </div>
                    @if(Auth::user()->role == 'admin')
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('users.create') }}"> {{__('Create New User')}}</a>
                    </div>
                    @endif
                </div>
            </div>

            <section id="alert" class="text-center m-2 conteiner">
                <div class="col-lg-12 mx-auto d-flex justify-content-center align-content-center">
                    @if(Session::has('ok'))
                    <h6 class="alert alert-success alert-dismissible fade show border border-dark border-2 message" role="alert">{{Session::get('ok')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></h6>
                    @endif
                    @if(Session::has('not'))
                    <h6 class="alert alert-danger alert-dismissible text-dark fade show border border-dark border-2 message" role="alert">{{Session::get('not')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></h6>
                    @endif
                </div>
            </section>

            <table class="table table-bordered bg-body">
                <tr>
                    <th>{{__('User ID')}}</th>
                    <th>{{__('Name')}}</th>
                    <th>{{__('Email')}}</th>
                    <th>{{__('City')}}</th>
                    <th>{{__('Street')}}</th>
                    <th>{{__('Build')}}</th>
                    <th>{{__('Postcode')}}</th>
                    <th>{{__('Phone')}}</th>
                    @if(Auth::user()->role != 'customer')
                    <th>{{__('Restaurant')}}</th>
                    <th>{{__('Role')}}</th>
                    @endif
                    <th>{{__('Action')}}</th>
                </tr>
                @foreach ($data as $key => $user)
                <tr>
                    <td>{{ $user->id  }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if(!empty($user->user_City->title))
                        {{ $user->user_City->title }}
                        @else <span class="badge rounded-pill bg-info fw-lighter text-capitalize fs-6">{{__('None')}}<span>
                                @endif
                    </td>
                    <td>{{ $user->street}}</td>
                    <td>{{ $user->build}}</td>
                    <td>{{ $user->postcode}}</td>
                    <td>{{ $user->phone}}</td>
                    @if(Auth::user()->role != 'customer')

                    <td>
                        @if(!empty($user->user_Restaurants->title))
                        {{ $user->user_Restaurants->title }}
                        @else <span class="badge rounded-pill bg-info bg-primary fw-lighter text-capitalize fs-6">{{__('None')}}<span>
                                @endif
                    </td>
                    <td>
                        @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                        <span class="badge rounded-pill bg-dark text-capitalize fs-6">{{ $v }}</span>
                        @endforeach
                        @endif
                    </td>
                    @endif

                    <td class="d-flex justify-content-end">

                        @if($user->id != '1')
                        {{-- <a class="btn btn-info me-1" href="{{ route('users.show',$user->id) }}">{{__('Show')}}</a> --}}
                        <a class="btn btn-primary me-1" href="{{ route('users.edit',$user->id) }}">{{__('Edit')}}</a>
                        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                        @if (app()->getLocale() == "lt")
                        {!! Form::submit('Ištrinti', ['class' => 'btn btn-danger']) !!}
                        @else
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        @endif
                        {!! Form::close() !!}
                        @endif
                    </td>
                </tr>
                @endforeach
            </table>
            <div class="m-4">
                {!! $data->render() !!}
            </div>
        </div>
    </div>
</div>
@endsection
