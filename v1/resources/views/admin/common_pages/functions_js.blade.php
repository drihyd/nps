<script type="text/javascript">      
$(document).ready(function () {      
$(".gst").change(function () {
	
	

	
                var inputvalues = $(this).val(); 				
                var gstinformat = new RegExp('^([0-9]){2}([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}([0-9]){1}([a-zA-Z]){1}([0-9]){1}?$');    
                if (gstinformat.test(inputvalues)) {    
                    return true;    
                } else {    
                    alert('Please Enter Valid GSTIN Number');    
                    $(".gst").val('');    
                    $(".gst").focus();    
                }    
            });          
 });          
  </script> 