@extends('dashbord.parant')

@section('Title','Show Studant')
@section('styles')

@endsection

@section('MainTitle','Show Studant')
@section('subtitle','show studant')


@section('content')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title">Show Studant</h3>
      </div>

      <!-- form start -->
      <form >
        @csrf
        <div class="card-body">
            <div class="row">


            <div class="form-group col-md-4">
            <label for="first_name">First Name </label>
            <input class="form-control from-control-solid"disabled
            value="{{ $studants->user->first_name }}">
            </div>
        {{--  --}}
            <div class="form-group col-md-4">
            <label for="last_name">Last Name </label>
            <input class="form-control from-control-solid"disabled
            value="{{ $studants->user->last_name }}">
            </div>
        {{--  --}}
            <div class="form-group col-md-4">
            <label for="mobile"> Mobile Number </label>
            <input class="form-control from-control-solid"disabled
            value="{{ $studants->user->mobile }}">
            </div>

        {{--  --}}
        </div>

        <div class="row">

            <div class="form-group col-md-4">
            <label for="date_of_brith">Birthday </label>
            <input class="form-control from-control-solid"disabled
            value="{{ $studants->user->date_of_brith }}">
            </div>
        {{--  --}}

            <div class="form-group col-md-4">
            <label for="email"> Email </label>
            <input class="form-control from-control-solid"disabled
            value="{{ $studants->email }}">
            </div>

            {{--  --}}
            <div class="form-group col-md-4">
            <label for="salary_value"> Salary Value </label>
            <input class="form-control from-control-solid"disabled
            value="{{ $studants->user->salary_value }}">
            </div>
            {{--  --}}
        </div>
        <div class="row">

            <div class="form-group col-md-4">
            <label for="salary_type"> Salary Type </label>
            <option selected class="form-control from-control-solid"disabled>{{ $studants->user->salary_type }}</option>
            </div>
            {{--  --}}


            <div class="form-group col-md-4">
            <label for="currancy"> Currancy Salary  </label>

            <option selected class="form-control from-control-solid"disabled>{{ $studants->user->currancy }}</option>
            </div>
            {{--  --}}
            <div class="form-group col-md-4">
                <label for="certification"> Certification </label>
                <option selected class="form-control from-control-solid"disabled>{{ $studants->user->certification }}</option>
            </div>
            {{--  --}}
        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <label for="speciality"> Speciality </label>
                <input class="form-control from-control-solid"disabled
                value="{{ $studants->user->speciality }}">
                </div>
            {{--  --}}
            <div class="form-group col-md-4">
            <label for="job_title"> Job Title </label>
            <input class="form-control from-control-solid"disabled
            value="{{ $studants->user->job_title }}">
            </div>
            {{--  --}}

            <div class="form-group col-md-4">
                <label for="cities_id">   City </label>
                @foreach ($cities as $city)
            <option value="{{$city->id}}" class="form-control from-control-solid"disabled>{{$city->name}}</option>
                @endforeach
        </div>
        {{--  --}}
    </div>


        <div class="row">
            <div class="form-group col-md-4">
                <label for="image">Image </label>
                <div>
                    <img class="img-circle img-bordered-sm "
        src="{{ $studants->user ? asset('storage/images/studant/'.$studants->image) : 'not Fount image' }}"
                width="80" height="80" alt="User Image">
                </div>
            </div>

            {{--  --}}

            <div class="form-group col-md-4">
                <label for="cv">Cv </label>
                <div>
                    <img class="img-circle img-bordered-sm "
        src="{{ $studants->user ? asset('storage/files/studant/'.$studants->cv) : 'not Fount cv' }}"
                width="80" height="80" alt="User cv">
                </div>
            </div>
            {{--  --}}
        </div>




        </div>
        <!-- /.card-body -->

        <div class="card-footer">

        <a href="{{ route('studants.index') }}" type="button" class="btn btn-primary ">Return to index</a>

            </div>
        </form>
    </div>


    </div>
@endsection

@section('scripts')

@endsection
