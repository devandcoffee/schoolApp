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
                        @lang('messages.students.list') <a href="{{ route('students.create') }}" class="btn btn-primary"><span class="fa-plus"></span></a>
                    @endslot
                    @slot('panelBody')
                        <datatable data-type="students" :config="{{ json_encode($config) }}"></datatable>
                    @endslot
                @endcomponent
            </div>
            <!-- /.col-sm-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.col-sm-12 -->

@endsection
