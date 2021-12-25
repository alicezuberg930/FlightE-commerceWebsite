<!DOCTYPE html>
<html>

<head>
    <title>Quản lý thành viên</title>
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
        .sidebar__link:nth-child(3) {
            background-color: rgba(38, 107, 197, 0.5);
        }
    </style>

    <div class="containers">
        <?php require_once("Navbar.html") ?>
        <main>
            <div class="main__container">
                <div class="card mt-5">
                    <div class="card-header">
                        <span> Thông tin thành viên</span>
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
                                <th>Lịch sử đặt hàng</th>
                                <th>Khóa/Mở khóa</th>
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
    <div class="modal fade" id="orderModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thông tin đơn hàng</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div>
                        <table class="table table-hover member-history">
                            <thead>
                                <tr>
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
                                    <th>Chi tiết</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Thoát</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thông tin chi tiết đơn hàng</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div>
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Thoát</button>
                    <button type="button" id="export-details" class="btn btn-info">Xuất chi tiết</button>
                </div>
            </div>
        </div>
        <script src="../library/sweetalert2/dist/sweetalert2.min.js"></script>
        <script src="../config/AdminResponsive.js"></script>
        <script type="module" src="../config/ManageUser.js"></script>
</body>

</html>