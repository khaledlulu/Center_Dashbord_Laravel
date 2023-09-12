@extends('dashbord.parant')

@section('Title','Create Room')
@section('styles')

@endsection

@section('MainTitle','Create Room')
@section('subtitle','create room')


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
            <label for="room_number">Room Number </label>
            <input type="text" class="form-control" name="room_number" id="room_number" placeholder="Enter Room Number">
          </div>

          <div class="form-group col-md-5">
            <label for="time">Time of Study </label>
            <select class="form-control " style="width: 100%;" id="time" name="time"
            aria-label=".form-select-sm example">

            <option value="09:00 Am - 11:00 Am">09:00 Am - 11:00 Am</option>
            <option value="12:00 Pm - 02:00 Pm">12:00 Pm - 02:00 Pm</option>
            <option value="03:00 Pm - 05:00 Pm">03:00 Pm - 05:00 Pm</option>
            <option value="05:00 Pm - 07:00 Pm">05:00 Pm - 07:00 Pm</option>
            </select>
        </div>

    </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <a href="#" onclick="preformstore()" type="button" class="btn btn-success col-1">Stor</a>
          <a   href="{{ route('rooms.index') }}" type="button" class="btn btn-primary ">Return to index</a>
        </div>
      </form>
    </div>


  </div>
@endsection

@section('scripts')

<script>
    function preformstore(){
        // let formData = new formData();
        let formData = new FormData();

        formData.append('room_number',document.getElementById('room_number').value);
        formData.append('time',document.getElementById('time').value);
        store('/dashbord/rooms',formData)
    }
</script>
@endsection
