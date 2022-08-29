@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<!-- Content Row -->
        <div class="card shadow">
            <div class="card-header py-3 d-flex">
            <h1 class="h3 mb-0 text-gray-800">{{ __('create customer') }}</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin.customers.index') }}" class="btn btn-primary">
                        <span class="text">{{ __('Go Back') }}</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.customers.update', $customer->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="form-group">
                        <label for="full_name">{{ __('full Name') }}</label>
                        <input type="text" class="form-control" id="full_name" placeholder="{{ __('full name') }}" name="full_name" value="{{ old('last_name', $customer->full_name) }}" />
                    </div>
                    <div class="form-group">
                        <label for="email">{{ __('Email') }}</label>
                        <input type="email" class="form-control" id="email" placeholder="{{ __('email') }}" name="email" value="{{ old('email',  $customer->email) }}" />
                    </div>

                    <div class="form-group">
                        <label for="phone">{{ __('Phone') }}</label>
                        <input type="number" class="form-control" id="phone" placeholder="{{ __('phone') }}" name="mobile" value="{{ old('phone', $customer->mobile) }}" />
                    </div>
                    <div class="form-group">
                        <label for="address">{{ __('Address') }}</label>
                        <textarea class="form-control" name="address" id="address" placeholder="address" cols="30" rows="10">{{ old('address', $customer->address) }}</textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-12" style="padding:0 25px">
                            <label class="control-label">Image</label>
                            <input type="file" name="image" class="form-control image">
                        </div>
                    </div>


                    <div class="form-group">
                        <img src="{{ $customer->image_path }}" class="img-thumbnail image-preview"
                            style="width:100px">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Save') }}</button>
                </form>
            </div>
        </div>


    <!-- Content Row -->

</div>
@endsection
