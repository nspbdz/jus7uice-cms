@extends('layout.backend')

@section('page_pretitle')

@endsection

@section('page_title')
Navbar
@endsection

@section('content')
<div class="row mt-5">
	<div class="col-md-10 offset-md-1">
		<div class="card">
			<div class="card-body">
				<table id="table" class="table table-striped card-table table-vcenter text-nowrap datatable">
					<thead>
						<tr>
							<th width="30px">#</th>
							<th>Title</th>
							<th>Created At</th>
						</tr>
					</thead>
					<tbody id="tablecontents">
						@foreach($posts as $post)
						<tr class="row1" data-id="{{ $post->id }}">
							<td class="pl-3"><i class="fa fa-sort"></i></td>
							<td>{{ $post->title }}</td>
							<td>{{ date('d-m-Y h:m:s',strtotime($post->created_at)) }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<hr>
			</div>
		</div>
	</div>
</div>

@endsection
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>
<script>
	$(document).ready(function() {

		$("#table").DataTable();

		$("#tablecontents").sortable({
			items: "tr",
			cursor: 'move',
			opacity: 0.6,
			update: function() {
				sendOrderToServer();
			},
			createdRow: function (row, data, dataIndex) {
            $(row).addClass('row1');
            $(row).attr('data-id', data.id);
        }
		});


		function sendOrderToServer() {
			console.log('change')
			var order = [];
			var token = $('meta[name="csrf-token"]').attr('content');
			$('tr.row1').each(function(index, element) {
				order.push({
					id: $(this).attr('data-id'),
					position: index + 1
				});
			});

			$.ajax({
				type: "POST",
				dataType: "json",
				url: "{{ url(BACKEND_PATH.'post-sortable') }}",
				data: {
					order: order,
					_token: token
				},
				success: function(response) {
					if (response.status == "success") {
						console.log(response, 'success');
					} else {
						console.log(response);
					}
				}
			});
		}
	});
</script>
</body>

</html>