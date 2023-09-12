@extends('layout.backend')

@section('page_pretitle')

@endsection

@section('page_title')
Navbar
@endsection

@section('content')

<div class="row">
  <div class="col">
    <form role="form" action="{{url(BACKEND_PATH.'article.delete')}}" method="post" id="ajxFormDelete">
      <div class="card">
        <div class="card-body">
          <table id="dokumen" class="table table-striped card-table table-vcenter text-nowrap datatable" data-processing="true" data-server-side="true" data-length-menu="[50,100,250]" data-ordering="true" data-col-reorder="true">
            <!-- Your table header -->
            <thead>
              <tr>
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

      <hr>
    </form>

  </div>
</div>

@endsection

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>
<script>
  $(document).ready(function() {
    var table = $('#dokumen').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
        url: "{{ url(BACKEND_PATH.'navbar.data') }}",
      },
      columns: [{
          data: 'DT_Row_Index',
          name: 'DT_Row_Index',
          orderable: false,
          searchable: false
        },

        {
          data: 'title',
          name: 'title'
        },
        {
          data: 'url',
          name: 'url'
        },
        {
          data: 'status',
          name: 'status'
        },

        {
          data: 'action',
          name: 'action',
          orderable: false,
          searchable: false
        }
      ],
      // Callback function after the DataTable is initialized
      initComplete: function() {
        // Make the table rows sortable
        $('#dokumen tbody').sortable({
          items: 'tr',
          cursor: 'move',
          opacity: 0.6,
          update: function() {
            sendOrderToServer();
          }
        }).disableSelection();
      }
    });

    function sendOrderToServer() {
      var order = [];
      var token = $('meta[name="csrf-token"]').attr('content');
      $('tr').each(function(index, element) {
        order.push({
          id: $(this).attr('data-id'),
          position: index + 1
        });
      });

      $.ajax({
        type: "POST",
        dataType: "json",
        url: "{{url(BACKEND_PATH.'navbar.post-sortable')}}",
        data: {
          order: order,
          _token: token
        },
        success: function(response) {
          if (response.status == "success") {
            console.log(response);
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