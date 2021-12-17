<!DOCTYPE html>
<html>

<head>
    <title>Manage Flight</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../style/admin.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <script src="../library/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="../boostrap/css/bootstrap.css">
    <script src="../boostrap/js/bootstrap.min.js"></script>
</head>

<body>
    <style>
        button {
            width: 130px;
        }

        option {
            background-color: aliceblue;
        }

        #Edit,
        #Delete {
            width: 60px;
        }

        .card-body {
            word-break: break-all;
        }
    </style>
    <div class="containers">
        <?php require_once("Navbar.html") ?>
        <main>
            <div class="main__container">
                <div class="mt-3">
                    <form enctype="multipart/form-data" class="w-100" action="" method="post" id="Form">
                        <h2>Quản lí thông tin chuyến bay</h2>
                        <div class="form-row mb-2">
                            <div class="col-md-4">
                                <lable>Ngày khởi hành:</lable>
                                <input class="form-control" type="date" id="StartDate">
                            </div>
                            <div class="col-md-4">
                                <lable>Giờ khởi hành:</lable>
                                <input class="form-control" type="time" id="StartTime">
                            </div>
                            <div class="col-md-4">
                                <lable>Máy bay:</lable>
                                <select id="Airplane" class="form-control">
                                    <option selected disabled hidden>Chọn máy bay</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <div class="col-md-4">
                                <lable>Hãng hàng không:</lable>
                                <select id="Airline" class="form-control">
                                    <option selected disabled hidden>Chọn hãng hàng không</option>
                                </select>
                            </div>
                            <div class="col-md-8">
                                <lable>Đường bay:</lable>
                                <select class="form-control" id="Flightpath">
                                    <option selected disabled hidden>Chọn đường bay</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <div class="col-md-4">
                                <lable>Giá vé người lớn:</lable>
                                <input class="form-control" type="text" id="AdultPrice">
                                <p></p>
                            </div>
                            <div class="col-md-4">
                                <lable>Giá vé trẻ em:</lable>
                                <input class="form-control" type="text" id="ChildrenPrice">
                                <p></p>
                            </div>
                            <div class="col-md-4">
                                <lable>Giá vé sơ sinh:</lable>
                                <input class="form-control" type="text" id="ToddlerPrice">
                                <p></p>
                            </div>
                        </div>
                        <button id="Add" class="btn btn-info">Thêm</button>
                    </form>
                </div>
                <div class="card mt-5">
                    <div class="card-header">Thông tin chuyến bay</div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <th>#</th>
                                <th>Ngày khởi hành</th>
                                <th>Giờ khởi hành</th>
                                <th>Tên máy bay</th>
                                <th>Hãng Hàng không</th>
                                <th>Đường bay</th>
                                <th>Người lớn</th>
                                <th>Trẻ em</th>
                                <th>Em bé</th>
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
                                <lable>Ngày khởi hành:</lable>
                                <input class="form-control" type="date" id="TempStartDate">
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <div class="col-md-12">
                                <lable>Giờ khởi hành:</lable>
                                <input class="form-control" type="time" id="TempStartTime">
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <div class="col-md-12">
                                <lable>Hãng hàng không:</lable>
                                <select id="TempGender" class="form-control">
                                    <option value="Nữ">Nữ</option>
                                    <option value="Nam">Nam</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <div class="col-md-12">
                                <lable>Đường bay:</lable>
                                <select id="TempGender" class="form-control">
                                    <option value="Nữ">Nữ</option>
                                    <option value="Nam">Nam</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <div class="col-md-12">
                                <lable>Giá vé người lớn:</lable>
                                <input class="form-control" type="text" id="TempAdultPrice">
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <div class="col-md-12">
                                <lable>Giá vé trẻ em:</lable>
                                <input class="form-control" type="text" id="TempChilrenPrice">
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <div class="col-md-12">
                                <lable>Giá vé em bé:</lable>
                                <input class="form-control" type="text" id="TempToddler">
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
    <script type="module" src="../config/ManageFlight.js"></script>
</body>

</html>