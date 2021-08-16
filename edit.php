<?php
    include('function.php');

    if(isset($_GET['status'])){
        if($_GET['status']='edit_btn'){
            $id = $_GET['id'];
            $returndata = $obj->display_data_by_id($id);
        }
    }

    if(isset($_POST['update_btn'])){
        $update_msg = $obj->update_information($_POST);
    }

    


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student Information</title>
    <link rel="stylesheet" href="Bootstrap/bootstrap.min.css">

</head>
<body>
    <div class="container shadow rounded my-4 p-4">
        <form action="" method="POST" enctype="multipart/form-data">
            <h1 class="text-primary"> <a style="text-decoration:none;" href="index.php"> Techworld Studect Club</a></h1>
            <span class="text-success"><?php if(isset($update_msg)){echo $update_msg; } ?></span>

            <input type="hidden" value="<?php echo $returndata['id']; ?>" name="std_id" >  </br>
            <label for="u_std_name">Your Name</label>
            <input class="form-control mb-2" type="text" value="<?php echo $returndata['std_name']; ?>" name="u_std_name">
            <label for="u_std_roll">Your Roll</label>
            <input class="form-control mb-2" type="text" value="<?php echo $returndata['std_roll']; ?>" name="u_std_roll">

            <label for="std_name">Upload Your image</label>
            <input class="form-control mb-3" type="file" name="u_std_img">

            <input class="form-control btn btn-primary mb-3" type="submit" value="Update Information" name="update_btn">
        </form>
    </div>

</body>
</html>