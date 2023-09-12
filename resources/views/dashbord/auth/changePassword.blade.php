@extends('dashbord.parant')

@section('Title','Change Password')
@section('styles')

@endsection

@section('MainTitle','Change Password')
@section('subtitle','change password')


@section('content')

<style>
    .input-group-text{
        cursor: pointer;
    }
</style>
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title">Change Password</h3>
      </div>

      <!-- form start -->
      <form >
        @csrf
        <div class="card-body">
        <div class="form-group col-lg-6">
            {{-- first feild --}}
                <label for="password">Current Password</label>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter Current Password">

                    {{-- show Password Eye --}}
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="toggle-password fas fa-eye"  data-target="password"></span>
                            </div>
                                </div>

                </div>

                {{-- sconed feild --}}
                <label for="new_password">New Password</label>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="new_password" id="new_password" placeholder="Enter New Password">

                    {{-- show Password Eye --}}
                    <div class="input-group-append" >
                        <div class="input-group-text">
                        <span class="toggle-password fas fa-eye"  data-target="new_password"></span>
                            </div>
                                </div>
                </div>
                {{-- thired feild --}}
                <label for="new_password_confirmation">Confirmation New Password</label>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="new_password_confirmation" id="new_password_confirmation" placeholder="Enter Confirmation New Password">

                    {{-- show Password Eye --}}
                    <div class="input-group-append"  >
                        <div class="input-group-text"  >
                <span  class="toggle-password fas fa-eye"   data-target="new_password_confirmation"></span>
                            </div>
                                </div>
                </div>


        </div>


        <!-- /.card-body -->

        <div class="card-footer form-group col-lg-3" style="background: #fff">
        <a href="#" onclick="performstore()" type="button"  class="btn btn-success col-4">Update</a>

        </div>
    </form>
    </div>


  </div>
@endsection

@section('scripts')
<script>
    function  performstore(){
        let formData = new FormData();
        formData.append('password' ,document.getElementById('password').value);
        formData.append('new_password' ,document.getElementById('new_password').value);
        formData.append('new_password_confirmation' ,document.getElementById('new_password_confirmation').value);

        store('/dashbord/change/password/',formData)
    }

</script>
@endsection
