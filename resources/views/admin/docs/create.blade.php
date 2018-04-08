@extends('admin.layouts.dashboard')

@section('page_heading')
    @lang('messages.docs.title')
@endsection

@section('section')
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-12">
                @component('admin.widgets.panel')
                    @slot('panelTitle')
                         @lang('messages.docs.create')
                    @endslot
                    @slot('panelBody')
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form id="form-doc" class="form-horizontal" action="{{ route('docs.store') }}" method="post">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('student_id') ? ' has-error' : '' }}">
                                <div class="col-sm-4">
                                    <autocomplete entity="autocomplete" student="{{ json_encode([]) }}"></autocomplete>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('created_at') ? ' has-error' : '' }}">
                                <div class="col-sm-4">
                                    <label for="created_at">@lang('messages.docs.created_at'):</label>
                                    <input type="text" class="form-control datepicker" name="created_at" id="created_at" placeholder="{{ __('messages.docs.created_at') }}" value="{{ old('created_at') }}">
                                </div>
                            </div>

                            <textarea name="text" id="editor"></textarea>
                            <br>
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <a href="{{ route('docs.index') }}" class="btn btn-default">@lang('messages.buttons.cancel')</a>
                                    <button type="submit" class="btn btn-primary" @keypress.enter.prevent="onKeyPress">@lang('messages.buttons.create')</button>
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
