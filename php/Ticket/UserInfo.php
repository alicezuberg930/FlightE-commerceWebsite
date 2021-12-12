<?php require_once("../../class/baggage.php");
$BaggageList = $BaggageObject->GetBaggage();
$SeatCode = $_POST["SeatCode"];
$Ticket = $_POST["Ticket"];
$Class = $_POST["Class"];
$UserInfoString = '
<tr>
    <th>Khách hàng</th>      
    <th>Họ tên *</th>
</tr>
<tr class="row-1 ' . $SeatCode . '">  
    <td class="customer-age">
        <div class="input-group">                       
            <select class="input-age form-control">           
                <option value="Adult">Người lớn</option>
                <option value="Children">Trẻ em</option>
                <option value="Toddler">Em bé</option>
            </select>          
        </div>            
    </td>     
    <td class="customer-fullname">          
        <div class="input-group">             
            <input class="input-fullname form-control" type="text" maxlength="160" placeholder="Họ và tên">          
        </div>      
    </td>
</tr>    
<tr class="row-2">  
    <td class="customer-seatcode">
        <div class="input-group">             
            <input data-class="' . $Class . '" data-ticket="' . $Ticket . '" class="input-seatcode form-control" type="text" value="' . $SeatCode . '" readonly>          
        </div>   
    </td>
    <td class="customer-baggage" colspan="2">  
        <div class="input-group">        
            <select class="input-baggage form-control">
                <option value="0-0" selected hidden disabled>Chọn hành lý ký gửi</option>
                <option value="0-0">Không mang hành lý</option>';
foreach ($BaggageList as $Baggage) {
    $UserInfoString .= '<option value="' . $Baggage["Price"] . '-' . $Baggage["Weight"] . '">khối lượng (' . $Baggage["Weight"] . ' Kg): ' . number_format($Baggage["Price"]) . ' VND</option>';
}
$UserInfoString .= '</select>   
        </div>  
    </td>
</tr>';
die($UserInfoString);
