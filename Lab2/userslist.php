<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table{
      border-collapse: collapse;
      text-align: center;
    }
    td{
        border: 1px solid black;
    }
    tr{
      width: 20%;
    }

</style>
<body>
    <table style ="">
       <tr>
          <td>FirstName</td>
          <td>LastName</td>
          <td>Gender</td>
          <td>Address</td>
          <td>Country</td>
          <td>
            username    
          </td>
          <td>
            password
          </td>
          <td>Department</td>
          <td>
            Actions
          </td>
        </tr>
        
           <?php
             try
             {
                $resource=fopen('users.txt','r');
                while(!feof($resource)) {
                $data=fgets($resource);
                $data=preg_split('/\,/',$data); 
              
            ?>

            <tr>
               <td>
                  <?php echo $data[0]; ?>
               </td>
               <td>
                  <?php echo $data[1]; ?>
               </td>
               <td><?php echo $data[2]; ?></td>
               <td><?php echo $data[3]; ?></td>
               <td><?php echo $data[4]; ?></td>
               <td><?php echo $data[5]; ?></td>
               <td><?php echo $data[6]; ?></td>
               <td><?php echo $data[7]; ?></td>
               <td>
                 <a href="#">Show</a>
                 <a href="#">Edit</a>
                 <a href="#">Delete</a>
               </td>
            </tr>
           
            
            <?php
            }
          fclose($resource);
          }
        catch(Exception $ex)
    {
        echo 'error';
    }
    ?>
</table>
</body>
</html> 