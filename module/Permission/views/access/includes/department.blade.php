@if( in_array('Department', $hasFeatures))
    <div class="panel-group" style="margin-top:40px" id="accordion" role="tablist" aria-multiselectable="true">

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="department_collapse">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_department" aria-expanded="true" aria-controls="collapse_department">
                        <i class="short-full glyphicon glyphicon-plus"></i>
                        <span style="line-height:12px; font-size:15px; font-weight:800; letter-spacing: 1.5px"> Departments </span>
                    </a>
                </h4>
            </div>


            <div id="collapse_department" class="panel-collapse collapse" role="tabpanel" aria-labelledby="department_collapse">
                <div class="panel-body">
                    <div class="row order-type">
                        <table class="table table-bordered table-sm mx-auto" style="width:98%; margin-left:auto; margin-right:auto; color:#41B883">
                            <thead>
                                <tr>
                                    <td colspan="5">
                                        <label>
                                            <input type="checkbox" class="ace parentCheckBox">
                                            <span class="lbl" style="font-weight:800"> Select All </span>
                                        </label>
                                    </td>
                                </tr>
                            </thead>



                            <tbody>
                                @foreach ($departments->chunk(5) as $row)
                                    <tr>
                                        @foreach ($row as $id => $department)
                                            <td width="20%">
                                                <label>
                                                    @if (isset($hasDepartments))
                                                        <input name="departments[]" value="{{ $id }}" {{ in_array($department, $hasDepartments) ? 'checked' : '' }} type="checkbox" class="ace childCheckBox">
                                                    @else
                                                        <input name="departments[]" value="{{ $id }}" type="checkbox" class="ace childCheckBox">
                                                    @endif
                                                    <span class="lbl"> {{ $department }} </span>
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
@endif
