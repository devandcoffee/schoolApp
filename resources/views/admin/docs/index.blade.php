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
                        @lang('messages.docs.list') <a href="{{ route('docs.create') }}" class="btn btn-primary"><span class="fa-plus"></span></a>
                    @endslot
                    @slot('panelBody')
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Editor</th>
                                    <th>Destinatario</th>
                                    <th>Fecha</th>
                                    <th>Ver</th>
                                    <th>Editar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($docs as $doc)
                                    <tr>
                                        <td>{{ $doc->id }}</td>
                                        <td>{{ $doc->person->firstname }} {{ $doc->person->lastname }}</td>
                                        <td>{{ $doc->student->person->firstname }} {{ $doc->student->person->lastname }}</td>
                                        <td>{{ $doc->created_at->format('d-m-Y') }}</td>
                                        <td><a href="{{ route('docs.show', ['doc' => $doc->id]) }}"><span class="fa-eye"></span></a></td>
                                        <td><a href="{{ route('docs.edit', ['doc' => $doc->id]) }}"><span class="fa-pencil"></span></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $docs->links() }}
                    @endslot
                @endcomponent
            </div>
            <!-- /.col-sm-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.col-sm-12 -->

@endsection
