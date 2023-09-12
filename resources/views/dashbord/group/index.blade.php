@extends('dashbord.parant')

@section('Title','Group')
@section('styles')

@endsection

@section('MainTitle','Index Group')
@section('subtitle','index group')


@section('content')






<div class="col-12">
    <div class="card">
        <div class="card-header">
            @can('Create-Group')
            <a href="{{ route('createGroup', $id) }}" type="button" class="btn btn-success ">Add New Group</a>
                @endcan
            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">

                  <div class="input-group-append">
                   
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
                <th>Group Name</th>
                <th>Group Number</th>
                <th>Days </th>
                <th>Name The Diploma </th>
                @canAny('Edit-Group','Delete-Group')
                <th>Setting</th>
                @endcanAny
                </tr>
            </thead>
            <tbody>
            @foreach ($groups as $group)

            <tr>
            <td>{{ $group->id }}</td>
            <td>{{ $group->group_name }}</td>
            <td>{{ $group->group_number }}</td>
            <td>{{ $group->days }}</td>
            <td>{{ $group->diploma->name }}</td>
            <td>
    <div>
        @can('Edit-Group')

        <a href="{{ route('groups.edit', $group->id)}}" type="button" class="btn btn-primary">
            <i class="fas fa-edit"></i>
        </a>
        @endcan

        @can('Delete-Group')
        <a   href="#"  onclick="performDestroy({{ $group->id }} , this)" class="btn btn-danger">
            <i class="fas fa-trash-alt"></i>
        </a>
        @endcan

        {{-- <a type="button" class="btn btn-success">
            <i class="fas fa-info-circle"></i>
        </a> --}}

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
  </div>




@endsection

@section('scripts')
<script>
    function performDestroy(id, ref){
    confirmDestroy('/dashbord/groups/'+id,ref)
    // confirmDestroy
    }

</script>
@endsection
