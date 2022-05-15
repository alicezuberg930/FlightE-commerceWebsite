<!DOCTYPE html>
<html>

<head>
    <title>Manage Flight</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <script src="../library/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="../boostrap/css/bootstrap.css">
    <script src="../boostrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../library/sweetalert2/dist/sweetalert2.min.css">
    <script src="../library/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="../style/admin.css">
</head>

<body>
    <style>
        .sidebar__link:nth-child(1) {
            background-color: rgba(38, 107, 197, 0.5);
        }
    </style>
    <div class="containers">
        <?php require_once("Navbar.html"); ?>
        <main>
            <div class="main__container">
                <div class="mt-3">
                    <form enctype="multipart/form-data" action="../php/Flight/AddFlight.php" method="post" id="add-form">
                        <h2>Quản lí thông tin chuyến bay</h2>
                        <div class="form-row mb-2">
                            <div class="col-md-4">
                                <lable>Ngày khởi hành:</lable>
                                <input class="form-control" type="date" name="StartDate" id="StartDate">
                            </div>
                            <div class="col-md-4">
                                <lable>Giờ khởi hành:</lable>
                                <input class="form-control" type="time" name="StartTime" id="StartTime">
                            </div>
                            <div class="col-md-4">
                                <lable>Máy bay:</lable>
                                <select id="Airplane" name="Airplane" class="form-control">
                                    <option selected disabled hidden>Chọn máy bay</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <div class="col-md-4">
                                <lable>Hãng hàng không:</lable>
                                <select id="Airline" name="AirlineID" class="form-control">
                                    <option selected disabled hidden>Chọn hãng hàng không</option>
                                </select>
                            </div>
                            <div class="col-md-8">
                                <lable>Đường bay:</lable>
                                <select class="form-control" name="PathID" id="Flightpath">
                                    <option selected disabled hidden>Chọn đường bay</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <div class="col-md-4">
                                <lable>Giá vé người lớn:</lable>
                                <input min="0" class="form-control" type="number" name="AdultPrice" id="AdultPrice">
                                <p></p>
                            </div>
                            <div class="col-md-4">
                                <lable>Giá vé trẻ em:</lable>
                                <input min="0" class="form-control" type="number" name="ChildrenPrice" id="ChildrenPrice">
                                <p></p>
                            </div>
                            <div class="col-md-4">
                                <lable>Giá vé em bé:</lable>
                                <input min="0" class="form-control" type="number" name="ToddlerPrice" id="ToddlerPrice">
                                <p></p>
                            </div>
                        </div>
                        <button id="Add" class="btn btn-info">Thêm</button>
                    </form>
                </div>
                <div class="card mt-5">
                    <div class="card-header">
                        <span>Thông tin chuyến bay</span>
                        <div class="search-container form-control">
                            <i class="fas fa-search text-dark"></i>
                            <input id="search" class="search" placeholder="Tìm kiếm">
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover main-table">
                            <thead>
                                <th>#</th>
                                <th>Ngày khởi hành</th>
                                <th>Giờ khởi hành</th>
                                <th>Tên máy bay</th>
                                <th>Hãng hàng không</th>
                                <th>Đường bay</th>
                                <th>Giá người lớn</th>
                                <th>Giá trẻ em</th>
                                <th>Giá em bé</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                                <th>Chi tiết</th>
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
                    <form enctype="multipart/form-data" action="../php/Flight/UpdateFlight.php" method="post" id="edit-form">
                        <input type="number" name="FlightID" id="FlightID" hidden>
                        <div class="form-row mb-2">
                            <div class="col-md-12">
                                <lable>Ngày khởi hành:</lable>
                                <input class="form-control" type="date" name="StartDate" id="TempStartDate">
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <div class="col-md-12">
                                <lable>Giờ khởi hành:</lable>
                                <input class="form-control" type="time" name="StartTime" id="TempStartTime">
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <div class="col-md-12">
                                <lable>Hãng hàng không:</lable>
                                <select class="form-control" name="AirlineID" id="TempAirline">
                                    <option selected disabled hidden>Chọn hãng hàng không</option>
                                </select>
                            </div>
                        </div>
                        <div class=" form-row mb-2">
                            <div class="col-md-12">
                                <lable>Đường bay:</lable>
                                <select class="form-control" name="PathID" id="TempFlightpath">
                                </select>
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <div class="col-md-12">
                                <lable>Giá vé người lớn:</lable>
                                <input min="0" class="form-control" type="number" name="AdultPrice" id="TempAdultPrice">
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <div class="col-md-12">
                                <lable>Giá vé trẻ em:</lable>
                                <input min="0" class="form-control" type="number" name="ChilrenPrice" id="TempChilrenPrice">
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <div class="col-md-12">
                                <lable>Giá vé em bé:</lable>
                                <input min="0" class="form-control" type="number" name="ToddlerPrice" id="TempToddlerPrice">
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
    <div class="modal" id="DetailModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thông tin chi tiết chuyến bay</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <table class="table table-hover detail-table">
                        <thead>
                            <tr>
                                <th>Thành phố đi</th>
                                <th>Thành phố đến</th>
                                <th>Sân bay đi</th>
                                <th>Sân bay đến</th>
                                <th>Giờ hạ cánh</th>
                                <th>Ngày hạ cánh</th>
                                <th>Thời gian bay</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
    <script src="../config/AdminResponsive.js"></script>
    <script type="module" src="../config/ManageFlight.js"></script>
</body>

</html>