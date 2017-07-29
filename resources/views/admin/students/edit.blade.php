@extends('admin.layouts.dashboard')

@section('page_heading','Students')

@section('section')
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-12">
                @component('admin.widgets.panel')
                    @slot('panelTitle', 'Update student data')
                    @slot('panelBody')
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="form-horizontal" action="{{ route('students.update', ['id' => $student->id]) }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="PUT">

                            <div class="form-group">
                                <div class="col-sm-2">
                                    <img src="{{ $student->person->avatar }}" class="img-thumbnail" alt="">
                                </div>
                                <div class="col-sm-6">
                                    <label for="exampleInputFile">Upload photo</label>
                                    <input type="file" name="avatar" accept="image/*">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dni" class="col-sm-2 control-label">DNI:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="identity_id" id="identity_id" placeholder="DNI" value="{{$student->person->identity_id}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="firstname" class="col-sm-2 control-label">Fistname:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Fistname" value="{{$student->person->firstname}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="lastname" class="col-sm-2 control-label">Lastname:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Lastname" value="{{$student->person->lastname}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">Email:</label>
                                <div class="col-sm-6">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{$student->person->email}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Gender:</label>
                                <div class="col-sm-6">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="gender" value="male" {{$student->person->gender == 'male' ? 'checked' : ''}}>Male
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="gender" value="female" {{$student->person->gender == 'female' ? 'checked' : ''}}>Female
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="birthdate" class="col-sm-2 control-label">Birthdate:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="birthdate" id="birthdate" placeholder="Birthdate" value="{{$student->person->birthdate}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="location" class="col-sm-2 control-label">Location</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="location" id="location" placeholder="Location" value="{{$student->person->location}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-6">
                                    <a href="{{ route('students') }}" class="btn btn-default">Cancel</a>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    @endslot
                @endcomponent
            </div>
            <!-- /.col-sm-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.col-sm-12 -->

@endsection