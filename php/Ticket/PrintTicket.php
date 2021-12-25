<?php require_once("../../class/ticket.php");
require_once("../../class/plane.php");
require_once("../../class/flight.php");
require_once("../../class/flightpath.php");
session_start();
if (isset($_SESSION["Employee"])) {
    die("EmployeeLogin");
} else if (!isset($_SESSION["Member"])) {
    die("MemberLogin");
}
$TicketList = $TicketObject->GetTicket("where FlightID = '" . $_POST["FlightID"] . "'");
$Plane = $PlaneObject->SearchPlane("where PlaneID = '" . $_POST["PlaneID"] . "'")[0];
$FlightList = $FlightObject->SearchFlight(" and FlightID = '" . $_POST["FlightID"] . "'");
$String = '
<div class="fare-wrapper">
    <div class="title">Chuyến bay đã lựa chọn</div>
    <div class="flight-list">';
foreach ($FlightList as $Flight) {
    $Flightpath = $FlightPathObject->GetFlightPath(' where PathID = "' . $Flight["PathID"] . '"')[0];
    $String .= '
      <div id="" class="flight-item">
        <ul class="flight-info">
            <li>
                <img src="../icon/' . $Flight["AirlineImage"] . '">
                <p>' . $Flight["AirlineName"] . '</p>
            </li>
            <li>
                <span class="flight-city">' . $Flightpath["CN1"] . '</span>
                <span class="flight-time">' . date("H:i", strtotime($Flight["StartTime"])) . '</span>
            </li>
            <li>
                <div class="flight-id">' . $Flight["AirlineID"] . $Flight["FlightID"] . '</div>
                <div class="ftl-flight-line">
                    <div class="flight-line"></div>
                </div>
                <div class="expand-details">
                  <a class="flight-detail">Chi tiết</a>
                  <i class="fas fa-chevron-down"></i>
                </div>        
            </li>
            <li>
                <span class="flight-city">' . $Flightpath["CN2"] . '</span>
                <span class="flight-time">' . date("H:i", strtotime($Flight["EndTime"])) . '</span>
            </li>
            <li>
                <div class="flight-price">
                <h4>' . number_format($Flight["AdultPrice"]) . ' VND</h4>
                </div>
                <button class="ReChoose">Chọn lại</button>
            </li>
        </ul>
        <div data-expand="0" class="flight-box-detail">
            <div class="box-item">
                <div class="flight-box-detail-header">
                    <i class="fa fa-info-circle"></i>
                    <span>Chi tiết chuyến bay</span>
                </div>
                <ul class="box-item-flight">
                    <li>
                        <img src="../icon/' . $Flight["AirlineID"] . '.gif">
                        <p>' . $Flight["AirlineName"] . '</p>
                    </li>
                    <li>
                        <span><b>' . $Flightpath["CN1"] . ' - ' . $Flightpath["StartAirport"] . '</b></span>
                        <span><i>Sân bay ' . $Flightpath["AN1"] . '</i></span>
                        <span>Cất cánh: <b>' . date("H:i", strtotime($Flight["StartTime"])) . '</b></span>
                        <span>Ngày: <b>' . date("d-m-Y", strtotime($Flight["StartDate"])) . '</b></span>
                    </li>
                    <li>
                        <span><b>' . $Flightpath["CN2"] . ' - ' . $Flightpath["EndAirport"] . '</b></span>
                        <span><i>Sân bay ' . $Flightpath["AN2"] . '</i></span>
                        <span>Hạ cánh: <b>' . date("H:i", strtotime($Flight["EndTime"])) . '</b></span>
                        <span>Ngày: <b>' . date("d-m-Y", strtotime($Flight["EndDate"])) . '</b></span>
                    </li>
                    <li>
                        <span>Chuyến bay: <b>' . $Flight["AirlineID"] . $Flight["FlightID"] . '</b></span>
                        <span>Thời gian bay: <b>' . date("H", strtotime($Flightpath["Time"])) . 'g ' . date("i", strtotime($Flightpath["Time"])) . 'p</b></span>
                        <span>Hạng chỗ:<b>ECO,BUSI</b></span>
                        <span>Máy bay: <b>' . $Flight["PlaneName"] . '</b></span>
                    </li>
                </ul>
            </div>
            <div class="box-item">
                <div class="box-item-fare-header">
                    <i class="fa fa-eye"></i>
                    <span>Chi tiết giá vé</span>
                </div>
                <ul class="box-item-fare">
                    <li><b>Hành khách</b></li>
                    <li><b>Giá vé (ECO)</b></li>
                    <li><b>Giá vé (BUSINESS)</b></li>
                    <li><b>Thuế và phí</b></li>
                </ul>
                <ul class="box-item-fare">
                    <li>Người lớn</li>
                    <li>' . number_format($Flight["AdultPrice"]) . '</li>
                    <li>' . number_format($Flight["AdultPrice"] * 2) . '</li>
                    <li>' . number_format($Flight["AdultPrice"] * 0.2) . '</li>
                </ul>
                 <ul class="box-item-fare">
                    <li>Trẻ em</li>
                    <li>' . number_format($Flight["ChildrenPrice"]) . '</li>
                    <li>' . number_format($Flight["ChildrenPrice"] * 2) . '</li>
                    <li>' . number_format($Flight["ChildrenPrice"] * 0.2) . '</li>
                </ul>
                 <ul class="box-item-fare">
                    <li>Em bé</li>
                    <li>' . number_format($Flight["ToddlerPrice"]) . '</li>
                    <li>' . number_format($Flight["ToddlerPrice"] * 2) . '</li>
                    <li>' . number_format($Flight["ToddlerPrice"] * 0.2) . '</li>
                </ul>
            </div>
        </div>
    </div>';
}
$String .= "
    </div>
