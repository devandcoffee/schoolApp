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
                        {{ __('messages.principals.single')}} {{$principal->person->firstname}} {{$principal->person->lastname}}
                    @endslot
                    @slot('panelBody')
                        <div class="row">
                            <div class="col-md-6">
                                @include('admin.partials.person-data', array('person' => $principal->person))
                            </div>
                            <div class="col-md-6">
                                <img src="{{ $principal->person->avatar }}" class="img-thumbnail" alt="">
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
