<form action="{{url('admin/roles/delete')}}" method="post">
  	<input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="hidden" name="id" value="{{$role->id}}">
	<button type="submit" class="btn btn-sm pull-right">
		<i class="fa fa-btn fa-close"></i>
	</button>
</form>