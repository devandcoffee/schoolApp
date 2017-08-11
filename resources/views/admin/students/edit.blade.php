@extends('admin.layouts.dashboard')

@section('page_heading')
    @lang('messages.students.title')
@endsection

@section('section')
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-12">
                @component('admin.widgets.panel')
                    @slot('panelTitle')
                        @lang('messages.students.update')
                    @endslot
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
                                    <label for="exampleInputFile">@lang('messages.persons.upload_avatar')</label>
                                    <input type="file" name="avatar" accept="image/*">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dni" class="col-sm-2 control-label">@lang('messages.persons.identity_id'):</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="identity_id" id="identity_id" placeholder="{{ __('messages.persons.identity_id') }}" value="{{$student->person->identity_id}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="firstname" class="col-sm-2 control-label">@lang('messages.persons.firstname'):</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="firstname" id="firstname" placeholder="{{ __('messages.persons.firstname') }}" value="{{$student->person->firstname}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="lastname" class="col-sm-2 control-label">@lang('messages.persons.lastname'):</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="{{ __('messages.persons.lastname') }}" value="{{$student->person->lastname}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">@lang('messages.persons.email'):</label>
                                <div class="col-sm-6">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="{{ __('messages.persons.email') }}" value="{{$student->person->email}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">@lang('messages.persons.gender'):</label>
                                <div class="col-sm-6">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="gender" value="male" {{$student->person->gender == 'male' ? 'checked' : ''}}>@lang('messages.persons.genders.male')
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="gender" value="female" {{$student->person->gender == 'female' ? 'checked' : ''}}>@lang('messages.persons.genders.female')
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="birthdate" class="col-sm-2 control-label">@lang('messages.persons.birthdate'):</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control datepicker" name="birthdate" id="birthdate" placeholder="{{ __('messages.persons.birthdate') }}" value="{{$student->person->birthdate->format('d-m-Y')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="location" class="col-sm-2 control-label">@lang('messages.persons.location')</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="location" id="location" placeholder="{{ __('messages.persons.location') }}" value="{{$student->person->location}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-6">
                                    <a href="{{ route('students') }}" class="btn btn-default">@lang('messages.buttons.cancel')</a>
                                    <button type="submit" class="btn btn-primary">@lang('messages.buttons.update')</button>
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
