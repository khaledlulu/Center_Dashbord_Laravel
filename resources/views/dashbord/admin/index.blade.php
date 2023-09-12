@extends('dashbord.parant')

@section('Title','Admin')
@section('styles')

@endsection

@section('MainTitle','Index Admin')
@section('subtitle','index admin')


@section('content')






<div class="col-12">
    <div class="card">
      <div class="card-header">
        {{-- <h3 class="card-title"> Table Admin</h3> --}}
        @can('Create-Admin')
        <a href="{{ route('admins.create') }}" type="submit" class="btn btn-success ">Add New Admin</a>
        @endcan

                            {{-- search form --}}

        {{-- <form action="" method="get" style="margin-bottom:2%;">
            @csrf
            <div class="row">
            <div class="input-icon col-md-2">
                <input type="text" class="form-control" placeholder="Search By Name"
                    name='first_name' @if( request()->user()->first_name) value={{request()->user()->first_name}} @endif/>
                    <span>
                        <i class="flaticon2-search-1 text-muted"></i>
                    </span>
                </div>

                <div class="input-icon col-md-2">
                <input type="text" class="form-control" placeholder="Search By Speciality "
                    name='speciality' @if( request()->speciality) value={{request()->speciality}} @endif/>
                    <span>
                        <i class="flaticon2-search-1 text-muted"></i>
                    </span>
                </div>

                <div class="input-icon col-md-2">
                <input type="text" class="form-control" placeholder="Search By Job Title"
                    name='job_title' @if( request()->job_title) value={{request()->job_title}} @endif/>
                    <span>
                        <i class="flaticon2-search-1 text-muted"></i>
                    </span>
                </div>
            <div class="col-md-6">
                <button class="btn btn-primary btn-md" type="submit">Search</button>
                <a href="{{ route('admins.index') }}" class="btn btn-danger btn-md" type="submit"> End Search</a>
            </div>
        </div>
            </form> --}}

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
                @canAny('Edit-Admin','Delete-Admin')
                <th>Setting</th>
                @endcanAny
            </tr>
          </thead>
          <tbody>
            @foreach ($admins as $admin)

            <tr>
            <td>{{ $admin->id }}</td>
            <td>{{ $admin->user ? $admin->user->first_name.' '.$admin->user->last_name:'notfount'}}</td>
            {{-- <td>{{ $admin->user->mobile}}</td> --}}
            <td>{{ $admin->user ? $admin->user->mobile :'notfount'}}</td>
            <td>{{ $admin->email }}</td>
            <td>{{ $admin->user ? $admin->user->speciality :'notfount'}}</td>
            <td>{{ $admin->user ? $admin->user->certification :'notfount'}}</td>
            <td>{{ $admin->user ? $admin->user->job_title :'notfount'}}</td>
            {{-- image --}}
            <td>
                <img class="img-circle img-bordered-sm "
    src="{{ $admin->user ? asset('storage/images/admin/'.$admin->image) : 'not Found Pictuer' }}"
                width="50" height="50" alt="User Image">
            </td>
            {{-- cv --}}
            {{-- <td>
                <img class="img-circle img-bordered-sm "
    src="{{ $admin->user ? asset('storage/files/admin/'.$admin->cv) :'not Found Pictuer' }}"
                width="50" height="50" alt="User Image">
            </td> --}}
            {{-- buttons --}}
            <td>
    <div>
        @can('Edit-Admin')

        <a href="{{ route('admins.edit', $admin->id)}}" type="button" class="btn btn-primary">
            <i class="fas fa-edit"></i>
        </a>
        @endcan

            @can('Delete-Admin')

            <a   href="#"  onclick="performDestroy({{ $admin->id }} , this)" class="btn btn-danger">
                <i class="fas fa-trash-alt"></i>
            </a>
            @endcan

            @can('Show-Admin')
        <a href="{{ route('admins.show',$admin->id) }}" type="button" class="btn btn-success">
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
    {{ $admins->links() }}
  </div>




@endsection

@section('scripts')
<script>
    function performDestroy(id, ref){
    confirmDestroy('/dashbord/admins/'+id,ref)
    // confirmDestroy
    }

</script>
@endsection
