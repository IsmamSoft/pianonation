@extends('admin.master')

@section('content')
@foreach ($showroom as $show)

	<main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3"><strong>Edit Showroom</strong> </h1>
            <div class="row">
            <div class="col-md-12">
            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong> {{ session()->get('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
            @endif
            </div>
            <div class="col-md-8">
                <div class="w-100">
                <div class="row">

                    <div class="card flex-fill w-100">
                    <form action="{{route('shop.edit', $show->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="form-label">Shop Name</label>
                                    <input type="text" name="shop_name" value="{{ $show->shop_name }}" class="form-control">
                                  </div>
                                  <div class="col-md-3">
                                    <label class="form-label">Logo</label>
                                    <input type="file" name="shop_logo" class="form-control">
                                  </div>
                                  <div class="col-md-4">
                                    <label class="form-label">Owner</label>
                                    <select name="shop_owner" class="form-control">
                                        <option selected>{{ $show->shop_owner }}</option>

                                        @foreach (App\User::where('urole', 'author')->get() as $role)
                                        <option value="{{$role->name}}">{{$role->name}}</option>
                                        @endforeach

                                    </select>
                                    {{-- <input type="text" name="shop_owner" value="{{ $show->shop_owner }}" class="form-control"> --}}
                                  </div>
                            </div>
                        </div>
                        </div>


                        <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label">Phone</label>
                                    <input type="phone" value="{{ $show->phone }}" name="phone"  class="form-control">
                                  </div>
                                  <div class="col-md-4">
                                    <label class="form-label">Email</label>
                                    <input type="email" value="{{ $show->email }}" name="email" class="form-control">
                                  </div>
                                  <div class="col-md-4">
                                    <label class="form-label">Address</label>
                                    <input type="text" value="{{ $show->shop_address }}" name="shop_address" class="form-control">
                                  </div>

                        </div>
                        </div>
                        </div>


                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="form-label">Location Coordinate (Google Map) </label>
                                        <input type="text" value="{{ $show->location }}" name="location" class="form-control">
                                      </div>
                            </div>
                            </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <button style="float: right;" type="submit" class="btn btn-outline-success btn-lg btn-block">Save</button>
                                </div>
                            </div>
                    </div>
                </div>
                </div>
        </form>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <img src="{{asset('shop/image')}}/{{$show->shop_logo}}" style="width:100%; height:100%;" alt="" srcset="">
                </div>
            </div>
        </div>

    </main>


@endforeach
@endsection
