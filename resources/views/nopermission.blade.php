@extends('layouts.login')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card card-default rounded-0">
                <div class="card-header">
                    <strong>No Permission</strong>
                </div>
                <div class="card-body">
                    You are not permitted to access this page.
                    <a href="{{ route('dashboard') }}" class="btn btn-info btn-sm rounded-0 d-table mt-3">BACK</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
