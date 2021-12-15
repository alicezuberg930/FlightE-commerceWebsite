<!DOCTYPE html>
<html>

<head>
    <title>Danh sách đơn hàng</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <script src="../library/jquery/jquery.min.js"></script>
    <link rel="shortcut icon" href="../icon/favicon.ico">
    <link rel="stylesheet" type="text/css" href="../style/header.css">
    <link rel="stylesheet" type="text/css" href="../style/footer.css">
    <link rel="stylesheet" href="../library/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="../boostrap/css/bootstrap.css">
</head>

<body>
    <style>
        .nav-bar {
            background-color: var(--header);
        }

        .table {
            width: 95%;
            margin: 0 auto 5rem;

        }

        h2 {
            margin-top: 5rem;
            text-align: center;
        }
    </style>
    <?php require_once("./header.php"); ?>
    <h2>Thông tin hóa đơn</h2>
    <table class="table table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Ngày đặt</th>
                <th>Tổng tiền</th>
                <th>Khối lượng hành lý</th>
                <th>Số người đi</th>
                <th>Chuyến bay đi</th>
                <th>Chuyến bay về</th>
                <th>Hủy vé</th>
                <th>Chi tiết</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
            </tr>
        </tbody>
    </table>
    <?php require_once("./footer.php"); ?>
    <script src="../config/ManageOrder.js"></script>
    <script src="../config/UserState.js"></script>
</body>

</html>