@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Content Row -->
        <div class="card">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                {{ __('Slots') }}
                </h6>
                <div class="ml-auto">

                    <a href="{{ route('admin.slots.create') }}" class="btn btn-primary">
                        <span class="icon text-white-50">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">{{ __('New slot') }}</span>
                    </a>

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover datatable datatable-User" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>#</th>
                                <th>{{ __('Day') }}</th>
                                <th>{{ __('Actions') }}</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse($slots as $slot)
                            <tr data-entry-id="{{ $slot->id }}">
                                <td></td>
                                <td>{{ $loop->iteration }}</td>
                                 <td>{{ $slot->day->translatedFormat('l j F Y')  }}</td>
                                <td>
                                    <a href="{{ route('admin.slots.edit', $slot->id) }}" class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form onclick="return confirm('are you sure ? ')"  class="d-inline" action="{{ route('admin.slots.destroy', $slot->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                    <a title="edit" href="{{  url('admin/slot/time/'.$slot->id) }}" class="btn btn-icon btn-success text-white mx-1 btn-sm">   Add Time & Duration    <i class="mdi mdi-plus  "></i></a>

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

</div>
@endsection


@push('script-alt')
<script>

</script>
@endpush
