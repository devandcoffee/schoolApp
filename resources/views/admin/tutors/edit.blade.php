@extends('admin.layouts.dashboard')

@section('page_heading')
    @lang('messages.tutors.title')
@endsection

@section('section')
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-12">
                @component('admin.widgets.panel')
                    @slot('panelTitle')
                        @lang('messages.tutors.update')
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
                        <form class="form-horizontal" action="{{ route('tutors.update', ['tutor' => $tutor]) }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="PUT">

                            <div class="form-group">
                                <div class="col-sm-2">
                                    <img src="{{ $tutor->person->avatar }}" class="img-thumbnail" alt="">
                                </div>
                                <div class="col-sm-6">
                                    <label for="exampleInputFile">@lang('messages.persons.upload_avatar')</label>
                                    <input type="file" name="avatar" accept="image/*">
                                </div>
                            </div>
                            @include('admin.partials.form-edit-person', array('config' => $config, 'errors' => $errors, 'person' => $tutor->person))
                            <div class="form-group{{ $errors->has('job') ? ' has-error' : '' }}">
                                <label for="job" class="col-sm-2 control-label">@lang('messages.tutors.job'):</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="job" id="job" placeholder="{{ __('messages.tutors.job') }}" value="{{ $tutor->job }}">
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('job_phone') ? ' has-error' : '' }}">
                                <label for="job" class="col-sm-2 control-label">@lang('messages.tutors.job_phone'):</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="job_phone" id="job_phone" placeholder="{{ __('messages.tutors.job_phone') }}" value="{{ $tutor->job_phone }}">
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
