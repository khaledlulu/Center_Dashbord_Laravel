@extends('dashbord.parant')

@section('Title','Create Diploma')
@section('styles')

@endsection

@section('MainTitle','Create Diploma')
@section('subtitle','create diploma')


@section('content')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title">Creat Diploma</h3>
      </div>

      <!-- form start -->
      <form >
        @csrf
        <div class="card-body">
            <div class="row">

                <div class="form-group col-md-4">
                    <label for="tranning_type"> Tranning Type </label>
                    <select class="form-control " style="width: 100%;" id="tranning_type" name="tranning_type"
                    aria-label=".form-select-sm example">
                    <option value="Course">Course</option>
                    <option value="Diploma">Diploma</option>
                    <option value="BootCamp">BootCamp</option>
                    </select>
                </div>
                {{--  --}}
            <div class="form-group col-md-4">
            <label for="name">Tranning Name </label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Tranning Name">
            </div>
        {{--  --}}
            <div class="form-group col-md-4">
            <label for="number_of_hours"> Number of Hours</label>
            <input type="text" class="form-control" name="number_of_hours" id="number_of_hours"
            placeholder="Enter The Number of Hours">
            </div>

        {{--  --}}
        </div>

        <div class="row">

            <div class="form-group col-md-4">
            <label for="start_date">Start Date </label>
            <input type="date" class="form-control" name="start_date" id="start_date"
            placeholder="Enter The Start Date">
            </div>
        {{--  --}}
            <div class="form-group col-md-4">
            <label for="end_date">End Date </label>
            <input type="date" class="form-control" name="end_date" id="end_date"
            placeholder="Enter The End Date">
            </div>
        {{--  --}}
            <div class="form-group col-md-4">
            <label for="degree">Degree </label>
            <input type="text" class="form-control" name="degree" id="degree"
            placeholder="Enter The Degree">
            </div>
        {{--  --}}
        </div>
        <div class="row">

            <div class="form-group col-md-4">
            <label for="price">price</label>
            <input type="text" class="form-control" name="price" id="price"
            placeholder="Enter The Price">
            </div>
            {{--  --}}
            <div class="form-group col-md-4">
                <label for="currancy"> Currancy </label>
                <select class="form-control " style="width: 100%;" id="currancy" name="currancy"
                aria-label=".form-select-sm example">
                <option value="NIS">NIS</option>
                <option value="NIS">JOD</option>
                <option value="$">USD </option>
            </select>
            </div>
            {{--  --}}


            <div class="form-group col-md-4">
            <label for="number_of_studants">Number of Studants </label>
            <input type="text" class="form-control" name="number_of_studants" id="number_of_studants"
            placeholder="Enter The Number of Studants">
            </div>
            {{--  --}}
            </div>
        <div class="row">

        <div class="form-group col-md-4">
            <label for="speciality">Speciality </label>
            <input type="text" class="form-control" name="speciality" id="speciality"
            placeholder="Enter The Speciality">
        </div>
        {{--  --}}
        <div class="form-group col-md-4">
            <label for="status">Status </label>
            <select class="form-control " style="width: 100%;" id="status" name="status"
            aria-label=".form-select-sm example">
            <option value="Not Started">Not Started</option>
            <option value="Inprogress">Inprogress</option>
            <option value="Done">Done </option>

        </select>
    </div>
    {{--  --}}
        <div class="form-group col-md-4">
            <label for="room_id">   Hall Number </label>
            <select class="form-control " style="width: 100%;" id="room_id" name="room_id"
            aria-label=".form-select-sm example">
            @foreach ($rooms as $room)
            <option value="{{$room->id}}">{{$room->room_number}}</option>
            @endforeach
        </select>
    </div>
    {{--  --}}
    </div>

    <div class="form-group col-md-8">
        <label for="description">Discription </label>
        <textarea name="description" id="description" cols="30" rows="5" class="form-control "
        placeholder="Enter The Discription"></textarea>
    </div>

    </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <a href="#" onclick="preformstore()" type="button" class="btn btn-success col-1">Stor</a>
            <a href="{{ route('diplomas.index') }}" type="button" class="btn btn-primary ">Return to index</a>
        </div>
      </form>
    </div>


  </div>
@endsection

@section('scripts')

<script>
    function preformstore(){
        let formData = new FormData();

        formData.append('tranning_type',document.getElementById('tranning_type').value);
        formData.append('name',document.getElementById('name').value);
        formData.append('number_of_hours',document.getElementById('number_of_hours').value);
        formData.append('start_date',document.getElementById('start_date').value);
        formData.append('end_date',document.getElementById('end_date').value);
        formData.append('degree',document.getElementById('degree').value);
        formData.append('price',document.getElementById('price').value);
        formData.append('currancy',document.getElementById('currancy').value);
        formData.append('number_of_studants',document.getElementById('number_of_studants').value);
        formData.append('speciality',document.getElementById('speciality').value);
        formData.append('status',document.getElementById('status').value);
        formData.append('room_id',document.getElementById('room_id').value);
        formData.append('description',document.getElementById('description').value);
        store('/dashbord/diplomas',formData)
    }
</script>
@endsection
