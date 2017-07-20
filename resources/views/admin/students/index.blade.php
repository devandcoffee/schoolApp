@extends('admin.layouts.dashboard')

@section('page_heading','Students')

@section('section')
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-12">
                @component('admin.widgets.panel')
                    @slot('panelTitle', 'Students list')
                    @slot('panelBody')
                        <datatable data-type="students" :columns="{{ json_encode($columns) }}"></datatable>
                    @endslot
                @endcomponent
            </div>
            <!-- /.col-sm-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.col-sm-12 -->

@endsection