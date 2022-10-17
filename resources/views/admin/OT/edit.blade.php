<div class="modal fade" id="OT_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Sửa chi phí OT</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">
                    <i class="fa fa-times" aria-hidden="true" style="color: black"></i>
                </span>
            </button>
        </div>
        <div class="modal-body">
            {{ Form::open(['url' => '/admin/OT/update']) }}
            @csrf
            @method('PUT')
            <div class="OT">
                <input type="hidden" name="id" id="id" value="">
                <div class="box">
                    <label class="title">
                        Tháng
                    </label>
                    <input type="text" class="content time" name="startDate" id="daterangepicker"
                        startDate="{{ Carbon\Carbon::parse($startDate)->format('d/m/Y') }}"
                        endDate="{{ Carbon\Carbon::parse($endDate)->format('d/m/Y') }}">
                </div>
                <div class="box">
                    <label class="title">
                        Nhân viên
                    </label>
                    <select id="staff_edit" class="content" name="staff_id"></select>
                </div>
                <div class="box">
                    <label class="title">
                        Số giờ OT
                    </label>
                    <input type="text" class="content" name="time_OT" id="time_OT">
                </div>
                <div class="box">
                    <label class="title">
                        Chi phí OT
                    </label>
                    <input type="text" class="content" name="OT_cost" id="OT_cost">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancer</button>
                <button type="submit" class="btn btn-primary">Thêm</button>
            </div>
            {{ Form::close() }}
        </div>

    </div>
</div>
</div>
