<?php 
session_start();
if (!isset($_SESSION['cust_name'])) {
    header("Location: customer_login_register/login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="customer_login_register/welcome.css">
    <title>Welcome</title>
</head>
<body>
<?php include_once('includes/navbar.php'); ?>



<div class="background">
<?php
    $cust_name = $_SESSION['cust_name']; 
    ?>
    <br>
    <br><br>

    <div class="welcome"> Welcome <?php echo $cust_name ?> </div> <br>
   
            <div class="content">
                    <div class="text2">Here is your Informations</div>

                    <?php 
                    include 'customer_login_register/config.php';
                 $result=mysqli_query ($conn, "SELECT * FROM customer_data Where cust_name = '$cust_name' ") ;

                    ?>

        
                    <table border="1">
                      <thead>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Address</th>
                            <th>City</th>
                            <th>Country</th>
                      </thead>

                         <tbody>
                         <?php
                          while($row = mysqli_fetch_object($result))
                          {
                          ?>
                             <tr>
                                   <td> <?php echo $row->cust_name?>  </td>
                                     <td> <?php echo $row->cust_mail?></td>
                                     <td> <?php echo $row->cust_address?></td>
                                     <td> <?php echo $row->cust_city?></td> 
                                     <td> <?php echo $row->cust_country?></td> 
                                    
                              </tr>
                          <?php } ?>
                          </tbody>
                     </table>
            </div> <br>

            <button class="Logout_btn"><a href="customer_login_register/logout.php">Logout</a> </button>

    


</div>
   
</body>

</html>