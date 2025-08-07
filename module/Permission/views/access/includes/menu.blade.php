<div class="access-control">
    <ul style="list-style:none" class="list-group">
        @foreach ($modules as $index => $module)
            <li class="list-group-item">
                <label>
                    <input type="checkbox" class="ace module-checkbox-control">
                    <span class="lbl" style="font-size:16px !important"> {{ $module->name }} </span>
                </label>
                @foreach ($module->submodules as $submodule)
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading{{ $submodule->id }}">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $submodule->id }}" aria-expanded="true" aria-controls="collapse{{ $submodule->id }}">
                                        <i class="short-full glyphicon glyphicon-plus"></i>
                                        <span style="font-size:14px !important">{{ $submodule->name }}</span>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse{{ $submodule->id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{ $submodule->id }}">
                                <div class="panel-body">
                                    <div class="row order-type" style="margin-top:10px">
                                        <table class="table table-striped table-sm mx-auto" style="width:98%; margin-left:auto; margin-right:auto; color:#41B883" >
                                            <thead>
                                                <tr  style="border:none !important">
                                                    <td colspan="9" style="border:none !important">
                                                        <label>
                                                            <input type="checkbox" class="ace parentCheckBox">
                                                            <span class="lbl" style="font-weight:800"> Select All </span>
                                                        </label>
                                                    </td>
                                                </tr>
                                            </thead>

                                            <tbody>

                                                @foreach ($submodule->parent_permissions as $in => $parent_permissions)
                                                    <tr>
                                                        @foreach ($parent_permissions->permissions as $permission)
                                                            <td style="border:none !important">
                                                                <label>
                                                                    @if (isset($isPermitted))
                                                                    <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" {{ in_array($permission->slug, $isPermitted) ? 'checked' : '' }} class="ace {{ $loop->first ? ' childCheckBox module_row' : 'childCheckBox rowChildCheckBox' }}">
                                                                    @else
                                                                    <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" class="ace {{ $loop->first ? ' childCheckBox module_row' : 'childCheckBox rowChildCheckBox' }}">
                                                                    @endif
                                                                    <span class="lbl"> {{ $permission->name }} </span>
                                                                </label>
                                                            </td>
                                                        @endforeach
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                @endforeach
            </li>
        @endforeach
    </ul>




    <!-- actions -->
    <div class="form-group pull-right" style="margin-top:14px">
        <button class="btn  btn-sm btn-success"> <i class="fa fa-save"></i> Save</button>
        <a href="{{ route('permissions.index') }}" class="btn btn-sm  btn-info"> <i class="fa fa-list"></i> List </a>
    </div>
</div>