@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">add tenant
                    <a href="{{ route('tenant.create') }}" class="btn btn-primary float-right">Create Tenant</a>

                </div>

                <div class="card-body">
                 
                   <table class="table">
                    <tr>
                        <th>name</th>
                        <th>domain</th>
                        <th>Database name</th>
                    </tr>
                    @foreach ($tenants as $tenant)
                        <tr>
                            <td>{{ $tenant->id }}</td>
                            <td>{{ $tenant->domains->first()->domain }}</td>
                            <td>{{ $tenant->tenancy_db_name }}</td>
                        </tr>
                    @endforeach
                </table>

                <table class="table">
                    <tr>
                        <th>name</th>
                    </tr>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                        </tr>
                    @endforeach
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
