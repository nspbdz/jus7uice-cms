@extends('layout.backend')

@section('page_pretitle')

@endsection

@section('page_title')
Widget
@endsection


@section('page_nav_button')
<a href="{{url(BACKEND_PATH.'navbar.create')}}" class="btn btn-primary d-none d-sm-inline-block" data-toggle="ajaxModal" data-title="Administrator Group | Add New" data-class="modal-lg">
    Add New
</a>
@endsection 

@section('content')

<div class="row">
    <div class="col">
        <form role="form" action="{{url(BACKEND_PATH.'navbar.delete')}}" method="post" id="ajxFormDelete">
            <div class="card">
                <div class="card-body">
                    <table  class="table table-striped card-table table-vcenter text-nowrap datatable" data-processing="true" data-server-side="true" data-length-menu="[10,50,100,250]" data-ordering="true" data-col-reorder="true">
                        <!-- Your table header -->
                        <thead>
                            <tr>
                                <th data-orderable="false"><input class="form-check-input" type="checkbox" id="select-all" /></th>

                                <th width="30px"></th>
                                <th>Title</th>
                                <th>URL</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data will be loaded here via Ajax -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-danger">Disabled</button>
                @csrf
            </div>
            <hr>
        </form>

    </div>
</div>

@endsection
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

</body>

</html>
