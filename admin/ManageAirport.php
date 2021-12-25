<!DOCTYPE html>
<html>

<head>
    <title>Quản lý sân bay</title>
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
        .sidebar__link:nth-child(5) {
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
                            <div class="col-md-3">
                                <lable>Mã sân bay:</lable>
                                <input maxlength="3" class="form-control" type="text" id="AirportID" name="AirportID">
                            </div>
                            <div class="col-md-3">
                                <lable>Tên sân bay:</lable>
                                <input class="form-control" type="text" id="AirportName" name="AirportName">
                            </div>
                            <div class="col-md-3">
                                <lable>Độ dài (km):</lable>
                                <input min="0" class="form-control" type="number" id="Length" name="Length">
                            </div>
                            <div class="col-md-3">
                                <lable>Thành phố:</lable>
                                <select class="form-control" id="CityID" name="CityID">
                                    <option value="">Chọn thành phố</option>
                                </select>
                            </div>
                        </div>
                        <button name="submit" id="Add" class="btn btn-info">Thêm</button>
                    </form>
                </div>
                <div class="card mt-5">
                    <div class="card-header">
                        <span> Thông tin sân bay</span>
                        <div class="search-container form-control">
                            <i class="fas fa-search text-dark"></i>
                            <input id="search" class="search" placeholder="Tìm kiếm">
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover main-table">
                            <thead>
                                <th>Mã sân bay</th>
                                <th>Tên sân bay</th>
                                <th>Thành phố</th>
                                <th>Độ dài</th>
                                <th>Quốc gia</th>
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
                        <input hidden type="text" id="HiddenAirportID" name="HiddenAirportID">
                        <div class="form-row mb-2">
                            <div class="col-md-12">
                                <lable>Mã sân bay:</lable>
                                <input maxlength="3" class="form-control" type="text" id="AirportIDTemp" name="AirportID">
                            </div>
                            <div class="col-md-12">
                                <lable>Tên sân bay:</lable>
                                <input class="form-control" type="text" id="AirportNameTemp" name="AirportName">
                            </div>
                            <div class="col-md-12">
                                <lable>Độ dài (km):</lable>
                                <input min="0" class="form-control" type="number" id="LengthTemp" name="Length">
                            </div>
                            <div class="col-md-12">
                                <lable>Thành phố:</lable>
                                <select class="form-control" id="CityIDTemp" name="CityID">
                                    <option value="">Chọn thành phố</option>
                                </select>
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
    <script type="module" src="../config/ManageAirport.js"></script>
</body>

</html>