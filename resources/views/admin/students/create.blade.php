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
                         @lang('messages.students.create')
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
                        <form class="form-horizontal" action="{{ route('students.store') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @include('admin.partials.form-add-person', array('person' => 'person', 'config' => $config, 'errors' => $errors))
                            <br>
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            @lang('messages.tutors.create', ['num' => 1])
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse{{ count($errors->get('tutor1.person.*')) > 0 ? ' in' : '' }}" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                        @include('admin.partials.form-add-person', array('person' => 'tutor1[person]', 'config' => $config, 'errors' => $errors))
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            @lang('messages.tutors.create', ['num' => 2])
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse{{ count($errors->get('tutor2.person.*')) > 0 ? ' in' : '' }}" role="tabpanel" aria-labelledby="headingTwo">
                                        <div class="panel-body">
                                        @include('admin.partials.form-add-person', array('person' => 'tutor2[person]', 'config' => $config, 'errors' => $errors))
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-6">
                                    <a href="{{ route('students') }}" class="btn btn-default">@lang('messages.buttons.cancel')</a>
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
