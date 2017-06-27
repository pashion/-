<!-- Button trigger modal -->
<button type="button" class="btn  btn-sm pull-right" data-toggle="modal" data-target="#editRoleModal-{{ $role->id }}">
  <i class='fa fa-btn fa-cog'></i>
</button>

<!-- Modal -->
<div class="modal fade" id="editRoleModal-{{ $role->id }}" tabindex="-1" role="dialog" aria-labelledby="editRoleModal-{{ $role->id }}-Label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="editRoleModal-{{ $role->id }}-Label">编辑角色</h4>
      </div>
      <div class="modal-body">
         <form method="post" action="{{url('admin/roles/update')}}">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="id" value="{{$role->id}}">
          @if ( $role->name !== 'admin' ) 
            <div class="form-group">
                <label for="exampleInputEmail1">名称:{{ $role->id }}</label>
                <input type="text" name="name" class="form-control" value="{{ $role->name }}" id="exampleInputEmail1" >
            </div>
          @endif
           

            <div class="form-group">
                <label for="exampleInputEmail1">显示名称:</label>
                <input type="text" name="display_name" value="{{ $role->display_name }}" class="form-control" id="exampleInputEmail1" >
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">描述:</label>
                <input type="text" value="{{ $role->description }}" name="description" class="form-control" placeholder="角色描述">
            </div>
          
            <div class="checkbox">
                <label>
                     
                    @foreach ($perms as $perm)
                        <label>
                        @if ( $role->hasPermission($perm->name) )
                            <input type="checkbox" name="perm[]" value="{{$perm->id}}" checked >
                        @else
                          <input type="checkbox" name="perm[]" value="{{$perm->id}}" false >
                        @endif
                            
                        {{ $perm->dispaly_name or  $perm->name }}
                        </label>
                    @endforeach
                </label>
            </div>
            <button type="submit" class="btn btn-success">编辑</button>
        </form>
      </div>
    </div>
  </div>
</div>