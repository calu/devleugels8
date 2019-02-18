<table class="table table-hover table-bordered table-primary text-dark">
	<tbody>
	@foreach($rooms as $room)
		@include('rooms.roomdetail')
	@endforeach		
	</tbody>
</table>

