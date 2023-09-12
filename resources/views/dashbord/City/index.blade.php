@extends('dashbord.parant')

@section('Title','City')
@section('styles')

@endsection

@section('MainTitle','Index City')
@section('subtitle','index city')


@section('content')






<div class="col-12">
    <div class="card">
        <div class="card-header ">
                    {{-- search form --}}
            <form action="" method="get" style="margin-bottom:2%;">
            @csrf
            <div class="row">
            <div class="input-icon col-md-2">
                <input type="text" class="form-control" placeholder="Search By City Name"
                    name='name' @if( request()->name) value={{request()->name}} @endif/>
                    <span>
                        <i class="flaticon2-search-1 text-muted"></i>
                    </span>
                </div>
                {{--  --}}
                <div class="input-icon col-md-2">
                <input type="text" class="form-control" placeholder="Search By Street Name "
                    name='street' @if( request()->street) value={{request()->street}} @endif/>
                    <span>
                        <i class="flaticon2-search-1 text-muted"></i>
                    </span>
                </div>
                {{--  --}}
            <div class="col-md-6">
                <button class="btn btn-primary btn-md" type="submit">Search</button>
                <a href="{{ route('cities.index') }}" class="btn btn-danger btn-md" type="submit"> End Search</a>
                @can('Create-City')
                <a href="{{ route('cities.create') }}" type="submit" class="btn btn-success ">Add New City</a>
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
                <th>City Name</th>
                <th>Street Name</th>
                @canAny('Edit-City','Delete-City')
                <th>Setting</th>
                @endcanAny
            </tr>
            </thead>
            <tbody>
            @foreach ($cities as $city)

            <tr>
              <td>{{ $city->id }}</td>
              <td>{{ $city->name }}</td>
              <td>{{ $city->street }}</td>

                <td>
                    <div class="btn-group">
                @can('Edit-City')
            <a href="{{ route('cities.edit', $city->id)}}" type="button" class="btn btn-primary">
                <i class="fas fa-edit"></i>
            </a>
            @endcan
            @can('Delete-City')

            <form action="{{ route('cities.destroy',$city->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button  type="submit" class="btn btn-danger">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </form>
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
    {{ $cities->links() }}
  </div>




@endsection

@section('scripts')

@endsection
