@extends('dashbord.parant')

@section('Title','Index Role')
@section('styles')

@endsection

@section('MainTitle','Index Role')
@section('subtitle','index role')


@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header ">
          <h3 class="card-title"></h3>
          <a href="{{ route('roles.create') }}" type="button"  class="btn btn-primary">Add new Role</a>


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
          <table class="table  table-bordered table-striped table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name The Role</th>
                <th>Guard The Role</th>
                <th>Permissions</th>
                <th>Created At</th>
                <th>Setting</th>
              </tr>
            </thead>
            <tbody>
                {{-- <td><span class="tag tag-success">Approved</span></td> --}}
                @foreach ($roles as $role )
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td><span class="badge bg-success">{{ $role->guard_name }}</span></td>
                    <td>

                        {{-- <td><a href="{{route('indexArticles',['id'=>$author->id])}}"
                            class="btn btn-info">({{$author->articles_count}})
                            article/s</a> </td> --}}

                        <a href="{{ route('roles.permissions.index' ,  $role->id) }}"
                            class="btn btn-primary">
                            ({{ $role->permissions_count }}) Permission/s</a>
                    </td>

                    {{-- <td><span class="badge bg-success">({{ $role->articles_count}}) Article/s</span></td> --}}
                        <td>{{ $role->created_at }}</td>

                    <td>
                        <div >
                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                        <a href="#" onclick="performDestroy({{ $role->id }}, this)" class="btn btn-danger">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                        <a type="button" class="btn btn-success">
                            <i class="fas fa-info-circle"></i>
                        </a>
                    </td>
                    </tr>
                @endforeach


            </tbody>
          </table>
        </div>
    </div>
{{ $roles->links() }}
        <!-- /.card-body -->
      </div>
    </div>

      <!-- /.card -->
    </div>
  </div>
@endsection

@section('scripts')

<script>
    function performDestroy(id , ref){
        confirmDestroy('/dashbord/roles/'+id ,ref);
    }
</script>
@endsection
