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

                            <div class="form-group{{ $errors->has('docket_number') ? ' has-error' : '' }}">
                                <div class="col-sm-6">
                                    <autocomplete entity="autocomplete"></autocomplete>
                                </div>
                            </div>

                            <textarea name="text" id="editor">
                            </textarea>
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
