@extends('admin.layouts.dashboard')

@section('page_heading','Students')

@section('section')
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-12">
                @component('admin.widgets.panel')
                    @slot('panelTitle')
                        Student list <a href="{{ route('students.create') }}" class="btn btn-primary"><span class="fa-plus"></span></a>
                    @endslot
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