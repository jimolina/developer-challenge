<!DOCTYPE html>
<html>
   <!-- Boostrap CVN, JQuery, link to stylesheet,head tag contents -->
   <?php include 'preheader.php'; ?> 
    
    <body>
    <!-- Markup for the navigation -->
    <?php include 'navigation.php'; ?> 
    <!-- Markup for section with the image of the ship -->
    <?php include 'header.php'; ?>
    <!-- Markup for white information section -->
    <?php include 'midsection.php'; ?>   
    <!-- Markup for product section -->
    <?php include 'product_section.php'; ?>
    <!-- Markup for footer section -->
    <?php include 'footer.php'; ?>
    <!-- Modal -->
    <?php include 'modal.php'; ?>
    
        
    </body>
    <script type="text/javascript">
    //Navigation Animation Effect
    $('#mainNav').affix({
      offset: {
        top: 100
      }
    });
    
    /*Verify both firstname and lastname are not empty or null */
    function validatename(){
        var firstname = $('#firstname').val();
        var lastname = $('#lastname').val();
        
        if(firstname && lastname && firstname.length > 0 && lastname.length > 0){
         return true;
        }
        return false;
    }
    
    /*
     * Validate email. Simple regex to validate email for proper syntax
     * */
    function validate_email(){
       var email = $('#email').val();
       var regex = new RegExp("[A-Za-z][A-Za-z0-9]*[@][A-Za-z0-9]*[\.][A-Za-z]{3}");
       
       if(regex.test(email)){
         $('#email_msg').html('<span id="email_msg" class="glyphicon glyphicon-check text-success"></span>');
         return true;
       }
       
       $('#email_msg').html('<p id="email_msg" class="text text-danger">Must be a valid email address</p>');
       return false;
    }
    
    /*
     * Validate phone number. Use regex to check if number is a valid entry with respect to the given requirements
     */
     
     function validate_phone_number(){
         var number = $('#phone').val();
         //Use a regex to check if it's even possibly a phone number
         if(isphonenumber(number)){
           var strip = number.replace(/[^0-9]/g, '');
           //Must contain least 10 digits. Must be no greater than 15 digits
           if(strip.length > 15 || strip.length < 10){
             $('#phone_msg').html('<p id="phone_msg" class="text text-danger">Must contain least 10 digits. Must be no greater than 15 digits </p>');
             return false;
           }
         
          //Cannot begin with repeating number patterns like 000, 111, 222
          if(strip[0] === strip[1] && strip[0] === strip[2]){
            $('#phone_msg').html('<p id="phone_msg" class="text text-danger">Cannot begin with repeating number patterns like 000, 111, 222</p>');
            return false;
          }
          
          //Can not contain pattern of 10 sequential numbers, or 1010..or it's palidrome. There are only 6 possibilies, so we can just check directly
          if(strip.match("1234567890") || strip.match("0987654321") || strip.match("9876543210") || strip.match("0123456789") || strip.match("0101010101") ||  strip.match("1010101010")){
            $('#phone_msg').html('<p id="phone_msg" class="text text-danger">Can not contain pattern of 10 sequential numbers, or 1010... or 0101...</p>');
            return false;  
          }
           $('#phone_msg').html('<span id="phone_msg" class="glyphicon glyphicon-check text-success"></span>');
          return true;
         }
          $('#phone_msg').html('<p id="phone_msg" class="text text-danger">Invalid phone number format</p>');
         return false;
     }
   
   /*If all helper methods return true, then we are good to go */
    function validate(){
        if(validatename() && validate_email() && validate_phone_number()){
            $('#submit').removeClass("disabled");
        }else{
            $('#submit').addClass("disabled"); 
        }
        
    }
    
   /*
    *  Regex to validate phone number in the following form 
    *  XXX-XXX-XXXX
       XXX.XXX.XXXX
       XXX XXX XXXX
    * */
    function isphonenumber(input) {
     var num = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
      var regex = new RegExp(num);
      
      if(regex.test(input)) {
        return true;
      }  
      return false;
   }
    </script>
</html>
