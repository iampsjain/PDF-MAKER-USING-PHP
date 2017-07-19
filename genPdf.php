<?php
require 'pdfcrowd.php';


function generat(){
	
try
{   
    // create an API client instance
    $client = new Pdfcrowd("iampsjain", "05348639ad59d3732e63764c37e97775");

    // convert a web page and store the generated PDF into a $pdf variable
    $pdf = $client->convertHtml('
	<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office"><head>
    <!--[if gte mso 9]><xml>
     <o:OfficeDocumentSettings>
      <o:AllowPNG/>
      <o:PixelsPerInch>96</o:PixelsPerInch>
     </o:OfficeDocumentSettings>
    </xml><![endif]-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width">
    <!--[if !mso]><!--><meta http-equiv="X-UA-Compatible" content="IE=edge"><!--<![endif]-->
    <div style="margin:20%;text-align:center">
<img src="http://www.zamzar.com/images/filetypes/pdf.png">
<b><h1>Here is your pdf Contents</h1></b>
</div>
</body></html>
	
	
	');

    // set HTTP response headers
    header("Content-Type: application/pdf");
    header("Cache-Control: max-age=0");
    header("Accept-Ranges: none");
    header("Content-Disposition: attachment; filename=\"New.pdf\"");

    // send the generated PDFs 
    echo $pdf;
}
catch(PdfcrowdException $why)
{
    echo "Pdfcrowd Error: " . $why;
}

}
 if (isset($_GET['hello'])) {
    generat();
  }

echo '<a href="genPdf.php?hello=true"><button>Generate</button></a> ';
?>