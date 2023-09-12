@extends('dashbord.parant')

@section('Title','Edit Diploma')
@section('styles')

@endsection

@section('MainTitle','Edit Diploma')
@section('subtitle','edit diploma')


@section('content')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title">Edit Diploma</h3>
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
                    <option selected>{{ $diplomas->tranning_type }}</option>
                    <option value="Course">Course</option>
                    <option value="Diploma">Diploma</option>
                    <option value="BootCamp">BootCamp</option>
                    </select>
                </div>
                {{--  --}}
            <div class="form-group col-md-4">
            <label for="name">Tranning Name </label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $diplomas->name }}">
            </div>
        {{--  --}}
            <div class="form-group col-md-4">
            <label for="number_of_hours"> Number of Hours</label>
            <input type="text" class="form-control" name="number_of_hours" id="number_of_hours"
            value="{{ $diplomas->number_of_hours }}">
            </div>

        {{--  --}}
        </div>

        <div class="row">

            <div class="form-group col-md-4">
            <label for="start_date">Start Date </label>
            <input type="date" class="form-control" name="start_date" id="start_date"
            value="{{ $diplomas->start_date }}">
            </div>
        {{--  --}}
            <div class="form-group col-md-4">
            <label for="end_date">End Date </label>
            <input type="date" class="form-control" name="end_date" id="end_date"
            value="{{ $diplomas->end_date }}">
            </div>
        {{--  --}}
            <div class="form-group col-md-4">
            <label for="degree">Degree </label>
            <input type="text" class="form-control" name="degree" id="degree"
            value="{{ $diplomas->degree }}">
            </div>
        {{--  --}}
        </div>
        <div class="row">

            <div class="form-group col-md-4">
            <label for="price">price</label>
            <input type="text" class="form-control" name="price" id="price"
            value="{{ $diplomas->price }}">
            </div>
            {{--  --}}
            <div class="form-group col-md-4">
                <label for="currancy"> Currancy </label>
                <select class="form-control " style="width: 100%;" id="currancy" name="currancy"
                aria-label=".form-select-sm example">
                <option selected>{{ $diplomas->currancy }}</option>
                <option value="NIS">NIS</option>
                <option value="NIS">JOD</option>
                <option value="$">USD </option>
            </select>
            </div>
            {{--  --}}


            <div class="form-group col-md-4">
            <label for="number_of_studants">Number of Studants </label>
            <input type="text" class="form-control" name="number_of_studants" id="number_of_studants"
            value="{{ $diplomas->number_of_studants }}">
            </div>
            {{--  --}}
            </div>
        <div class="row">

        <div class="form-group col-md-4">
            <label for="speciality">Speciality </label>
            <input type="text" class="form-control" name="speciality" id="speciality"
            value="{{ $diplomas->speciality }}">
        </div>
        {{--  --}}
        <div class="form-group col-md-4">
            <label for="status">Status </label>
            <select class="form-control " style="width: 100%;" id="status" name="status"
            aria-label=".form-select-sm example">
            <option selected>{{ $diplomas->status }}</option>
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
            {{-- <option selected>{{$room->room_number}}</option> --}}
            <option value="{{$room->id}} " selected>{{$room->room_number}}</option>
            @endforeach
        </select>
    </div>
    {{--  --}}
    </div>

    <div class="form-group col-md-8">
        <label for="description">Discription </label>
        <textarea name="description" id="description" cols="30" rows="5"
        class="form-control ">{{ $diplomas->description }}</textarea>
    </div>

    </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <a href="#" onclick="preformUpdate({{ $diplomas->id }})" type="button"
            class="btn btn-success col-1">Update</a>
        </div>
      </form>
    </div>


  </div>
@endsection

@section('scripts')

<script>
    function preformUpdate(id){
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
        storeRoute('/dashbord/update_diplomas/'+ id , formData)

        // storeRoute('/dashbord/update_diplomas/'+id,formData)
    }
</script>
@endsection
