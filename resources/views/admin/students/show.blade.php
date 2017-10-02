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
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h5 class="text-info">@lang('messages.persons.identity_id'):</h5>
                                    </div>
                                    <div class="col-sm-9">
                                        <h5>{{$student->person->identity_id}}</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h5 class="text-info">@lang('messages.persons.firstname'):</h5>
                                    </div>
                                    <div class="col-sm-9">
                                        <h5>{{$student->person->firstname}}</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h5 class="text-info">@lang('messages.persons.lastname'):</h5>
                                    </div>
                                    <div class="col-sm-9">
                                        <h5>{{$student->person->lastname}}</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h5 class="text-info">@lang('messages.persons.email'):</h5>
                                    </div>
                                    <div class="col-sm-9">
                                        <h5>{{$student->person->email}}</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h5 class="text-info">@lang('messages.persons.gender'):</h5>
                                    </div>
                                    <div class="col-sm-9">
                                        <h5>{{$student->person->gender == 'male' ? __('messages.persons.genders.male') : __('messages.persons.genders.female')}}</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h5 class="text-info">@lang('messages.persons.birthdate'):</h5>
                                    </div>
                                    <div class="col-sm-9">
                                        <h5>{{$student->person->birthdate->format('d-m-Y')}}</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h5 class="text-info">@lang('messages.persons.address'):</h5>
                                    </div>
                                    <div class="col-sm-9">
                                        <h5>{{$student->person->address}}</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h5 class="text-info">@lang('messages.persons.country'):</h5>
                                    </div>
                                    <div class="col-sm-9">
                                        <h5>{{$student->person->country->name}}</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h5 class="text-info">@lang('messages.persons.city'):</h5>
                                    </div>
                                    <div class="col-sm-9">
                                        <h5>{{$student->person->city->name}}</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h5 class="text-info">@lang('messages.persons.mobile_phone'):</h5>
                                    </div>
                                    <div class="col-sm-9">
                                        <h5>{{$student->person->mobile_phone}}</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h5 class="text-info">@lang('messages.persons.home_phone'):</h5>
                                    </div>
                                    <div class="col-sm-9">
                                        <h5>{{$student->person->home_phone}}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <img src="{{ $student->person->avatar }}" class="img-thumbnail" alt="">
                            </div>
                        </div>
                    @endslot
                @endcomponent
            </div>
            <!-- /.col-sm-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.col-sm-12 -->

@endsection
