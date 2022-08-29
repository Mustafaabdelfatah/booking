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
                <form action="{{ route('admin.customers.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="full_name">{{ __('full Name') }}</label>
                        <input type="text" class="form-control" id="full_name" placeholder="{{ __('full name') }}" name="full_name" value="{{ old('last_name') }}" />
                    </div>
                    <div class="form-group">
                        <label for="email">{{ __('Email') }}</label>
                        <input type="email" class="form-control" id="email" placeholder="{{ __('email') }}" name="email" value="{{ old('email') }}" />
                    </div>

                    <div class="form-group">
                        <label for="phone">{{ __('Phone') }}</label>
                        <input type="number" class="form-control" id="phone" placeholder="{{ __('phone') }}" name="mobile" value="{{ old('phone') }}" />
                    </div>
                    <div class="form-group">
                        <label for="address">{{ __('Address') }}</label>
                        <input type="text" class="form-control" id="address" placeholder="{{ __('address') }}" name="address" value="{{ old('address') }}" />
                     </div>
                     <div class="form-group">
                        <label class="control-label" style="padding:0 10px">Image</label>
                        <input type="file" style="color:#ddd" class="image" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Save') }}</button>
                </form>
            </div>
        </div>


    <!-- Content Row -->

</div>
@endsection
