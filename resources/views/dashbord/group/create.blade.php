@extends('dashbord.parant')

@section('Title','Create Group')
@section('styles')

@endsection

@section('MainTitle','Create Group')
@section('subtitle','create group')


@section('content')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title">Creat Group</h3>
      </div>

      <!-- form start -->
      <form >
        @csrf
        <div class="card-body">
            <div class="row">
          <div class="form-group col-md-6">
            <label for="group_name">Group Name </label>
            <input type="text" class="form-control" name="group_name" id="group_name"
            placeholder="Enter Group Name">
          </div>
          {{--  --}}
          <div class="form-group col-md-6">
            <label for="group_number">Group Number </label>
            <input type="text" class="form-control" name="group_number" id="group_number"
            placeholder="Enter Group Number">
          </div>
          {{--  --}}
          </div>

            <div class="row">
            {{--  --}}
            {{-- <div class="form-group col-md-6">
            <label for="diploma_id">Name The Diploma </label>
            <select class="form-control " style="width: 100%;" id="diploma_id" name="diploma_id"
            aria-label=".form-select-sm example">
            @foreach ($diplomas as $diploma )
            <option value="{{ $diploma->id }}">{{ $diploma->name }}</option>
            @endforeach
            </select>
        </div> --}}

            <input type="text" name="diploma_id" id="diploma_id"
            value="{{$id}}" class="form-control form-control-solid" hidden/>
            {{--  --}}
        <div class="form-group col-md-6">
            <label for="days">Days </label>
            <select class="form-control " style="width: 100%;" id="days" name="days"
            aria-label=".form-select-sm example">
            <option value="Not specified">Not specified</option>
            <option value="Saturday,Monday,Wednesday">Saturday,Monday,Wednesday</option>
            <option value="Sunday,Tuesday,Thursday">Sunday Tuesday Thursday</option>
            </select>
        </div>

    </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <a href="#" onclick="preformstore()" type="button" class="btn btn-success col-1">Stor</a>
          <a   href="{{ route('groups.index') }}" type="button" class="btn btn-primary ">Return to index</a>
        </div>
      </form>
    </div>


  </div>
@endsection

@section('scripts')

<script>
    function preformstore(){
        let formData = new FormData();
        formData.append('group_name',document.getElementById('group_name').value);
        formData.append('group_number',document.getElementById('group_number').value);
        formData.append('diploma_id',document.getElementById('diploma_id').value);
        formData.append('days',document.getElementById('days').value);
        store('/dashbord/groups',formData)
    }
</script>
@endsection
