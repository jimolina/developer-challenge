<!DOCTYPE html>
<html>
   <!-- Boostrap CVN, JQuery, link to stylesheet,everything head tag -->
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
     
        
    </body>
    <script type="text/javascript">
    //Navigation Animation Effect
    $('#mainNav').affix({
      offset: {
        top: 100
      }
    });
    </script>
</html>
