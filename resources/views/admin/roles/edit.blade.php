<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<!-- Ant Design JS -->
<script src="https://code.iconify.design/iconify-icon/1.0.1/iconify-icon.min.js"></script>
<link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet' type='text/css'>

<div>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <section class="tile transparent">
        {{-- @foreach ($data as $data)      --}}
        {{-- {{$data->permissions_name}}
      @endforeach --}}
        <div class="role-input">
            <p class="role-input-label">Tên nhóm user</p>
            <input id="role-input-text" class="role-input-text" value="" disabled />
            <input id="role-name" class="role-input-text" value="" disabled hidden />
        </div>
        <div class="role-input">
            <p class="role-input-label role-details" style="margin-top:2%">Chi tiết quyền</p>
        </div>
        <table class="table-permission">
            <tr>
                <th>Chức năng</th>
                <th>Truy cập</th>
                <th>Thêm</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
            <tr>
                <td class="permission-name">
                    <iconify-icon icon="ant-design:user-outlined"></iconify-icon>Danh sách nhân viên
                </td>
                <td><input name="permissions[]" value="access-staff_list" type="checkbox"
                        @if (in_array('access-staff_list', $data->pluck('permissions_name')->toArray())) checked @endif>
                </td>
                <td><input name="permissions[]" value="add-staff_list" type="checkbox"
                        @if (in_array('add-staff_list', $data->pluck('permissions_name')->toArray())) checked @endif></td>
                <td><input name="permissions[]" value="edit-staff_list" type="checkbox"
                        @if (in_array('edit-staff_list', $data->pluck('permissions_name')->toArray())) checked @endif>
                </td>
                <td><input name="permissions[]" value="delete-staff_list" type="checkbox"
                        @if (in_array('delete-staff_list', $data->pluck('permissions_name')->toArray())) checked @endif>
                </td>
            </tr>
            <tr>
                <td class="permission-name">
                    <iconify-icon icon="ant-design:usergroup-add-outlined"></iconify-icon>Chi phí OT
                </td>
                <td><input name="permissions[]" value="access-ot_cost" type="checkbox"
                        @if (in_array('access-ot_cost', $data->pluck('permissions_name')->toArray())) checked @endif></td>
                <td><input name="permissions[]" value="add-ot_cost" type="checkbox"
                        @if (in_array('add-ot_cost', $data->pluck('permissions_name')->toArray())) checked @endif></td>
                <td><input name="permissions[]" value="edit-ot_cost" type="checkbox"
                        @if (in_array('edit-ot_cost', $data->pluck('permissions_name')->toArray())) checked @endif></td>
                <td><input name="permissions[]" value="delete-ot_cost" type="checkbox"
                        @if (in_array('delete-ot_cost', $data->pluck('permissions_name')->toArray())) checked @endif></td>
            </tr>
            <tr>
                <td class="permission-name">
                    <iconify-icon icon="ant-design:dollar-circle-outlined"></iconify-icon>Chi phí hành chính dự án
                </td>
                <td><input name="permissions[]" value="access-administrative_cost" type="checkbox"
                        @if (in_array('access-administrative_cost', $data->pluck('permissions_name')->toArray())) checked @endif></td>
                <td><input name="permissions[]" value="add-administrative_cost" type="checkbox"
                        @if (in_array('add-administrative_cost', $data->pluck('permissions_name')->toArray())) checked @endif></td>
                <td><input name="permissions[]" value="edit-administrative_cost" type="checkbox"
                        @if (in_array('edit-administrative_cost', $data->pluck('permissions_name')->toArray())) checked @endif></td>
                <td><input name="permissions[]" value="delete-administrative_cost" type="checkbox"
                        @if (in_array('delete-administrative_cost', $data->pluck('permissions_name')->toArray())) checked @endif></td>
            </tr>
            <tr>
                <td class="permission-name">
                    <iconify-icon icon="ant-design:dollar-circle-outlined"></iconify-icon>Chi phí thuê ngoài
                </td>
                <td><input name="permissions[]" value="access-outsource_cost" type="checkbox"
                        @if (in_array('access-outsource_cost', $data->pluck('permissions_name')->toArray())) checked @endif></td>
                <td><input name="permissions[]" value="add-outsource_cost" type="checkbox"
                        @if (in_array('add-outsource_cost', $data->pluck('permissions_name')->toArray())) checked @endif></td>
                <td><input name="permissions[]" value="edit-outsource_cost" type="checkbox"
                        @if (in_array('edit-outsource_cost', $data->pluck('permissions_name')->toArray())) checked @endif></td>
                <td><input name="permissions[]" value="delete-outsource_cost" type="checkbox"
                        @if (in_array('delete-outsource_cost', $data->pluck('permissions_name')->toArray())) checked @endif></td>
            </tr>
            <tr>
                <td class="permission-name">
                    <iconify-icon icon="ant-design:dollar-circle-outlined"></iconify-icon>Chi phí triển khai
                </td>
                <td><input name="permissions[]" value="access-deployment_cost" type="checkbox"
                        @if (in_array('access-deployment_cost', $data->pluck('permissions_name')->toArray())) checked @endif></td>
                <td><input name="permissions[]" value="add-deployment_cost" type="checkbox"
                        @if (in_array('add-deployment_cost', $data->pluck('permissions_name')->toArray())) checked @endif></td>
                <td><input name="permissions[]" value="edit-deployment_cost" type="checkbox"
                        @if (in_array('edit-deployment_cost', $data->pluck('permissions_name')->toArray())) checked @endif></td>
                <td><input name="permissions[]" value="delete-deployment_cost" type="checkbox"
                        @if (in_array('delete-deployment_cost', $data->pluck('permissions_name')->toArray())) checked @endif></td>
            </tr>
            <tr>
                <td class="permission-name">
                    <iconify-icon icon="ant-design:appstore-outlined"></iconify-icon>Dashboard
                </td>
                <td><input name="permissions[]" value="access-dashboard" type="checkbox"
                        @if (in_array('access-dashboard', $data->pluck('permissions_name')->toArray())) checked @endif>
                </td>
                <td><input name="permissions[]" value="add-dashboard" type="checkbox"
                        @if (in_array('add-dashboard', $data->pluck('permissions_name')->toArray())) checked @endif>
                </td>
                <td><input name="permissions[]" value="edit-dashboard" type="checkbox"
                        @if (in_array('edit-dashboard', $data->pluck('permissions_name')->toArray())) checked @endif>
                </td>
                <td><input name="permissions[]" value="delete-dashboard" type="checkbox"
                        @if (in_array('delete-dashboard', $data->pluck('permissions_name')->toArray())) checked @endif>
                </td>
            </tr>
            <tr>
                <td class="permission-name">
                    <iconify-icon icon="ant-design:book-outlined"></iconify-icon>Dự án
                </td>
                <td><input name="permissions[]" value="access-project" type="checkbox"
                        @if (in_array('access-project', $data->pluck('permissions_name')->toArray())) checked @endif>
                </td>
                <td><input name="permissions[]" value="add-project" type="checkbox"
                        @if (in_array('add-project', $data->pluck('permissions_name')->toArray())) checked @endif></td>
                <td><input name="permissions[]" value="edit-project" type="checkbox"
                        @if (in_array('edit-project', $data->pluck('permissions_name')->toArray())) checked @endif></td>
                <td><input name="permissions[]" value="delete-project" type="checkbox"
                        @if (in_array('delete-project', $data->pluck('permissions_name')->toArray())) checked @endif>
                </td>
            </tr>
            <tr>
                <td class="permission-name">
                    <iconify-icon icon="ant-design:setting-outlined"></iconify-icon>Quản lý user
                </td>
                <td><input name="permissions[]" value="access-user_list" type="checkbox"
                        @if (in_array('access-user_list', $data->pluck('permissions_name')->toArray())) checked @endif>
                </td>
                <td><input name="permissions[]" value="add-user_list" type="checkbox"
                        @if (in_array('add-user_list', $data->pluck('permissions_name')->toArray())) checked @endif>
                </td>
                <td><input name="permissions[]" value="edit-user_list" type="checkbox"
                        @if (in_array('edit-user_list', $data->pluck('permissions_name')->toArray())) checked @endif>
                </td>
                <td><input name="permissions[]" value="delete-user_list" type="checkbox"
                        @if (in_array('delete-user_list', $data->pluck('permissions_name')->toArray())) checked @endif>
                </td>
            </tr>
            <tr>
                <td class="permission-name">
                    <iconify-icon icon="ant-design:apartment-outlined"></iconify-icon>Phân quyền user
                </td>
                <td><input name="permissions[]" value="access-decentralization" type="checkbox"
                        @if (in_array('access-decentralization', $data->pluck('permissions_name')->toArray())) checked @endif></td>
                <td><input name="permissions[]" value="add-decentralization" type="checkbox"
                        @if (in_array('add-decentralization', $data->pluck('permissions_name')->toArray())) checked @endif></td>
                <td><input name="permissions[]" value="edit-decentralization" type="checkbox"
                        @if (in_array('edit-decentralization', $data->pluck('permissions_name')->toArray())) checked @endif></td>
                <td><input name="permissions[]" value="delete-decentralization" type="checkbox"
                        @if (in_array('delete-decentralization', $data->pluck('permissions_name')->toArray())) checked @endif></td>
            </tr>
        </table>
        {{-- @endforeach --}}
    </section>
    <div class="text-right">
    </div>
</div>