</div>
<div class='fare-wrapper'>
    <div class='title'>Chọn chỗ ngồi & nhập thông tin</div>
    <div class='reservation-info'>
        <div class='seat-list' data-flight='" . $_POST["FlightID"] . "'>
            <div class='seat-row'>
                <div class='seat' style='opacity: 0;'>X</div>";
$letter = "A";
for ($column = 0; $column < $Plane["Columns"]; $column++) {
    $String .= '<div class="seat" style="background-color: aliceblue">' . $letter++ . '</div>';
}
$String .= "</div>";
$number = 0;
for ($row = 1; $row <= $Plane["Rows"]; $row++) {
    $String .= "<div class='seat-row'>
    <div class='seat' style='background-color: aliceblue'>" . $row . "</div>";
    for ($column = 0; $column < $Plane["Columns"]; $column++) {
        $String .= "<div data-class='" . $TicketList[$number]["Class"] . "' data-ticket='" . $TicketList[$number]["TicketID"] . "' data-state='" . $TicketList[$number]["State"] . "' 
        data-seat='" . $TicketList[$number]["SeatCode"] . "' class='seat " . $TicketList[$number]["State"] . " " . $TicketList[$number]["Class"] . "'>" . $TicketList[$number]["SeatCode"] . "</div>";
        $number++;
    }
    $String .= "</div>";
}
$String .= '</div>
    <div class="customer-list">
        <div class="seat-state">
            <ul>
                <li>
                    <div class="seat Business"></div>
                    <span>Hạng ghế business</span>
                </li>
                <li>
                    <div class="seat Economy"></div>
                    <span>Hạng ghế economy</span>
                </li>
                <li>
                    <div class="seat Occupied"></div>
                    <span>Ghế đã đặt</span>
                </li>
            </ul>
        </div>
        <div class="box-option"> 
            <table id="customer-info" class="info"> 
                <tbody>  
                    <tr class="fillout-warning"><th colspan=2>Nhập thông tin hành khách</th></tr>
                </tbody>
            </table>

            <table class="contact-info">
                <tbody>
                    <tr class="fillout-warning"><th colspan=3>Thông tin liên hệ</th></tr>
                    <tr>
                        <th style="width: 33%">Email *</th>      
                        <th style="width: 33%">Họ tên *</th>
                        <th style="width: 33%">Địa chỉ *</th>
                    </tr>
                    <tr class="row-3">  
                        <td class="contact-email">
                            <div class="input-group">                       
                                <input id="input-email" class="form-control" type="text" maxlength="160" placeholder="Email">                
                            </div>            
                        </td>     
                        <td class="contact-fullname">          
                            <div class="input-group">             
                                <input id="input-contactname" class="form-control" type="text" maxlength="160" placeholder="Họ và tên">          
                            </div>
                        </td>
                        <td class="contact-address">          
                            <div class="input-group">             
                                <input id="input-address" class="form-control" type="text" maxlength="160" placeholder="Địa chỉ">          
                            </div>
                        </td>
                    </tr>
                    <tr class="row-4">  
                        <td><button id="pay" class="btn" style="background-color: #ffca39;">Đặt vé</button></td>    
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>';
die($String);
