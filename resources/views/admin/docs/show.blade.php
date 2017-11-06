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
                        {{ __('messages.docs.single', ['date' => $doc->created_at->format('d-m-Y'), 'from' => $doc->person->firstname. ' ' . $doc->person->lastname, 'to' => $doc->student->person->firstname . ' ' . $doc->student->person->lastname])}}
                    @endslot
                    @slot('panelBody')
                        {!! $doc->text !!}
                    @endslot
                @endcomponent
            </div>
            <!-- /.col-sm-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.col-sm-12 -->

@endsection
