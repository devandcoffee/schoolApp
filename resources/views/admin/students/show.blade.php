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
                        {{ __('messages.students.single')}} {{$student->person->firstname}} {{$student->person->lastname}}
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
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h5 class="text-info">@lang('messages.students.docket_number'):</h5>
                                    </div>
                                    <div class="col-sm-9">
                                        <h5>{{$student->docket_number}}</h5>
                                    </div>
                                </div>
                                @include('admin.partials.person-data', array('person' => $student->person))
                            </div>
                            <div class="col-md-6">
                                <img src="{{ $student->person->avatar }}" class="img-thumbnail" alt="">
                            </div>
                        </div>
                        <br>
                        @if (!empty($student->tutor1))
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        @lang('messages.students.tutor1')
                                    </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                @include('admin.partials.person-data', array('person' => $student->tutor1->person))
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h5 class="text-info">@lang('messages.tutors.job'):</h5>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <h5>{{$student->tutor1->job}}</h5>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h5 class="text-info">@lang('messages.tutors.job_phone'):</h5>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <h5>{{$student->tutor1->job_phone}}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img src="{{ $student->tutor1->person->avatar }}" class="img-thumbnail" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(!empty($student->tutor2))
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        @lang('messages.students.tutor2')
                                    </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                @include('admin.partials.person-data', array('person' => $student->tutor2->person))
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h5 class="text-info">@lang('messages.tutors.job'):</h5>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <h5>{{$student->tutor2->job}}</h5>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h5 class="text-info">@lang('messages.tutors.job_phone'):</h5>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <h5>{{$student->tutor2->job_phone}}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img src="{{ $student->tutor2->person->avatar }}" class="img-thumbnail" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        @else
                        <div>
                            <h4>No hay tutores asignados...</h4>
                        </div>
                        @endif
                    @endslot
                @endcomponent
            </div>
            <!-- /.col-sm-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.col-sm-12 -->

@endsection
