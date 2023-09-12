@extends('dashbord.parant')

@section('Title','Show Page Admin')
@section('styles')

@endsection

@section('MainTitle','Show Page Admin')
@section('subtitle','Show Page admin')


@section('content')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title">Show Page Admin</h3>
      </div>

      <!-- form start -->
      <form >
        @csrf
        <div class="card-body">
            <div class="row">


            <div class="form-group col-md-4">
            <label for="first_name">First Name </label>
            <input
            value="{{ $admins->user->first_name }}"
            class="form-control from-control-solid"
            disabled >
            </div>
        {{--  --}}
            <div class="form-group col-md-4">
            <label for="last_name">Last Name </label>
            <input
            value="{{ $admins->user->last_name }}"
            class="form-control from-control-solid"
            disabled>
            </div>
        {{--  --}}
        <div class="form-group col-md-4">
            <label for="mobile"> Mobile Number </label>
            <input
            value="{{ $admins->user->mobile }}"
            class="form-control from-control-solid"
            disabled>
            </div>

        {{--  --}}
        </div>

        <div class="row">
            <div class="form-group col-md-4">
            <label for="date_of_brith">Birthday </label>
            <input
            value="{{ $admins->user->date_of_brith }}"
            class="form-control from-control-solid"
            disabled>
            </div>
        {{--  --}}

            <div class="form-group col-md-4">
            <label for="email"> Email </label>
            <input
            value="{{ $admins->email }}"
            class="form-control from-control-solid"
            disabled>
            </div>
            {{--  --}}

            <div class="form-group col-md-4">
            <label for="salary_value"> Salary Value </label>
            <input
            value="{{ $admins->user->salary_value }}"
            class="form-control from-control-solid"
            disabled>
            </div>
            {{--  --}}
        </div>
        <div class="row">

            <div class="form-group col-md-4">
            <label for="salary_type"> Salary Type </label>
            <option selected
            class="form-control from-control-solid"
            disabled>{{ $admins->user->salary_type }}</option>
            </div>
            {{--  --}}


            <div class="form-group col-md-4">
            <label for="currancy"> Currancy Salary  </label>

            <option selected
            class="form-control from-control-solid"
            disabled>{{ $admins->user->currancy }}</option>

            </div>
            {{--  --}}
            <div class="form-group col-md-4">
                <label for="certification"> Certification </label>
                <option selected
                class="form-control from-control-solid"
                disabled>{{ $admins->user->certification }}</option>
            </div>
            {{--  --}}
        </div>
        <div class="row">
            <div class="form-group col-md-4">
            <label for="job_title"> Job Title </label>
            <input
            value="{{ $admins->user->job_title }}"
            class="form-control from-control-solid"
            disabled>
            </div>
            {{--  --}}
            <div class="form-group col-md-4">
                <label for="speciality"> Speciality </label>
                <input
                value="{{ $admins->user->speciality }}"
                class="form-control from-control-solid"
                disabled>
                </div>
                {{--  --}}
                <div class="form-group col-md-4">
                    <label for="cities_id">   City </label>
                    @foreach ($cities as $city)
                    <option value="{{$city->id}}"
                        class="form-control from-control-solid"
                        disabled>{{$city->name}}</option>
                    @endforeach

            </div>
            {{--  --}}
        </div>

    <div class="row">
        <div class="form-group col-md-4">
            <label for="image">Image </label>
            <div>
                <img class="img-circle img-bordered-sm "
                src="{{ $admins->user ? asset('storage/images/admin/'.$admins->image) : 'not Fount image' }}"
                            width="80" height="80" alt="User Image">
            </div>
        </div>
        {{--  --}}
        <div class="form-group col-md-4">
            <label for="cv"> CV </label>
        <div style="vertical-align: middle">
                <img class="img-circle img-bordered-sm "
            src="{{ $admins->user ? asset('storage/files/admin/'.$admins->cv) : 'not Fount file' }}"
                            width="80" height="80"  >
            </div>
        </div>
        {{--  --}}
    </div>

    </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
        @can('Index-Admin')
        <a href="{{ route('admins.index') }}" type="button" class="btn btn-primary ">Return to index</a>
        @endcan
        </div>
      </form>
    </div>


  </div>
@endsection

@section('scripts')


@endsection
