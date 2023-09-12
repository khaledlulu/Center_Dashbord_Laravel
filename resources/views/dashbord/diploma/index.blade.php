@extends('dashbord.parant')

@section('Title','Diploma')
@section('styles')

@endsection

@section('MainTitle','Index Diploma')
@section('subtitle','index diploma')


@section('content')






<div class="col-12">
    <div class="card">
      <div class="card-header">
        {{-- <h3 class="card-title"> Table Diploma</h3> --}}

        <form action="" method="get" style="margin-bottom:2%;">
            @csrf
            <div class="row">
            <div class="input-icon col-md-2">
                <input type="text" class="form-control" placeholder="Search By Tranning Name"
                    name='name' @if( request()->name) value={{request()->name}} @endif/>
                    <span>
                        <i class="flaticon2-search-1 text-muted"></i>
                    </span>
                </div>
                {{--  --}}
                <div class="input-icon col-md-2">
                <input type="text" class="form-control" placeholder="Search By Tranning Type "
                    name='tranning_type' @if( request()->tranning_type) value={{request()->tranning_type}} @endif/>
                    <span>
                        <i class="flaticon2-search-1 text-muted"></i>
                    </span>
                </div>
                {{--  --}}
                <div class="input-icon col-md-2">
                <input type="text" class="form-control" placeholder="Search By Status"
                    name='status' @if( request()->status) value={{request()->status}} @endif/>
                    <span>
                        <i class="flaticon2-search-1 text-muted"></i>
                    </span>
                </div>
            <div class="col-md-6">
                <button class="btn btn-primary btn-md" type="submit">Search</button>
                <a href="{{ route('diplomas.index') }}" class="btn btn-danger btn-md" type="submit"> End Search</a>
                @can('Create-Diploma')
                <a href="{{ route('diplomas.create') }}" type="submit" class="btn btn-success ">Add New Diploma</a>
                    @endcan
            </div>
        </div>
            </form>


      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
              {{-- <th>ID</th> --}}
              <th>Tranning Name</th>
              <th>Tranning Type</th>
              <th>Price</th>
              <th> Date</th>
              <th>Group Count</th>
              <th>Status</th>
              @canAny('Edit-Diploma','Delete-Diploma')
              <th>Setting</th>
              @endcanAny
            </tr>
          </thead>
          <tbody>
            @foreach ($diplomas as $diploma)

            <tr>
            {{-- <td>{{ $diploma->id }}</td> --}}
            <td>{{ $diploma->name }}</td>
            <td>{{ $diploma->tranning_type }}</td>
            <td>{{ $diploma->price }}</td>
            <td>{{ $diploma->start_date.' To '.$diploma->end_date  }}</td>
            <td><a href="{{route('indexGroup',['id'=>$diploma->id])}}"
                class="btn btn-info">({{$diploma->groups_count}})
                Group/s</a> </td>
            {{-- <td>{{ }}</td> --}}
            <td>{{ $diploma->status }}</td>
            <td>
    <div>
        @can('Edit-Diploma')

        <a href="{{ route('diplomas.edit', $diploma->id )}}" type="button" class="btn btn-primary">
            <i class="fas fa-edit"></i>
        </a>
        @endcan

        @can('Delete-Diploma')

        <a   href="#"  onclick="performDestroy({{ $diploma->id }} , this)" class="btn btn-danger">
            <i class="fas fa-trash-alt"></i>
        </a>
        @endcan

        @can('Show-Diploma')
        <a  href="{{ route('diplomas.show', $diploma->id ) }}" type="button" class="btn btn-success">
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
  </div>




@endsection

@section('scripts')
<script>
    function performDestroy(id, ref){
    confirmDestroy('/dashbord/diplomas/'+id,ref)
    // confirmDestroy
    }

</script>
@endsection
