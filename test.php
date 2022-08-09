<?php 
session_start();
error_reporting(0);
include('includes/config.php');
$sql = "SELECT x_emp,y_emp,nom,description,image from  emplacement";
                            $query = $dbh -> prepare($sql);
                            $query->execute();
                            $results=$query->fetchAll(PDO::FETCH_OBJ);
                            if($query->rowCount() > 0)
                            {
                            foreach($results as $result)
                            {               
                                 ?>  
                                        <tr>

                                            <td><?php echo htmlentities($result->x_emp);?></td>
                                            <td><?php echo htmlentities($result->y_emp);?></td>
                                            <td><?php echo htmlentities($result->nom);?></td>
                                            <td><?php echo htmlentities($result->description);?></td>
                                            <td><?php $imgData = $result->fetch_assoc();
        
        //Render image
                                header("Content-type: image/jpg"); 
                                echo $imgData['image'];;?></td>
                                        </tr>
                                    <?php }}?>