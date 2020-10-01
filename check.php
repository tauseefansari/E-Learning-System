<?php 
    require('fpdf/fpdf.php');
    
    function pixel_to_pt($px)
    {
        return round(0.75*$px);
    }
    

    if(isset($_POST["create_pdf"]))  
    {  
        $total=$_POST["total"];
        $paid=$_POST["paid"];
        $rem= $total - $paid;

        $billDim = array(pixel_to_pt(600), pixel_to_pt(800));
        $totalPosition = array(pixel_to_pt(250), pixel_to_pt(310));
        $totalSize = array(pixel_to_pt(200), pixel_to_pt(200));
        $paidPosition = array(pixel_to_pt(250), pixel_to_pt(370));
        $paidSize = array(pixel_to_pt(200), pixel_to_pt(200));
        $remPosition = array(pixel_to_pt(370), pixel_to_pt(440));
        $remSize = array(pixel_to_pt(200), pixel_to_pt(200));
        $billImage = "assets/img/Bill.png";
        
        $certificate = new FPDF("Portrait", "pt", $billDim);
        $certificate->AddPage();
            
        $certificate->Image($billImage, 0, 0, $billDim[0], $billDim[1]);
        $certificate->SetFont("Times", "IB", 38);
        $certificate->SetTextColor(255, 255, 255);
        $certificate->SetXY($totalPosition[0], $totalPosition[1]);
        $certificate->Cell($totalSize[0], $totalSize[1], $total.' Rs.', 0, 0, "C");
        $certificate->SetFont("Times", "IB", 38);
        $certificate->SetTextColor(255, 255, 255);
        $certificate->SetXY($paidPosition[0], $paidPosition[1]);
        $certificate->Cell($paidSize[0], $paidSize[1], $paid.' Rs.', 0, 0, "C");
        $certificate->SetFont("Times", "IB", 38);
        $certificate->SetTextColor(255, 255, 255);
        $certificate->SetXY($remPosition[0], $remPosition[1]);
        $certificate->Cell($remSize[0], $remSize[1], $rem.' Rs.', 0, 0, "C");
    
        $certificate->Output("I", "Bill.pdf");  
 	}
?>

<!DOCTYPE html>  
 <HTML><HEAD>
<META http-equiv=Content-Type content="text/html; charset=windows-1252">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script type="text/javascript" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<body>
  <form  method="post">
          
          <div class="row">
        <div class="col-md-6">
         <label>Total : </label>
         <input type="number" name="total" class="form-control" required />
        </div>
        </div>
        
        <div class="row">
        <div class="col-md-6">
         <label>Paid : </label>
         <input type="number" name="paid" class="form-control" required />
        </div>
        </div>
    <div class="row" > <br><br><br>
        <input type="submit" name="create_pdf" class="btn btn-primary" value="Generate Bill"/>
    </div>  
  
</div> 
</div>
</form>    
</body>  
 </html> 