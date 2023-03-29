@extends('layouts.backend.app')
@section('title', 'Dashboard')

@section('content')

<div class="main-content-inner">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
            </li>
            <li class="active">Dashboard</li>
        </ul><!-- /.breadcrumb -->
    </div>

    <div class="page-content">

        <div class="page-header">
            <h1>
                Dashboard

            </h1>
        </div><!-- /.page-header -->

    </div><!-- /.page-content -->
</div>

@push('js')

@endpush
@endsection
