@extends('dashbord.parant')

@section('Title','Create Permission')
@section('styles')

@endsection

@section('MainTitle','Create Permission')
@section('subtitle','create permission')


@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Edit Permission</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="create_form">
                        @csrf
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label>Type The Guard</label>
                        <select class="form-control select2" name="guard_name" style="width: 100%;"id="guard_name">
            <option value="admin" @if($permissions->guard_name == 'admin') selected @endif>Admin</option>
            <option value="studant" @if($permissions->guard_name == 'studant') selected @endif>Studant</option>
            <option value="employee" @if($permissions->guard_name == 'employee') selected @endif>Employee</option>

                                    </select>
                                    </div>
                                </div>

                            <div class="form-group col-md-6">
                                <label for="name">Name The Permission</label>
                                <input type="text" class="form-control" name="name" id="name"
                                value="{{ $permissions->name }}"laceholder="Enter your permission name">
                            </div>

                </div>
                <!-- /.card-body -->

            <div class="card-footer">
        <button type="button" onclick="performUpdate({{ $permissions->id }})" class="btn btn-success">Update</button>
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

        storeRoute('/dashbord/update_permissions/'+ id , formData)
    }

</script>
@endsection
