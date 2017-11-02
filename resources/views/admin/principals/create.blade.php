@extends('admin.layouts.dashboard')

@section('page_heading')
    @lang('messages.principals.title')
@endsection

@section('section')
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-12">
                @component('admin.widgets.panel')
                    @slot('panelTitle')
                         @lang('messages.principals.create')
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
                        <form class="form-horizontal" action="{{ route('principals.store') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">@lang('messages.persons.avatar'):</label>
                                <div class="col-sm-6">
                                    <label>@lang('messages.persons.upload_avatar')</label>
                                    <input type="file" name="avatar" accept="image/*">
                                </div>
                            </div>
                            @include('admin.partials.form-add-person', array('config' => $config, 'errors' => $errors))
                            <div class="form-group">
                                <label for="role" class="col-sm-2 control-label">Rol:</label>
                                <div class="col-sm-6">
                                    <select id="role" name="role" class="form-control">
                                        <option value="teacher">Profesor</option>
                                        <option value="principal">Director</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-6">
                                    <a href="{{ route('principals.index') }}" class="btn btn-default">@lang('messages.buttons.cancel')</a>
                                    <button type="submit" class="btn btn-primary">@lang('messages.buttons.create')</button>
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
