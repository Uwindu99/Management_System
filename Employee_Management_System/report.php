<?php  
 $connect = mysqli_connect("localhost", "root", "", "project");  
 $sql = "SELECT * FROM assign";

 
   
 $result = mysqli_query($connect, $sql);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Fetch Data from Two or more Table Join using PHP and MySql</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br />  
           <div class="container" style="width:500px;">  
                <center><h3>Final Report</h3></center><br />                 
                <div class="table-responsive">  
                     <table class="table table-striped">  
                          <tr>  
                               <th>Eid</th>  
                              
                               <th>Tid</th>
                               <th>Activity id</th>
                               <th>Assign Date</th>
                               <th>Remark</th> 
                              
                          </tr>  
                          <?php  
                          if(mysqli_num_rows($result) > 0)  
                          {  
                               while($row = mysqli_fetch_array($result))  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $row["Eid"];?></td>  
                                 
                               <td><?php echo $row["Tid"]; ?></td> 
                               <td><?php echo $row["Activityid"]; ?></td>
                               <td><?php echo $row["dateassign"]; ?></td>  
                               <td><?php echo $row["remarks"]; ?></td>
                               
                          </tr>  
                          <?php  
                               }  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
           <br />  
      </body>  
 </html> 