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
                        @lang('messages.principals.list') <a href="{{ route('principals.create') }}" class="btn btn-primary"><span class="fa-plus"></span></a>
                    @endslot
                    @slot('panelBody')
                        <datatable data-type="principals" :config="{{ json_encode($config) }}"></datatable>
                    @endslot
                @endcomponent
            </div>
            <!-- /.col-sm-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.col-sm-12 -->

@endsection
