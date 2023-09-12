@extends('dashbord.parant')

@section('Title','Create Employee')
@section('styles')

@endsection

@section('MainTitle','Create Employee')
@section('subtitle','create employee')


@section('content')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title">Creat Employee</h3>
      </div>

      <!-- form start -->
      <form >
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="role_id"> The Role Name </label>
                    <select class="form-control " style="width: 100%;" id="role_id" name="role_id"
                    aria-label=".form-select-sm example">
                    @foreach ($roles as $role)
                    <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                </select>
            </div>
            </div>
            <div class="row">


            <div class="form-group col-md-4">
            <label for="first_name">First Name </label>
            <input type="text" class="form-control" name="first_name" id="first_name"
            placeholder="Enter First Name">
            </div>
        {{--  --}}
            <div class="form-group col-md-4">
            <label for="last_name">Last Name </label>
            <input type="text" class="form-control" name="last_name" id="last_name"
            placeholder="Enter Last Name">
            </div>
        {{--  --}}
            <div class="form-group col-md-4">
            <label for="mobile"> Mobile Number </label>
            <input type="text" class="form-control" name="mobile" id="mobile"
            placeholder="Enter The Mobile Number">
            </div>

        {{--  --}}
        </div>

        <div class="row">

            <div class="form-group col-md-4">
            <label for="date_of_brith">Birthday </label>
            <input type="date" class="form-control" name="date_of_brith" id="date_of_brith"
            placeholder="Enter Your Birthday">
            </div>
        {{--  --}}
            <div class="form-group col-md-4">
            <label for="email"> Email </label>
            <input type="email" class="form-control" name="email" id="email"
            placeholder="Enter Your Email">
            </div>
        {{--  --}}
            <div class="form-group col-md-4">
            <label for="password"> Password </label>
            <input type="password" class="form-control" name="password" id="password"
            placeholder="Enter Your Password">
            </div>
        {{--  --}}
        </div>
        <div class="row">

            <div class="form-group col-md-4">
            <label for="speciality"> Speciality </label>
            <input type="text" class="form-control" name="speciality" id="speciality"
            placeholder="Enter The Price">
            </div>
            {{--  --}}
            <div class="form-group col-md-4">
            <label for="salary_value"> Salary Value </label>
            <input type="text" class="form-control" name="salary_value" id="salary_value"
            placeholder="Enter The Price">
            </div>
            {{--  --}}
            <div class="form-group col-md-4">
            <label for="salary_type"> Salary Type </label>
            <select class="form-control " style="width: 100%;" id="salary_type" name="salary_type"
            aria-label=".form-select-sm example">
            <option value="Fixed salary">Fixed salary</option>
            <option value="Hourly salary">Hourly salary</option>
        </select>
            </div>
            {{--  --}}
        </div>
            <div class="row">
            <div class="form-group col-md-4">
            <label for="currancy"> Currancy Salary  </label>
            <select class="form-control " style="width: 100%;" id="currancy" name="currancy"
            aria-label=".form-select-sm example">
            <option value="USD">USD</option>
            <option value="NIS">NIS</option>
            <option value="JOD">JOD</option>

        </select>
            </div>
            {{--  --}}
            <div class="form-group col-md-4">
                <label for="certification"> Certification </label>
                <select class="form-control " style="width: 100%;" id="certification" name="certification"
                aria-label=".form-select-sm example">
                <option value="Nothing">Nothing</option>
                <option value="Diploma">Diploma</option>
                <option value="Bachelors">Bachelors</option>
                <option value="Masters">Masters </option>
                <option value="PhD">PhD </option>
                <option value="Prof">Prof </option>
            </select>
            </div>
            {{--  --}}


            <div class="form-group col-md-4">
            <label for="job_title"> Job Title </label>
            <input type="text" class="form-control" name="job_title" id="job_title"
            placeholder="Enter The Job Title">
            </div>
            {{--  --}}
            </div>
        <div class="row">

        <div class="form-group col-md-4">
            <label for="image">Image </label>
            <input type="file" class="form-control" name="image" id="image"
            placeholder="Enter Your Image">
        </div>
        {{--  --}}
        <div class="form-group col-md-4">
            <label for="cv"> CV </label>
            <input type="file" class="form-control" name="cv" id="cv"
            placeholder="Enter Your CV">
        </div>
        {{--  --}}

        <div class="form-group col-md-4">
            <label for="cities_id">   City </label>
            <select class="form-control " style="width: 100%;" id="cities_id" name="cities_id"
            aria-label=".form-select-sm example">
            @foreach ($cities as $city)
            <option value="{{$city->id}}">{{$city->name}}</option>
            @endforeach
        </select>
    </div>
    {{--  --}}
    </div>

    </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <a href="#" onclick="preformstore()" type="button" class="btn btn-success col-1">Stor</a>
            <a href="{{ route('employees.index') }}" type="button" class="btn btn-primary ">Return to index</a>
        </div>
      </form>
    </div>


  </div>
@endsection

@section('scripts')

<script>
    function preformstore(){
        let formData = new FormData();

        formData.append('role_id',document.getElementById('role_id').value);
        formData.append('first_name',document.getElementById('first_name').value);
        formData.append('last_name',document.getElementById('last_name').value);
        formData.append('mobile',document.getElementById('mobile').value);
        formData.append('date_of_brith',document.getElementById('date_of_brith').value);
        formData.append('email',document.getElementById('email').value);
        formData.append('password',document.getElementById('password').value);
        formData.append('speciality',document.getElementById('speciality').value);
        formData.append('salary_value',document.getElementById('salary_value').value);
        formData.append('salary_type',document.getElementById('salary_type').value);
        formData.append('currancy',document.getElementById('currancy').value);
        formData.append('certification',document.getElementById('certification').value);
        formData.append('job_title',document.getElementById('job_title').value);
        formData.append('image',document.getElementById('image').files[0]);
        formData.append('cv',document.getElementById('cv').files[0]);
        formData.append('cities_id',document.getElementById('cities_id').value);

        store('/dashbord/employees',formData)
    }
</script>
@endsection
