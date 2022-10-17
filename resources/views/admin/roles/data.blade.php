    <div class="table_box" style="padding-right: 0px;">
        <table class="table" style="width:75%">
            <thead>
                <tr>
                    <th class="title" style="width:5%"><input type="checkbox" id="checkAll"> </th>
                    <th class="title" style="width:5%">STT</th>
                    <th class="title" style="width:55%">Tên nhóm quyền</th>
                    <th class="title" style="width:35%">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php $page = $roles->currentPage();
                $index = ($page - 1) * $roles->perPage(); ?>
                @foreach ($roles as $role)
                    <?php $index++; ?>
                    <tr class="content">
                        <td><input type="checkbox" id="checkEach" name='checkEach' value="/role/del/{{ $role->id }}"> </td>
                        <td style="border: 1px solid #E9EDF4" class="text-center">{{ $index }}</td>
                        <td style="border: 1px solid #E9EDF4" class="text-center">{{ $role->display_name }}</td>
                        <td style="border: 1px solid #E9EDF4" class="text-center">
                            <button data-name="{{ $role->name }}" data-display_name="{{ $role->display_name }}"
                                data-attr="/role/edit/{{ $role->name }}" id="edit-role"><i class="fa fa-pencil"
                                    aria-hidden="true"></i></button>
                            <button data-id="{{ $role->id }}" data-attr="/role/del/{{ $role->id }}"
                                id="del-role"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <input id="current_page" value={{ $roles->currentPage() }} hidden>
        <div id="pagination_all">
            {{ $roles->links('pagination::bootstrap-4') }}
        </div>
        <div id="pagination_search" class="hidden">
            {{ $roles->links('pagination::bootstrap-4') }}
        </div>
        <div class="text-right">
        </div>
    </div>
