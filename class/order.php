<?php require_once("../../connection.php");
class order
{
    public function GetOrder($SQL)
    {
        $connect = connection();
        $query = mysqli_query($connect, "SELECT * FROM orders" . $SQL);
        $OrderArray = array();
        while ($Row = mysqli_fetch_assoc($query)) {
            $OrderArray[] = $Row;
        }
        $connect->close();
        return $OrderArray;
    }
    public function GetOrderDetail($ID)
    {
        $connect = connection();
        $query = mysqli_query($connect, "SELECT * FROM orderdetail, vegetable WHERE orderdetail.OrderID = '" . $ID . "'");
        $DetailArray = array();
        while ($Row = mysqli_fetch_assoc($query)) {
            $DetailArray[] = $Row;
        }
        connection()->close();
        return $DetailArray;
    }
    public function AddOrder($order)
    {
        $Connect = connection();
        $FlightID = $order["FlightID"];
        $Quantity = $order["Quantity"];
        $TotalPrice = $order["TotalPrice"];
        $State  = $order["State"];
        $EmployeeID = $order["EmployeeID"];
        $OrderDate = $order["OrderDate"];
        $MemberID = $order["MemberID"];
        $ContactEmail = $order["ContactEmail"];
        $ContactName = $order["ContactName"];
        $Address = $order["Address"];
        $TotalWeight = $order["TotalWeight"];
        $ReturnFlight = $order["ReturnFlight"];
        $query = mysqli_query($Connect, "INSERT INTO orders(FlightID,Quantity,TotalPrice,State,EmployeeID,OrderDate,MemberID,ContactEmail,ContactName,Address,TotalWeight,ReturnFlight) 
        VALUES('" . $FlightID . "','" . $Quantity . "','" . $TotalPrice . "','" . $State . "',$EmployeeID,'" . $OrderDate . "','" . $MemberID . "','" . $ContactEmail . "',
        '" . $ContactName . "','" . $Address . "','" . $TotalWeight . "',$ReturnFlight)");
        $Connect->close();
        return $query;
    }
    public function AddOrderDetails($orderdetails)
    {
        $connect = connection();
        foreach ($orderdetails as $detail) {
            $OrderID = $detail["OrderID"];
            $TicketID = $detail["TicketID"];
            $PassengerName = $detail["PassengerName"];
            $Age = $detail["Age"];
            $TicketPrice = $detail["TicketPrice"];
            $BaggagePrice = $detail["BaggagePrice"];
            $BaggageWeight = $detail["BaggageWeight"];
            $SeatCode = $detail["SeatCode"];
            $Class = $detail["Class"];
            $Type = $detail["Type"];
            mysqli_query($connect, "UPDATE ticket SET State = 'Occupied' WHERE TicketID = '" . $TicketID . "'");
            $query = mysqli_query($connect, "INSERT INTO orderdetails(OrderID,TicketID,PassengerName,Age,TicketPrice,BaggagePrice,BaggageWeight,SeatCode,Class,Type) 
            VALUES('" . $OrderID . "','" . $TicketID . "','" . $PassengerName . "','" . $Age . "','" . $TicketPrice . "','" . $BaggagePrice . "','" . $BaggageWeight . "',
            '" . $SeatCode . "','" . $Class . "','" . $Type . "')");
        }
        $connect->close();
        return $query;
    }
}

$OrderObject = new order();
