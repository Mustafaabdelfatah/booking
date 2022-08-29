@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->


    <!-- Content Row -->
        <div class="card">

            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{ __('Customers') }}
                </h6>
                <div class="ml-auto">

                    <a href="# class="btn btn-primary">
                        <span class="icon text-white-50">

                        </span>
                        <span class="text">{{ __('All Customers') }}</span>
                    </a>

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover datatable datatable-customer" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="10">
                                </th>
                                <th>No</th>
                                <th>Full Name</th>
                                <th>Email</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse($customers as $customer)
                            <tr data-entry-id="{{ $customer->id }}">
                                <td>
                                </td>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $customer->name }} </td>
                                <td>{{ $customer->email }}</td>


                            </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="text-center">{{ __('Data Empty') }}</td>
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
