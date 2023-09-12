@extends('dashbord.parant')

@section('Title','Studant')
@section('styles')

@endsection

@section('MainTitle','Index Studant')
@section('subtitle','index studant')


@section('content')






<div class="col-12">
    <div class="card">
      <div class="card-header">
        {{-- <h3 class="card-title"> Table Studant</h3> --}}
        @can('Create-Studant')
    <a href="{{ route('studants.create') }}" type="submit" class="btn btn-success ">Add New Studant</a>
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
                @canAny('Edit-Studant','Delete-Studant')
                <th>Setting</th>
                @endcanAny
            </tr>
          </thead>
          <tbody>
            @foreach ($studants as $studant)

            <tr>
            <td>{{ $studant->id }}</td>
            <td>{{ $studant->user ? $studant->user->first_name.' '.$studant->user->last_name:'notfount'}}</td>
            {{-- <td>{{ $Studant->user->mobile}}</td> --}}
            <td>{{ $studant->user ? $studant->user->mobile :'notfount'}}</td>
            <td>{{ $studant->email }}</td>
            <td>{{ $studant->user ? $studant->user->speciality :'notfount'}}</td>
            <td>{{ $studant->user ? $studant->user->certification :'notfount'}}</td>
            <td>{{ $studant->user ? $studant->user->job_title :'notfount'}}</td>
            {{-- image --}}
            <td>
                <img class="img-circle img-bordered-sm "
    src="{{ $studant->user ? asset('storage/images/Studant/'.$studant->image) : asset('image/Backend_Roadmap _.jpg') }}"
                width="50" height="50" alt="User Image">
            </td>
            {{-- cv --}}
            {{-- <td>
                <img class="img-circle img-bordered-sm "
    src="{{ $studant->user ? asset('storage/files/Studant/'.$studant->cv) : asset('image/Backend_Roadmap _.jpg') }}"
                width="50" height="50" alt="User Image">
            </td> --}}
            {{-- buttons --}}
            <td>
    <div>
        @can('Edit-Studant')

        <a href="{{ route('studants.edit', $studant->id)}}" type="button" class="btn btn-primary">
            <i class="fas fa-edit"></i>
        </a>
        @endcan

        @can('Delete-Studant')

        <a   href="#"  onclick="performDestroy({{ $studant->id }} , this)" class="btn btn-danger">
            <i class="fas fa-trash-alt"></i>
        </a>
        @endcan

        @can('Show-Studant')
        <a href="{{ route('studants.show', $studant->id) }}" type="button" class="btn btn-success">
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
    {{ $studants->links() }}
  </div>




@endsection

@section('scripts')
<script>
    function performDestroy(id, ref){
    confirmDestroy('/dashbord/studants/'+id,ref)
    }

</script>
@endsection
