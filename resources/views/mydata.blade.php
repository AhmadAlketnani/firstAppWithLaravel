<form action="{{ route('receive') }}" method="post">
{{ csrf_field() }}
<input type="submit" value="sendData">
</form>
