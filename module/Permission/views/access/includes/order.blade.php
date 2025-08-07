
@if( in_array('Order Type', $hasFeatures) && class_exists('OrderType'))
    <div class="panel-group" style="margin-top:40px" id="accordion" role="tablist" aria-multiselectable="true">

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="order_type_collapse">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_order_type" aria-expanded="true" aria-controls="collapse_order_type">
                        <i class="short-full glyphicon glyphicon-plus"></i>
                        <span style="line-height:12px; font-size:15px; font-weight:800; letter-spacing: 1.5px"> Order Type </span>
                    </a>
                </h4>
            </div>


            <div id="collapse_order_type" class="panel-collapse collapse" role="tabpanel" aria-labelledby="order_type_collapse">
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
                                @foreach ($orderTypes->chunk(5) as $row)
                                    <tr>
                                        @foreach ($row as $id => $orderType)
                                            <td width="20%">
                                                <label>
                                                    @if (isset($hasOrderTypes))
                                                        <input name="order_types[]" value="{{ $id }}" {{ in_array($orderType, $hasOrderTypes) ? 'checked' : '' }} type="checkbox" class="ace childCheckBox">
                                                    @else
                                                        <input name="order_types[]" value="{{ $id }}" type="checkbox" class="ace childCheckBox">
                                                    @endif
                                                    <span class="lbl"> {{ $orderType }} </span>
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
