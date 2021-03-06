@extends('layout.main')
@section('add')
    <div class="d-flex">
        <button type="button" class="btn btn-sm bg-white btn-icon-text border">
            <i class="mdi mdi-email btn-icon-prepend"></i> Email </button>
        <button type="button" class="btn btn-sm bg-white btn-icon-text border ml-3">
            <i class="mdi mdi-printer btn-icon-prepend"></i> Print </button>
        <button type="button" class="btn btn-sm ml-3 btn-success" name="add" id="add" data-toggle="modal"
            data-target="#add_data_Modal"> Add Services </button>
    </div>
@endsection()

@section('main-content')
    <div class="col-xl-9 stretch-card grid-margin" style="min-width: 100%">
        <div class="col-lg-6 grid-margin stretch-card" style="min-width: 100%">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Services</h4>
                    <p class="card-description"> List Services
                    </p>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Name Category</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $ser)
                                    <tr>
                                        <td>{{ $ser->id }}</td>
                                        <td id="js-table">{{ $ser->name }}</td>
                                        <td id="js-table-cate">{{ $ser->name_cate }}</td>
                                        @if ($ser->status == 1)
                                            <td><label class="badge badge-success">HOẠT ĐỘNG</label> </td>
                                        @else
                                            <td><label class="badge badge-warning">ĐÃ TẮT</label> </td>
                                        @endif
                                        <td hidden id="js-slug">{{ $ser->slug }}</td>
                                        <td>
                                            <ul class="list-inline hstack gap-2 mb-0">
                                                <li class="list-inline-item">
                                                    <a href="{{ BASE_URL }}admin/services/edit/{{ $ser->id }}"><i
                                                            class="mdi mdi-border-color" style="font-size: 20px;"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="#" data="{{ $ser->id }}" id="delete"><i
                                                            class="mdi mdi-delete"
                                                            style="color: red; font-size: 20px;"></i></a>
                                                </li>
                                            </ul>
                                        </td>


                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="add_data_Modal" class="modal fade">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div>
                        <h4 class="modal-title">Add Services</h4>
                    </div>
                    <div>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>

                </div>
                <div class="modal-body">
                    <form method="post" id="insert_form">
                        <label> Chọn Danh Mục</label>
                        <select class="form-control" id="category_id" name="category_id">
                            <option value="0">Chọn danh mục</option>
                            @foreach ($category as $cate)
                                <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                            @endforeach
                        </select>
                        <br />
                        <label>Tên dịch vụ</label>
                        <input type="text" name="name" id="name" class="form-control"
                            placeholder="VD: Tăng like fb" />
                        <br />
                        <label>Slug</label>
                        <input type="text" name="slug" id="slug" class="form-control" placeholder="VD: tang-like-fb" />
                        <br />
                        <label>Label</label>
                        <input type="text" name="lable" id="lable" class="form-control" placeholder="VD: label " />
                        <br />
                        <label>Placeholder</label>
                        <input type="text" name="placeholder" id="placeholder" class="form-control"
                            placeholder="placeholder" />
                        <br />
                        <label>Mô tả</label>
                        {{-- <input type="text" name="placeholder" id="icon"
                            placeholder="placeholder" /> --}}
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                        <br />
                        <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php
    if (isset($_SESSION['edit_success'])) {
        echo "<script type='text/javascript'>
        
        			Swal.fire({
        				position: 'center',
          	icon: 'success',
          	title: '{$_SESSION['edit_success']}',
          	showConfirmButton: false,
          	timer: 1500
        })
            </script>";
        unset($_SESSION['edit_success']);
    } else {
        unset($_SESSION['edit_success']);
    }
    ?>
    <script>
        // create
        let allDataName = document.querySelectorAll('#js-table')
        var newArray = [];
        let lengthData = allDataName.length
        for (var i = 0; i < lengthData; i++) {
            newArray.push(allDataName[i].textContent)
        }

        let allDataSlug = document.querySelectorAll('#js-slug')
        var newArraySlug = []
        let lengthSlug = allDataSlug.length
        for (var i = 0; i < lengthSlug; i++) {
            newArraySlug.push(allDataSlug[i].textContent)
        }
        console.log(newArraySlug);

        $(document).ready(function() {

            $('#insert_form').submit(function(e) {
                e.preventDefault()
                var name = $('#name').val()
                var lable = $('#lable').val()
                var category_id = $('#category_id').val()
                var placeholder = $('#placeholder').val()
                var description = $('#description').val()
                var slug = $('#slug').val()
                if (name === "" || lable === "" || category_id === "" || placeholder === "" ||
                    description === "" || slug === "" || category_id == 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Không được để trống dữ liệu',

                    })
                    return false
                } 

                if (newArray.includes(name)) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Dịch vụ đã tồn tại',

                    })
                    return false
                }
           else if (newArraySlug.includes(slug)) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Slug đã tồn tại',

                    })
                    return false
                } else {
                    $.ajax({
                        url: '{{ BASE_URL }}/admin/services/insert',
                        method: 'POST',
                        data: {
                            name: name,
                            lable: lable,
                            category_id: category_id,
                            placeholder: placeholder,
                            description: description,
                            slug: slug

                        },
                        success: function(response) {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Thêm thành công',
                                showConfirmButton: false,
                                timer: 700
                            })
                            $('#add_data_Modal').modal('hide')
                            setTimeout((function() {
                                window.location.reload();
                            }), 1000);
                        }
                    })


                }






            })

            // delete


            $(document).on('click', '#delete', function() {
                var id = $(this).attr('data');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Bạn thực sự muốn xóa nó ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ BASE_URL }}/admin/services/delete/' + id,
                            method: 'GET',
                            success: function(response) {
                                Swal.fire(
                                    'Deleted!',
                                    'Bạn đã xóa thành công',
                                    'success'
                                )
                                setTimeout((function() {
                                    window.location.reload();
                                }), 1000);

                            }
                        })

                    }
                })



            })

        });
    </script>
@endsection
