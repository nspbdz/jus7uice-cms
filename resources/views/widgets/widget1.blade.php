@if(isset($data))
    @foreach( $data as $items )
        <input type="checkbox" class='default-checkbox'> <span>{{ $items->widget_id }}</span> &nbsp; 
    @endforeach
@endif

aasdasdasd

