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
                        @if(empty($student->tutor1))
                        <a href="{{ route('tutors.create', ['student' => $student->id]) }}" class="btn btn-primary">
                            @lang('messages.buttons.add_tutors')
                        </a>
                        @endif
                        @if(!empty($student->tutor1))
                        <a href="{{ route('tutors.edit', ['student' => $student->id, 'tutor' => 1]) }}" class="btn btn-primary">
                            @lang('messages.buttons.edit_tutor', ['num' => 1])
                        </a>
                        @endif
                        @if(!empty($student->tutor2))
                        <a href="{{ route('tutors.edit', ['student' => $student->id, 'tutor' => 2]) }}" class="btn btn-primary">
                            @lang('messages.buttons.edit_tutor', ['num' => 2])
                        </a>
                        @endif
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
                            <div class="form-group{{ $errors->has('docket_number') ? ' has-error' : '' }}">
                                <label for="dni" class="col-sm-2 control-label">@lang('messages.students.docket_number'):</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="docket_number" id="docket_number" placeholder="{{ __('messages.students.docket_number') }}" value="{{ $student->docket_number }}">
                                </div>
                            </div>
                            @include('admin.partials.form-edit-person', array('config' => $config, 'errors' => $errors, 'person' => $student->person))
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
