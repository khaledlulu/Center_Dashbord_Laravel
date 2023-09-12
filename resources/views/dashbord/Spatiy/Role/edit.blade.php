@extends('dashbord.parant')

@section('Title','Edit Role')
@section('styles')

@endsection

@section('MainTitle','Edit Role')
@section('subtitle','edit role')


@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Edit Roles</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="create_form">
                        @csrf
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                      <label>Guard The Role</label>
                                      <select class="form-control select2" name="guard_name" style="width: 100%;" id="guard_name">
                <option value="admin" @if($roles->guard_name == 'admin') selected @endif>Admin</option>
                <option value="studant" @if($roles->guard_name == 'studant') selected @endif>studant</option>
                <option value="employee" @if($roles->guard_name == 'employee') selected @endif>employee</option>

                                    </select>
                                    </div>
                                </div>

                            <div class="form-group col-md-6">
                                <label for="name">Name The Role</label>
                                <input type="text" class="form-control" name="name" id="name"
                                   value="{{ $roles->name }}"laceholder="Enter your role name">
                            </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="button" onclick="performUpdate({{ $roles->id }})" class="btn btn-success">Update</button>
                </div>
                </form>
            </div>



</section>
@endsection

@section('scripts')

<script>
    function performUpdate(id){
        let formData = new FormData();
        formData.append('guard_name',document.getElementById('guard_name').value);
        formData.append('name',document.getElementById('name').value);

        storeRoute('/dashbord/update_roles/'+ id , formData)
    }


</script>
@endsection
