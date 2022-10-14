<div class="modal fade" id="outsource" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Thêm chi phí thuê ngoài</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">
                    <i class="fa fa-times" aria-hidden="true" style="color: black"></i>
                </span>
            </button>
        </div>
        <div class="modal-body">
            {{ Form::open(['url' => '/admin/outsource/store']) }}
            @csrf
            @method('POST')
            <div class="OT">
                <div class="box">
                    <label class="title">
                        Tên dự án
                    </label>
                    <select id="project_name" class="content" name="project_id"></select>
                </div>
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
                        Nhân viên thuê ngoài
                    </label>
                    <select id="staff" class="content" name="staff_id"></select>
                </div>
                <div class="box">
                    <label class="title">
                        Chi phí thuê ngoài
                    </label>
                    <input type="text" class="content" name="outsource_cost">
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
