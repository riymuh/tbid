@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            @include('layouts.sidebar')
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                {!! $chart->html() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
    {!! Charts::scripts() !!}
    {!! $chart->script() !!}
@endsection
