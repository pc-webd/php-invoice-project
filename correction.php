<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
     <script>
    function validateForm()
    {  
        var a=document.getElementById("party_name").value;
        var b=document.getElementById("invoice_no").value;
        var gstin=document.getElementById('gstn').value;
        var regE= /^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]\w{3}$/;
         if (a == "") 
         {
                alert("All Fields are Required, Notes And Bank Details are Optional.");
                party_name.focus();
                return false;
         }
        if(gstin == "")
            {
                alert("GSTIN is Required Filed");
                gstn.focus();
                return false;
            }
        if(b == "")
        {
             alert("Invoice No is Required Field");
            invoice_no.focus();
            return false;
        }
        
         if(regE.test(gstin))
            {
                return true;
            }
         else
            {
                alert("GSTIN is not Valid");
                return false;
            }
    }
    function gstValidate()
    {
           
    }
</script>
</head>
<body>
    <form action="" onsubmit="return validateForm()"  method="get">
        Party Name:
        <input type="text" id="party_name"><br><br>
        GSTIN:
        <input type="text" name="gstin" id="gstn"><br><br>
        Invoice No:
        <input type="text" id="invoice_no"><br><br>
        Particular:
        <input type="text" name="particular"><br><br>
        rate:
        <input type="text" name="rate"><br><br>
        QTY:
        <input type="number" name="qty"><br><br>
        <input type="submit" value="submit">
    </form>
</body>
</html>
  