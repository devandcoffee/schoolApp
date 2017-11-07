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
                        @lang('messages.docs.update')
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
                        <form class="form-horizontal" action="{{ route('docs.update', ['doc' => $doc->id]) }}" method="POST">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="PUT">

                            <div class="form-group{{ $errors->has('student_id') ? ' has-error' : '' }}">
                                <div class="col-sm-6">
                                    <autocomplete entity="autocomplete" student="{{ json_encode($student) }}"></autocomplete>
                                </div>
                            </div>

                            <textarea name="text" id="editor">
                                {{ $doc->text }}
                            </textarea>
                            <br>
                            <div class="form-group">
                                <div class="col-sm-6">
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
