
@extends('backend.admin_master')

@section('title')
ManageStudent
@endsection

@section('body')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="text-center"> Manage Student </h4>
            </div>
            <div class="panel-body">

                <h4 class="text-center text-success">{{Session::get('message')}}</h4>
                {!! $dataTable->table() !!}
            </div>
        </div>
    </div>

</div>
@endsection

@section('scripts')
    
    
    {{--<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>--}}
    {{--<script src="/vendor/datatables/buttons.server-side.js"></script>--}}
    {!! $dataTable->scripts() !!}
@endsection


