@foreach ($roles as $role)
    <div class="col-md-4">
        <div class="panel {{ $role->name == 'admin'?'panel-danger':'panel-info'}}">
            <div class="panel-heading">
            <div class="pull-left">
                 <i class="fa fa-btn fa-user"></i>
                {{ $role->label or $role->name }}
            </div>
                    @include('auth.roles._deleteForm')

                    @include('auth.roles._editRoleModal')


               <div class="clearfix"></div>
            </div>
            <div class="panel-body">
                <ul class="da-ul">
                    @foreach( $perms as $perm )
                        <li><i class="fa fa-btn fa-tag"></i>
                            {{ $perm->label or $perm->name }}</li>
                    @endforeach
                </ul>
            </div>
            @if($role->description)
                <div class="panel-footer">
                    {{ $role->description }}
                </div>
            @endif
        </div>
    </div>  
@endforeach
