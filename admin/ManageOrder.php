<!DOCTYPE html>
<html>

<head>
    <title>Quản lý hóa đơn</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../style/admin.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <script lang="javascript" src="../library/xlsx/dist/xlsx.full.min.js"></script>
    <link rel="stylesheet" href="../library/sweetalert2/dist/sweetalert2.min.css">
    <script src="../library/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="../boostrap/css/bootstrap.css">
    <script src="../boostrap/js/bootstrap.js"></script>
</head>

<body>
    <style>
        .sidebar__link:nth-child(4) {
            background-color: rgba(38, 107, 197, 0.5);
        }
    </style>
    <div class="containers">
        <?php require_once("Navbar.html") ?>
        <main>
            <div class="main__container">
                <div class="emp-orders card mt-5">
                    <div class="card-header">
                        <span>Danh sách hóa đơn</span>
                        <div class="search-container form-control">
                            <i class="fas fa-search text-dark"></i>
                            <input id="search" class="search" placeholder="Tìm kiếm">
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover main-table">
                            <thead>
                                <th>#</th>
                                <th>Ngày đặt</th>
                                <th>Tổng tiền</th>
                                <th>Hành lý</th>
                                <th>Số người</th>
                                <th>Chuyến bay đi</th>
                                <th>Ngày đi</th>
                                <th>Chuyến bay về</th>
                                <th>Ngày về</th>
                                <th>Trạng thái</th>
                                <th>Thông tin liên lạc</th>
                                <th>Xóa</th>
                                <th>Chi tiết</th>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    <div class="card-footer d-flex justify-content-between"></div>
                </div>
            </div>
        </main>
        <?php require_once("sidebar.html"); ?>
    </div>
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thông tin chi tiết đơn hàng</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Mã hóa đơn</th>
                                <th>Mã vé</th>
                                <th>Tên hành khách</th>
                                <th>Độ tuổi</th>
                                <th>Giá vé</th>
                                <th>Giá hành lý</th>
                                <th>Khối lượng</th>
                                <th>Mã ghế</th>
                                <th>Hạng ghế</th>
                                <th>Loại chuyến</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Thoát</button>
                    <button type="button" class="btn btn-info" id="export-details">Xuất chi tiết</button>
                </div>
            </div>
        </div>
        <script src="../config/AdminResponsive.js"></script>
        <script type="module" src="../config/EmployeeOrder.js"></script>
        <script src="../library/sweetalert2/dist/sweetalert2.min.js"></script>
</body>

</html>