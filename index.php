<?php
    include('function.php');

    if (isset($_POST['submit_btn'])) {
        $msg = $obj->add_information($_POST);
    }

    $receive_data = $obj->display_data();

    if(isset($_GET['status'])){
        if($_GET['status']='delete_btn'){
            $id = $_GET['id'];
            $dlt_msg = $obj->delete_data_by_id($id);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Techworld Crudapp</title>
    <link rel="stylesheet" href="Bootstrap/bootstrap.min.css">
</head>

<body>

    <div class="container shadow rounded my-4 p-4">
        <form action="" method="POST" enctype="multipart/form-data">
            <h1 class="text-primary"> <a style="text-decoration:none;" href="index.php"> Techworld Studect Club</a></h1>
            <span class="text-success"><?php if(isset($dlt_msg)){echo $dlt_msg; } ?></span>
            <span class="text-success"><?php if (isset($msg)) echo $msg; ?></br></span>

            <label for="std_name">Your Name</label>
            <input class="form-control mb-2" type="text" name="std_name">

            <label for="std_roll">Your Roll</label>
            <input class="form-control mb-2" type="text" name="std_roll">

            <label for="std_name">Upload Your image</label>
            <input class="form-control mb-3" type="file" name="std_img">

            <input class="form-control btn btn-primary mb-3" type="submit" value="Submit Your Information" name="submit_btn">
        </form>
    </div>

    <div class="container table-responsive mt-4">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Roll</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($student = mysqli_fetch_assoc($receive_data)) { ?>
                    <tr>
                        <td><?php echo $student['id']; ?></td>
                        <td><?php echo $student['std_name']; ?></td>
                        <td><?php echo $student['std_roll']; ?></td>
                        <td><img height="100px" src="upload/<?php echo $student['std_img']; ?>" alt=""></td>
                        <td>
                            <a class="btn btn-warning" href="edit.php?status=edit_btn&&id=<?php echo $student['id']; ?>">Edit</a>
                            <a class="btn btn-danger" href="?status=delete_btn&&id=<?php echo $student['id']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>

</html>