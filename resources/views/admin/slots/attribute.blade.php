@extends('layouts.admin')




@section('content')
    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header py-3 d-flex">
                    <h6 class="m-0 font-weight-bold text-primary">
                        {{ __('The Day Is : ') }} {{ $slotDetails->day->translatedFormat('l j F Y') }}
                    </h6>
                    <div class="ml-auto">
                        <a href="{{ route('admin.slots.index') }}"
                            class="btn btn-primary btn-sm shadow-sm">{{ __('Go Back') }}</a>
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.adddetails', $slotDetails->id) }}">
                        @csrf
                        <input type="hidden" name="slot_id" value="{{ $slotDetails->id }}">

                        <div class="form-body">
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">{{ __('Time From') }}</label>
                                        <input type="time" class="form-control" id="time_from"
                                            placeholder="{{ __('time_from') }}" name="time_from" value="{{ old('time_from') }}" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">{{ __('Time To') }}</label>
                                        <input type="time" class="form-control" id="time_to"
                                            placeholder="{{ __('time_to') }}" name="time_to"
                                            value="{{ old('time_to') }}" />
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">{{ __('Duration') }}</label>
                                        <div class="wrapper" style="position: relative">
                                            <input type="number" class="form-control" id="duration"
                                            placeholder="{{ __('Duration') }}" name="duration"
                                            value="{{ old('duration') }}" style="display: inline-block" />
                                            <small style="position: absolute; right:30px;top:8px;color:red;font-size:15px;font-weight:700"> Min </small>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">{{ __('Save') }}</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Row -->

      <!-- Content Row -->
      <div class="card">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">
            {{ __('Slots IN The Day : ') }} {{$slotDetails->day->translatedFormat('l j F Y')}}
            </h6>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover datatable datatable-User" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="10">
                            </th>
                            <th>#</th>
                            <th>{{ __('Time From') }}</th>
                            <th>{{ __('Time To') }}</th>
                            {{-- <th>{{ __('Time From only hour') }}</th>
                            <th>{{ __('Time To only hour') }}</th> --}}
                            <th>{{ __('Duration') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($slotDetails->transactions as $slot)
                        <tr data-entry-id="{{ $slot->id }}">
                            <td></td>
                            <td>{{ $loop->iteration }}</td>
                            <td> {{ Carbon\Carbon::parse($slot->time_from)->format('g:i A' ) }}</td>
                            <td> {{ Carbon\Carbon::parse($slot->time_to)->format('g:i A' ) }}</td>

                             {{-- <td>{{ $slot->time_from->hour }}</td>
                             <td>{{ $slot->time_to->hour }}</td> --}}

                             <td>{{ $slot->duration }}</td>
                            <td>
                                <a href="{{ route('admin.editdetails', $slot->id) }}" class="btn btn-info">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                <form onclick="return confirm('are you sure ? ')"  class="d-inline" action="{{ route('admin.slots.destroy', $slot->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">{{ __('Data Empty') }}</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<!-- Content Row -->
@endsection
