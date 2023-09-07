<table cellspacing="0" cellpadding="10">
    <thead>
    <tr>
        <th>Tanggal</th>
		<th>Method</th>
		<th>URL</th>
		<th>IP</th>
		<th>Username</th>
    </tr>
    </thead>
	
	
    <tbody>
    @foreach($data as $row)
        <tr>
			<th>{{$row->created_at}}</th>
			<th>{{$row->method}}</th>
			<th>{{$row->url}}</th>
			<th>{{$row->ip}}</th>
			<th>{{$row->user_name}}</th>
        </tr>
    @endforeach
    </tbody>
</table>
