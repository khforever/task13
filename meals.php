<!DOCTYPE html>
<html lang="en">
<head>
    <title>Posts</title>
    <link rel="stylesheet" href="css/posts.css">
    <link rel="stylesheet" href="css/style2.css">
</head>
<body>
  <!-- Start Navbar -->
  <nav id='menu'>
    <input type='checkbox' id='responsive-menu' onclick='updatemenu()'><label></label>
    <ul>
      <li><a href=''>Home</a></li>
      <li><a class='dropdown-arrow' href=''>Posts</a>
        <ul class='sub-menus'>
          <li><a href=''>Posts List</a></li>
          <li><a href=''>Add Car</a></li>
        </ul>
      </li>
      <li><a class='dropdown-arrow' href='testimonials.php'>Users</a>
        <ul class='sub-menus'>
          <li><a href=''>Users List</a></li>
        </ul>
      </li>
      <li><a href='#'>Contact Us</a></li>
    </ul>
  </nav>
  <!-- End Navbar -->


  <?php
require ("database.php");
$db =new DB ();
$db->get_connection();
$data=$db->select("*","meals");
$meals=$data->fetchAll(PDO::FETCH_ASSOC);
  

if (isset($_POST['delete']))

{

  $id=$_POST['id'];

  $data=$db->delete("meals","id=$id");
}

?>

        <div id="wrapper">
         <h1>Meals</h1>
         
         <table id="keywords" cellspacing="0" cellpadding="0">
           <thead>
             <tr>
               <th><span>Title</span></th>
			   <th><span>Price</span></th>
               <th><span>Type</span></th>
               <th><span>Size</span></th>
               <th><span>Delete</span></th>
               <th><span>Update</span></th>
             </tr>
           </thead>
           <tbody>

           <?php


foreach($meals as $meal)

{

  
?>
             <tr>
               <td class="lalign"><?php   echo $meal['title'] ;          ?></td>
			   <td>2 <?php   echo $meal['price'] ;          ?></td>
               <td><?php if( isset($meal['type'])== 1) 
               echo "family";
               else
               echo "single";         ?></td>
               <td><?php   if( $meal['size']==0)
               
               echo "Small";
               else
               echo "Medium";
               ?></td>


               <td>  
                <form method="POST">

                <input type="hidden" name="id"  value="<?php echo $meal['id'] ?>" >

                <input type="submit" name="delete"  value="delete" >
                </form>
               </td>
               <td><a href=""><img  src="../assets/imgs/update.jpg" alt="Delete"></a></td>
             </tr>

           <?php
           
}

          ?>
           </tbody>
         </table>
        </div> 
</body>
</html>
