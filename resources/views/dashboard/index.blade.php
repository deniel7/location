@extends('layouts.backend')
@section('title', 'Dashboard')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
  Dashboard
  <small>General Stats</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
  </ol>
</section>
<!-- Main content -->
<section class="content dashboard" style="font-size: 1.2em;">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <!-- Content here -->
      </div>
    </div>
  </div>
</section>
<!-- /.content -->
@endsection