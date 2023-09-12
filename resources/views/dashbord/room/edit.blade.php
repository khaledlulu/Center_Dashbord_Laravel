@extends('dashbord.parant')

@section('Title','Edit Room')
@section('styles')

@endsection

@section('MainTitle','Edit Room')
@section('subtitle','edit room')


@section('content')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title">Creat Room</h3>
      </div>

      <!-- form start -->
      <form >
        @csrf
        <div class="card-body">
            <div class="row">
          <div class="form-group col-md-5">
            <label for="room_number">Room Nubber </label>
            <input type="text" class="form-control" name="room_number" id="room_number"
            value="{{ $rooms->room_number }}">
          </div>

          <div class="form-group col-md-5">
            <label for="time">Time of Study </label>
            <select class="form-control " style="width: 100%;" id="time" name="time"
            aria-label=".form-select-sm example"
            value="{{ $rooms->time }}" >

                <option value="First session">09:00 - 11:00</option>
                <option value="The second session">12:00 - 02:00</option>
                <option value="Third session">03:00 - 05:00</option>
                <option value="Fourth session">05:00 - 07:00</option>
            </select>
        </div>

    </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <a href="#" onclick="preformUpdate({{ $rooms->id }})" type="button" class="btn btn-success col-1">Update</a>

        </div>
      </form>
    </div>


  </div>
@endsection

@section('scripts')
<script>
function preformUpdate(id){
    let formData = new FormData();

    formData.append('room_number',document.getElementById('room_number').value);
    formData.append('time',document.getElementById('time').value);
    storeRoute('/dashbord/update_rooms/'+ id , formData)
}
</script>
@endsection
