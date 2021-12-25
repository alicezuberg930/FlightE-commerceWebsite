<!DOCTYPE html>
<html>

<head>
    <title>Manage Staff</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../style/admin.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <script src="../library/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="../boostrap/css/bootstrap.css">
    <script src="../boostrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../library/sweetalert2/dist/sweetalert2.min.css">
</head>

<body>
    <style>
        .sidebar__link:nth-child(2) {
            background-color: rgba(38, 107, 197, 0.5);
        }
    </style>
    <div class="containers">
        <?php require_once("Navbar.html") ?>
        <main>
            <div class="main__container">
                <div class="mt-3">
                    <form enctype="multipart/form-data" action="" method="post" id="Form">
                        <h2>Quản lí thông tin nhân viên</h2>
                        <div class="form-row mb-2">
                            <div class="col-md-4">
                                <lable>Họ tên:</lable>
                                <input class="form-control" type="text" id="Fullname">
                            </div>
                            <div class="col-md-4">
                                <lable>Email:</lable>
                                <input class="form-control" type="text" id="Email">
                            </div>
                            <div class="col-md-4">
                                <lable>Mật khẩu:</lable>
                                <input class="form-control" type="text" id="Password">
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <div class="col-md-6">
                                <lable>Số điện thoại:</lable>
                                <input class="form-control" type="text" id="Phonenumber">
                            </div>
                            <div class="col-md-6">
                                <lable>Giới tính:</lable>
                                <select id="Gender" class="form-control">
                                    <option value="Nữ">Nữ</option>
                                    <option value="Nam">Nam</option>
                                </select>
                            </div>
                        </div>
                        <button style="width: 130px;" id="Add" class="btn btn-info">Thêm</button>
                    </form>
                </div>
                <div class="card mt-5">
                    <div class="card-header">
                        <span>Thông tin nhân viên</span>
                        <div class="search-container form-control">
                            <i class="fas fa-search text-dark"></i>
                            <input id="search" class="search" placeholder="Tìm kiếm">
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover main-table">
                            <thead>
                                <th>#</th>
                                <th>Họ tên</th>
                                <th>Email</th>
                                <th>Mật khẩu</th>
                                <th>Số điện thoại</th>
                                <th>Giới tính</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
        </main>
        <?php require_once("sidebar.html"); ?>
    </div>
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Nhập thông tin cần sửa</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" class="w-100" action="" method="post" id="Form">
                        <input type="number" id="EmployeeID" hidden>
                        <div class="form-row mb-2">
                            <div class="col-md-12">
                                <lable>Họ tên:</lable>
                                <input class="form-control" type="text" id="TempFullname">
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <div class="col-md-12">
                                <lable>Email:</lable>
                                <input class="form-control" type="text" id="TempEmail">
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <div class="col-md-12">
                                <lable>Mật khẩu:</lable>
                                <input class="form-control" type="text" id="TempPassword">
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <div class="col-md-12">
                                <lable>Số điện thoại:</lable>
                                <input class="form-control" type="text" id="TempPhonenumber">
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <div class="col-md-12">
                                <lable>Giới tính:</lable>
                                <select id="TempGender" class="form-control">
                                    <option value="Nữ">Nữ</option>
                                    <option value="Nam">Nam</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-warning" id="Confirm">Cập nhật</button>
                </div>
            </div>
        </div>
    </div>
    <script src="../config/AdminResponsive.js"></script>
    <script src="../library/sweetalert2/dist/sweetalert2.min.js"></script>
    <script type="module" src="../config/ManageEmployee.js"></script>
</body>

</html>