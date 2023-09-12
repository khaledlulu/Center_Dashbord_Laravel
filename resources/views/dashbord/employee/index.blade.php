@extends('dashbord.parant')

@section('Title','Employee')
@section('styles')

@endsection

@section('MainTitle','Index Employee')
@section('subtitle','index employee')


@section('content')






<div class="col-12">
    <div class="card">
      <div class="card-header">
        {{-- <h3 class="card-title"> Table Employee</h3> --}}
        @can('Create-Employee')
    <a href="{{ route('employees.create') }}" type="submit" class="btn btn-success ">Add New Employee</a>
        @endcan

        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

            <div class="input-group-append">
              <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Speciality</th>
                <th>Certification</th>
                <th>Job Title</th>
                <th>Image</th>
                {{-- <th>cv</th> --}}
                @canAny('Edit-Employee','Delete-Employee')
                <th>Setting</th>
                @endcanAny
            </tr>
          </thead>
          <tbody>
            @foreach ($employees as $employee)

            <tr>
            <td>{{ $employee->id }}</td>
            <td>{{ $employee->user ? $employee->user->first_name.' '.$employee->user->last_name:'notfount'}}</td>
            {{-- <td>{{ $Employee->user->mobile}}</td> --}}
            <td>{{ $employee->user ? $employee->user->mobile :'notfount'}}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->user ? $employee->user->speciality :'notfount'}}</td>
            <td>{{ $employee->user ? $employee->user->certification :'notfount'}}</td>
            <td>{{ $employee->user ? $employee->user->job_title :'notfount'}}</td>
            {{-- image --}}
            <td>
                <img class="img-circle img-bordered-sm "
    src="{{ $employee->user ? asset('storage/images/Employee/'.$employee->image) : asset('image/Backend_Roadmap _.jpg') }}"
                width="50" height="50" alt="User Image">
            </td>
            {{-- cv --}}
            {{-- <td>
                <img class="img-circle img-bordered-sm "
    src="{{ $employee->user ? asset('storage/files/Employee/'.$employee->cv) : asset('image/Backend_Roadmap _.jpg') }}"
                width="50" height="50" alt="User Image">
            </td> --}}
            {{-- buttons --}}
            <td>
    <div>
        @can('Edit-Employee')

        <a href="{{ route('employees.edit', $employee->id)}}" type="button" class="btn btn-primary">
            <i class="fas fa-edit"></i>
        </a>
        @endcan

        @can('Delete-Employee')

        <a   href="#"  onclick="performDestroy({{ $employee->id }} , this)" class="btn btn-danger">
            <i class="fas fa-trash-alt"></i>
        </a>
        @endcan

        @can('Show-Employee')
        <a  href="{{ route('employees.show',$employee->id) }}" type="button" class="btn btn-success">
            <i class="fas fa-info-circle"></i>
        </a>
        @endcan

        </div>
            </td>

            </tr>
            @endforeach

        </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
    {{ $employees->links() }}
  </div>




@endsection

@section('scripts')
<script>
    function performDestroy(id, ref){
    confirmDestroy('/dashbord/employees/'+id,ref)
    // confirmDestroy
    }

</script>
@endsection
