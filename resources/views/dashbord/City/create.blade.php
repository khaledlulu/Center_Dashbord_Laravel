@extends('dashbord.parant')

@section('Title','Create City')
@section('styles')

@endsection

@section('MainTitle','Create City')
@section('subtitle','create city')


@section('content')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title">Creat City</h3>
      </div>
      @if($errors->any())
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-ban"></i> Alert!</h5>

        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach

      </div>
      @endif

@if(session()->has('message'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-check"></i> Successflly</h5>
    {{ session('message') }}
    </div>
@endif

      <!-- form start -->
      <form action="{{ route('cities.store') }}" method="POST">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="name">City Name </label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Enter City Name">
          </div>
          <div class="form-group">
            <label for="street">Street Name</label>
            <input type="text" class="form-control" id="street" name="street" placeholder="Enter Street Name">
        </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-success col-1">Stor</button>
        </div>
      </form>
    </div>


  </div>
@endsection

@section('scripts')

@endsection
