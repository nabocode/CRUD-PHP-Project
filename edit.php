<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Hello, world!</title>

    <style>
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <h1 class="text-center">PHP OOP CRUD</h1>
            <hr style="height: 1px; color: #000000; background: #000000;">
        </div>
    </div>
    <div class="row">
        <div class="col-md-5 mx-auto">
            <?php
            include 'model.php';
            $model = new Model();
            $id = $_REQUEST['id'];
            $row = $model->edit($id);

            if (isset($_POST['update'])) {
                if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['tel']) && isset($_POST['address'])) {
                    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['tel']) && !empty($_POST['address'])) {

                        $data['id'] = $id;
                        $data['name'] = $_POST['name'];
                        $data['email'] = $_POST['email'];
                        $data['tel'] = $_POST['tel'];
                        $data['address'] = $_POST['address'];

                        $update = $model->update($data);

                        if ($update) {
                            echo "<script>alert('Update successfully!');</script>";
                            echo "<script>window.location.href = 'records.php'</script>";
                        } else {
                            echo "<script>alert('Update failed!');</script>";
                            echo "<script>window.location.href = 'records.php'</script>";
                        }
                    } else {
                        echo "<script>alert('empty');</script>";
                        header("Location: edit.php?id=$id");
                    }
                }
            }
            ?>

            <form action="" method="post">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Tel</label>
                    <input type="text" name="tel" value="<?php echo $row['tel']; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Address</label>
                    <textarea name="address" id="" cols="" rows="3"  class="form-control"><?php echo $row['address']; ?></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
-->
</body>
</html>