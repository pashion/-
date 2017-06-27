{{--修改的引入弹窗--}}
<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal{{$v->id}}" style="height:30px;width:30px;">
    E
</button>

<!-- Modal -->
<div class="modal fade" id="myModal{{$v->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{url('SecoundType/')}}/{{$v->id}} " method="post">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input type="hidden" name="id" value="{{$v->id}}">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">当前类名:{{$v->name}}</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">revise:</label>
                        <input type="text" class="form-control" id="recipient-name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">sort:</label>
                        <input type="text" name="sort" class="form-control" value="{{$v->sort}}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Save changes">
                </div>
            </form>
        </div>
    </div>
</div>