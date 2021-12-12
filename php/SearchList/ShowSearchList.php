<?php require_once("../../class/flight.php");
require_once("../../class/flightpath.php");
$SearchResult = $_POST["SearchResult"];
$StartDate = $SearchResult["StartDate"];
$SortValue = $StartTime = $EndTime = $Airline = '';
if (isset($SearchResult["StartTime"]) && !empty($SearchResult["StartTime"])) {
  $Explode = explode("-", $SearchResult["StartTime"]);
  $StartTime = " and StartTime between '" . $Explode[0] . "' and '" . $Explode[1] . "'";
}
if (isset($SearchResult["EndTime"]) && !empty($SearchResult["EndTime"])) {
  $Explode = explode("-", $SearchResult["EndTime"]);
  $EndTime = " and EndTime between '" . $Explode[0] . "' and '" . $Explode[1] . "'";
}
if (isset($SearchResult["SortValue"]) && !empty($SearchResult["SortValue"])) {
  $SortValue = " order by " . $SearchResult["SortValue"] . " asc";
}
if (isset($SearchResult["AirlineID"]) && !empty($SearchResult["AirlineID"])) {
  $Airline = " and a.AirlineID = '" . $SearchResult["AirlineID"] . "'";
}
$Path = " and fp.PathID = '" . $SearchResult["StartAirport"] . "-" . $SearchResult["EndAirport"] . "'";
$FlightList = $FlightObject->SearchFlight("$StartTime$EndTime$Path$Airline and StartDate = '" . $StartDate  . "'$SortValue");
$HeaderPath = $FlightPathObject->GetFlightPath(' where PathID = "' . $SearchResult["StartAirport"] . "-" . $SearchResult["EndAirport"] . '"');
$FlightListHTML = '<div class="flight-header">';
if (!empty($HeaderPath)) {
  $HeaderPath = $HeaderPath[0];
  $FlightListHTML .= '
<i class="fas fa-plane-departure"></i>
<div class="flight-title">
    <p>' . $HeaderPath["CN1"] . ', ' . $HeaderPath["CCN1"] . ' (' . $HeaderPath["StartAirport"] . ') 
    <i class="fas fa-long-arrow-alt-right"></i>
    ' . $HeaderPath["CN2"] . ', ' . $HeaderPath["CCN2"] . ' (' . $HeaderPath["EndAirport"] . ')</p> 
    <span>' . date("d-m-Y", strtotime($StartDate)) . '</span>
</div>';
} else {
  $FlightListHTML .= '<div class="flight-title"><h3>Không có đường bay</h3></div>';
}
$FlightListHTML .= '</div>
<ul class="date-list">';
for ($i = -3; $i <= 3; $i++) {
  $CurrentDateClass = new DateTime($StartDate);
  $CurrentDateClass->modify('+' . $i . ' day');
  $DateOfWeek  = $CurrentDateClass->format("l");
  switch ($DateOfWeek) {
    case "Monday":
      $DateOfWeek = "Thứ 2";
      break;
    case "Tuesday":
      $DateOfWeek = "Thứ 3";
      break;
    case "Wednesday":
      $DateOfWeek = "Thứ 4";
      break;
    case "Thursday":
      $DateOfWeek = "Thứ 5";
      break;
    case "Friday":
      $DateOfWeek = "Thứ 6";
      break;
    case "Saturday":
      $DateOfWeek = "Thứ 7";
      break;
    default:
      $DateOfWeek = "Chủ nhật";
      break;
  }
  $Class = '';
  if ($i == 0) {
    $Class = "style='background-color: aliceblue'";
  }
  $FlightListHTML .= '
    <li class="date-value" ' . $Class . '>
      <span>' . $CurrentDateClass->format("d-m-Y") . '</span>
      <span>' . $DateOfWeek . '</span>
    </li>';
}
$FlightListHTML .= '</ul>
<div class="flight-list">';
if (empty($FlightList)) {
  $FlightListHTML .= '<div class="flight-item"><h1>Không có chuyến bay<h1></div>';
} else {
  foreach ($FlightList as $Flight) {
    $Flightpath = $FlightPathObject->GetFlightPath(' where PathID = "' . $Flight["PathID"] . '"')[0];
    $FlightListHTML .= '
  <div id="" class="flight-item">
    <ul class="flight-info">
        <li>
            <img src="../icon/' . $Flight["AirlineID"] . '.gif">
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
            <button data-flight=' . $Flight["FlightID"] . ' data-plane=' . $Flight["PlaneID"] . ' class="OrderTicket">Chọn chuyến bay</button>
        </li>
    </ul>

    <div class="flight-box-detail">
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
                    <span>Hạng chỗ:<b>ECO, BUSINESS</b></span>
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
}
$FlightListHTML .= '</div>';
die($FlightListHTML);
