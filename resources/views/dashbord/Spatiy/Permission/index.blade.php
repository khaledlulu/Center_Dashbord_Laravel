@extends('dashbord.parant')

@section('Title','Create Permission')
@section('styles')

@endsection

@section('MainTitle','Create Permission')
@section('subtitle','create Permission')


@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header ">
          <h3 class="card-title"></h3>
          <a href="{{ route('permissions.create') }}" type="button"  class="btn btn-primary">Add new Permission</a>


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
                <th>Name The Premission</th>
                <th>Type The Guard</th>
                <th>Created At</th>
                <th>Setting</th>
              </tr>
            </thead>
            <tbody>
                {{-- <td><span class="tag tag-success">Approved</span></td> --}}
                @foreach ($permissions as $permission )
                <tr>
                    <td>{{ $permission->id }}</td>
                    <td>{{ $permission->name }}</td>
                    <td><span class="badge bg-success">{{ $permission->guard_name }}</span></td>

                    {{-- <td>
                        <a href="{{ route('indexAuthor' , ['id'=>$permission->id])}}"
                            class="btn btn-info">
                            ({{ $permission->authors_count }}) Author/s</a>
                    </td> --}}

                         {{-- <td><span class="badge bg-success">({{ $permission->articles_count}}) Article/s</span></td> --}}
                         <td>{{ $permission->created_at }}</td>

                    <td>
                        <div >
                            <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-primary">
                              <i class="fas fa-edit"></i>
                            </a>
                        <a href="#" onclick="performDestroy({{ $permission->id }}, this)" class="btn btn-danger">
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
{{ $permissions->links() }}
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
        confirmDestroy('/dashbord/permissions/'+id ,ref);
    }

</script>
@endsection
