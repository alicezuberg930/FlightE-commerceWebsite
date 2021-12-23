<?php require_once("../../connection.php");
class payment
{
    public function AddPayment($PaymentArr)
    {
        $connect = connection();
        $OrderID = $PaymentArr["OrderID"];
        $Total = $PaymentArr["Total"];
        $Note = $PaymentArr["Note"];
        $vnp_response_code = $PaymentArr["vnp_response_code"];
        $code_vnpay = $PaymentArr["code_vnpay"];
        $BankCode = $PaymentArr["BankCode"];
        $PaymentTime = $PaymentArr["PaymentTime"];
        $query = mysqli_query($connect, "INSERT INTO `payments`(`OrderID`, `Total`, `Note`, `vnp_response_code`, `code_vnpay`, `BankCode`, `PaymentTime`) 
        VALUES ('" . $OrderID . "','" . $Total . "','" . $Note . "','" . $vnp_response_code . "','" . $code_vnpay . "','" . $BankCode . "','" . $PaymentTime . "')");
        $connect->close();
        return $query;
    }
}
$PaymenObject = new payment();
