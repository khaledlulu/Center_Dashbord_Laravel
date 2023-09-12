@extends('dashbord.parant')

@section('Title','Edit Group')
@section('styles')

@endsection

@section('MainTitle','Edit Group')
@section('subtitle','edit group')


@section('content')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title">Edit Group</h3>
      </div>

      <!-- form start -->
      <form >
        @csrf
        <div class="card-body">
            <div class="row">
          <div class="form-group col-md-6">
            <label for="group_name">Group Name </label>
            <input type="text" class="form-control" name="group_name" id="group_name"
            value="{{ $groups->group_name }}">
          </div>
          {{--  --}}
          <div class="form-group col-md-6">
            <label for="group_number">Group Number </label>
            <input type="text" class="form-control" name="group_number" id="group_number"
            value="{{ $groups->group_number }}">
          </div>
          {{--  --}}
          </div>

          <div class="row">
            {{--  --}}
          <div class="form-group col-md-6">
            <label for="diploma_id">Name The Diploma </label>
            <select class="form-control " style="width: 100%;" id="diploma_id" name="diploma_id"
            aria-label=".form-select-sm example">
            @foreach ($diplomas as $diploma )
            <option value="{{ $diploma->id }}" selected>{{ $diploma->name }}</option>
            @endforeach
            </select>
        </div>
        {{--  --}}
          <div class="form-group col-md-6">
            <label for="days">Days </label>
            <select class="form-control " style="width: 100%;" id="days" name="days"
            aria-label=".form-select-sm example">
            <option selected>{{ $groups->days }}</option>
            <option value="Not specified">Not specified</option>
            <option value="Saturday,Monday,Wednesday">Saturday,Monday,Wednesday</option>
            <option value="Sunday,Tuesday,Thursday">Sunday Tuesday Thursday</option>
            </select>
        </div>

    </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <a href="#" onclick="preformUpdate({{ $groups->id }})" type="button" class="btn btn-success col-1">Update</a>
        </div>
      </form>
    </div>


  </div>
@endsection

@section('scripts')

<script>
    function preformUpdate(id){
        let formData = new FormData();
        formData.append('group_name',document.getElementById('group_name').value);
        formData.append('group_number',document.getElementById('group_number').value);
        formData.append('diploma_id',document.getElementById('diploma_id').value);
        formData.append('days',document.getElementById('days').value);
        storeRoute('/dashbord/update_groups/'+id,formData)
    }
</script>
@endsection
