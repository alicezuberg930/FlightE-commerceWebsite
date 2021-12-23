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
        .sidebar__link:nth-child(6) {
            background-color: rgba(38, 107, 197, 0.5);
        }
    </style>
    <div class="containers">
        <?php require_once("Navbar.html") ?>
        <main>
            <div class="main__container">
                <div class="mt-3">
                    <form enctype="multipart/form-data" action="../php/Airport/AddAirport.php" method="post" id="add-form">
                        <h2>Quản lí thông tin sân bay</h2>
                        <div class="form-row mb-2">
                            <div class="col-md-4">
                                <lable>Sân bay đi:</lable>
                                <select class="form-control" id="StartAirport" name="StartAirport">
                                    <option value="">Chọn sân bay khởi hành</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <lable>Sân bay đến:</lable>
                                <select class="form-control" id="EndAirport" name="EndAirport">
                                    <option value="">Chọn sân bay hạ cánh</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <lable>Thời gian di chuyển (giờ):</lable>
                                <input min="1" max="24" class="form-control" type="number" id="Hour" name="Hour">
                            </div>
                            <div class="col-md-2">
                                <lable>Thời gian di chuyển (phút):</lable>
                                <input min="0" max="59" class="form-control" type="number" id="Minute" name="Minute">
                            </div>
                        </div>
                        <button name="submit" id="Add" class="btn btn-info">Thêm</button>
                    </form>
                </div>
                <div class="card mt-5">
                    <div class="card-header">Thông tin đường bay</div>
                    <div class="card-body">
                        <table class="table table-hover main-table">
                            <thead>
                                <th>Mã đường bay</th>
                                <th>Sân bay khởi hành</th>
                                <th>Sân bay kết thúc</th>
                                <th>Thời gian bay</th>
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
                    <form enctype="multipart/form-data" action="../php/Airport/UpdateAirport.php" method="post" id="edit-form">
                        <input hidden type="text" id="FlightpathIDTemp" name="FlightpathID">
                        <div class="form-row">
                            <div class="col-md-12">
                                <lable>Sân bay đi:</lable>
                                <select class="form-control" id="StartAirportTemp" name="StartAirport">
                                    <option value="">Chọn sân bay khởi hành</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <lable>Sân bay đến:</lable>
                                <select class="form-control" id="EndAirportTemp" name="EndAirport">
                                    <option value="">Chọn sân bay hạ cánh</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <lable>Thời gian di chuyển (giờ):</lable>
                                <input min="1" max="24" class="form-control" type="number" id="HourTemp" name="Hour">
                            </div>
                            <div class="col-md-12">
                                <lable>Thời gian di chuyển (phút):</lable>
                                <input min="1" max="59" class="form-control" type="number" id="MinuteTemp" name="Minute">
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
    <!-- <script type="module" src="../config/DestinationList.js"></script> -->
    <script type="module" src="../config/ManageFlightpath.js"></script>
</body>

</html>