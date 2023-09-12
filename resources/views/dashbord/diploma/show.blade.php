@extends('dashbord.parant')

@section('Title','Show Diploma')
@section('styles')

@endsection

@section('MainTitle','Show Diploma')
@section('subtitle','show diploma')


@section('content')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title">Show Diploma</h3>
      </div>

      <!-- form start -->
      <form >
        @csrf
        <div class="card-body">
            <div class="row">

                <div class="form-group col-md-4">
                    <label for="tranning_type"> Tranning Type </label>
        <option selected class="form-control from-control-solid"disabled > {{ $diplomas->tranning_type }}</option>

                </div>
                {{--  --}}
            <div class="form-group col-md-4">
            <label for="name">Tranning Name </label>
            <input  class="form-control from-control-solid"disabled value="{{ $diplomas->name }}">
            </div>
        {{--  --}}
            <div class="form-group col-md-4">
            <label for="number_of_hours"> Number of Hours</label>
            <input class="form-control from-control-solid"disabled
            value="{{ $diplomas->number_of_hours }}">
            </div>

        {{--  --}}
        </div>

        <div class="row">

            <div class="form-group col-md-4">
            <label for="start_date">Start Date </label>
            <input class="form-control from-control-solid"disabled
            value="{{ $diplomas->start_date }}">
            </div>
        {{--  --}}
            <div class="form-group col-md-4">
            <label for="end_date">End Date </label>
            <input class="form-control from-control-solid"disabled
            value="{{ $diplomas->end_date }}">
            </div>
        {{--  --}}
            <div class="form-group col-md-4">
            <label for="degree">Degree </label>
            <input class="form-control from-control-solid"disabled
            value="{{ $diplomas->degree }}">
            </div>
        {{--  --}}
        </div>
        <div class="row">

            <div class="form-group col-md-4">
            <label for="price">price</label>
            <input class="form-control from-control-solid"disabled
            value="{{ $diplomas->price }}">
            </div>
            {{--  --}}
            <div class="form-group col-md-4">
                <label for="currancy"> Currancy </label>
            <option selected class="form-control from-control-solid"disabled>{{ $diplomas->currancy }}</option>
            </div>
            {{--  --}}


            <div class="form-group col-md-4">
            <label for="number_of_studants">Number of Studants </label>
            <input class="form-control from-control-solid"disabled
            value="{{ $diplomas->number_of_studants }}">
            </div>
            {{--  --}}
            </div>
        <div class="row">

        <div class="form-group col-md-4">
            <label for="speciality">Speciality </label>
            <input class="form-control from-control-solid"disabled
            value="{{ $diplomas->speciality }}">
        </div>
        {{--  --}}
        <div class="form-group col-md-4">
            <label for="status">Status </label>
            <option selected class="form-control from-control-solid"disabled>{{ $diplomas->status }}</option>

    </div>
    {{--  --}}
        <div class="form-group col-md-4">
            <label for="room_id">   Hall Number </label>
            @foreach ($rooms as $room)
            <option value="{{$room->id}} " selected class="form-control from-control-solid"disabled>{{$room->room_number}}</option>
            @endforeach
    </div>
    {{--  --}}
    </div>

    <div class="form-group col-md-8">
        <label for="description">Discription </label>
        <textarea class="form-control from-control-solid"disabled cols="30" rows="5">
            {{ $diplomas->description }}</textarea>
    </div>

    </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <a href="{{ route('diplomas.index') }}"  type="button"
            class="btn btn-primary col-2">Return Index</a>
        </div>
      </form>
    </div>


  </div>
@endsection

@section('scripts')

@endsection
