@extends('dashbord.parant')

@section('Title','Room')
@section('styles')

@endsection

@section('MainTitle','Index Room')
@section('subtitle','index room')


@section('content')






<div class="col-12">
    <div class="card">
      <div class="card-header ">

                        {{-- search form --}}
            <form action="" method="get" style="margin-bottom:2%;">
            @csrf
            <div class="row">
            <div class="input-icon col-md-2">
                <input type="text" class="form-control" placeholder="Search By Room Number"
                    name='room_number' @if( request()->room_number) value={{request()->room_number}} @endif/>
                    <span>
                        <i class="flaticon2-search-1 text-muted"></i>
                    </span>
                </div>
                {{--  --}}
            <div class="col-md-6">
                <button class="btn btn-primary btn-md" type="submit">Search</button>
                <a href="{{ route('rooms.index') }}" class="btn btn-danger btn-md" type="submit"> End Search</a>
                @can('Create-Room')
                <a href="{{ route('rooms.create') }}" type="submit" class="btn btn-success ">Add New Room</a>
                    @endcan
            </div>
        </div>
            </form>
                                {{-- End search form --}}



        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
            <thead>
            <tr>
                <th>ID</th>
                <th>Room Number</th>
                <th>Time of Study </th>
                @canAny('Edit-Room','Delete-Room')
                <th>Setting</th>
                @endcanAny
                </tr>
            </thead>
            <tbody>
            @foreach ($rooms as $room)

            <tr>
            <td>{{ $room->id }}</td>
            <td>{{ $room->room_number }}</td>
            <td>{{ $room->time }}</td>
            <td>
    <div>
        @can('Edit-Room')

        <a href="{{ route('rooms.edit', $room->id)}}" type="button" class="btn btn-primary">
            <i class="fas fa-edit"></i>
        </a>
        @endcan

            @can('Delete-Room')

            <a   href="#"  onclick="performDestroy({{ $room->id }} , this)" class="btn btn-danger">
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
    confirmDestroy('/dashbord/rooms/'+id,ref)

    }

</script>
@endsection
