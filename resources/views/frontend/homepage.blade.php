@extends('layouts.master_home')
@section('home_content')
<!-- ======= About Us Section ======= -->
<body>
<div id="booking" class="section">
    <div class="section-center">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-md-push-5">
                    <div class="booking-cta">
                        <h1>Make your reservation</h1>
                        <p>
                        </p>
                    </div>
                </div>
                <div class="col-md-4 col-md-pull-7">
                    <div class="booking-form">
                        <form action="">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <span class="form-label">Choose Day</span>
                                        <select name="from" class="form-control" {{auth()->check() ? '' : 'disabled' }}  type="text" required>
                                            {{-- @foreach($cities as $city)
                                                <option value="{{$city->name}}"> {{$city->name}} </option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <span class="form-label">Available Slots</span>
                                        <select name="to"class="form-control" {{auth()->check() ? '' : 'disabled' }} type="text" required>
                                            {{-- @foreach($cities as $city)
                                                <option value="{{$city->name}}"> {{$city->name}} </option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <span class="form-label">Check In</span>
                                        <input name= "datefrom" class="form-control" type="date" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <span class="form-label">Check out</span>
                                        <input name = "dateto" class="form-control" type="date" required>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="row">


                                {{-- {{dd(auth()->check())}} --}}
                            <div class="form-btn col-sm-10">
                                <button class="submit-btn" {{auth()->check() ? '' : 'disabled' }} >
                                    Check availability
                                </button>
                               @if(!auth()->user())
                                <p style="color: red">U Must Login To Can Booking</p>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

@endsection
