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
    <script src="../library/sweetalert2/dist/sweetalert2.min.js"></script>
</head>

<body>
    <style>
        .sidebar__link:nth-child(8) {
            background-color: rgba(38, 107, 197, 0.5);
        }
    </style>
    <div class="containers">
        <?php require_once("Navbar.html") ?>
        <main>
            <div class="main__container">
                <div class="mt-3">
                    <form enctype="multipart/form-data" action="../php/Plane/AddPlane.php" method="post" id="add-form">
                        <h2>Quản lí thông tin nhân viên</h2>
                        <div class="form-row mb-2">
                            <div class="col-md-4">
                                <lable>Mã máy bay:</lable>
                                <input class="form-control" type="text" id="PlaneID" name="PlaneID">
                            </div>
                            <div class="col-md-4">
                                <lable>Tên máy bay:</lable>
                                <input class="form-control" type="text" id="PlaneName" name="PlaneName">
                            </div>
                            <div class="col-md-4">
                                <lable>Số hàng:</lable>
                                <input class="form-control" type="number" id="Rows" name="Rows">
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <div class="col-md-6">
                                <lable>Số cột:</lable>
                                <input class="form-control" type="number" id="Columns" name="Columns">
                            </div>
                            <div class="col-md-6">
                                <lable>Số hàng ghế hạng sang:</lable>
                                <input class="form-control" type="number" id="BusinessRow" name="BusinessRow">
                            </div>
                        </div>
                        <button id="Add" class="btn btn-info">Thêm</button>
                    </form>
                </div>
                <div class="card mt-5">
                    <div class="card-header">
                        <span>Thông tin máy bay</span>
                        <div class="search-container form-control">
                            <i class="fas fa-search text-dark"></i>
                            <input id="search" class="search" placeholder="Tìm kiếm">
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover main-table">
                            <thead>
                                <th>Mã máy bay</th>
                                <th>Tên máy bay</th>
                                <th>Số ghế</th>
                                <th>Số hàng</th>
                                <th>Số cột</th>
                                <th>Số hàng ghế hạng sang</th>
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
    <div class="modal" id="EditModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Nhập thông tin cần sửa</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" action="" method="post" id="edit-form">
                        <input hidden type="text" id="HiddenPlaneID" name="HiddenPlaneID">
                        <div class="form-row">
                            <div class="col-md-12">
                                <lable>Mã máy bay:</lable>
                                <input class="form-control" type="text" id="PlaneIDTemp" name="PlaneID">
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <div class="col-md-12">
                                <lable>Tên máy bay:</lable>
                                <input class="form-control" type="text" id="PlaneNameTemp" name="PlaneName">
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <div class="col-md-12">
                                <lable>Số hàng:</lable>
                                <input min="0" class="form-control" type="number" id="RowsTemp" name="Rows">
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <div class="col-md-12">
                                <lable>Số cột:</lable>
                                <input min="0" class="form-control" type="number" id="ColumnsTemp" name="Columns">
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <div class="col-md-12">
                                <lable>Số hàng hạng sạng:</lable>
                                <input min="0" class="form-control" type="number" id="BusinessRowTemp" name="BusinessRow">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-danger" id="Confirm">Cập nhật</button>
                </div>
            </div>
        </div>
    </div>
    <script src="../config/AdminResponsive.js"></script>
    <script type="module" src="../config/ManagePlane.js"></script>
</body>

</html>