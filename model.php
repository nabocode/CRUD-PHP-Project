<?php

Class Model {

    private $server = "localhost";
    private $username = "root";
    private $password = "root";
    private $dp = "oop_crud";
    private $conn;

    public function __construct() {
        try {
            $this->conn = new mysqli($this->server, $this->username, $this->password, $this->dp);
        } catch (Exception $e) {
            echo "Connection failed" . $e->getMessage();
        }
    }

    public function insert () {

        if (isset($_POST['submit'])) {
            if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['tel']) && isset($_POST['address'])) {
                if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['tel']) && !empty($_POST['address'])) {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $tel = $_POST['tel'];
                    $address = $_POST['address'];

                    $query = "INSERT INTO records (name, email, tel, address) VALUES ('$name', '$email', '$tel', '$address')";
                    if ($sql = $this->conn->query($query)) {
                        echo "<script>alert('Records added success!');</script>";
                        echo "<script>window.location.href = 'index.php'</script>";
                    } else {
                        echo "<script>alert('Failed :(');</script>";
                        echo "<script>window.location.href = 'index.php'</script>";
                    }
                } else {
                    echo "<script>alert('empty');</script>";
                    echo "<script>window.location.href = 'index.php'</script>";
                }
            }
        }

    }

    public function fetch () {
        $data = null;

        $query = "SELECT * FROM records";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
            return$data;
        }
    }

    public function delete($id) {
        $query = "DELETE FROM records where id='$id'";
        if ($sql = $this->conn->query($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function fetch_single($id) {
        $data = null;

        $query = "SELECT * FROM records WHERE id = '$id'";
        if ($sql = $this->conn->query($query)) {
            while ($row = $sql->fetch_assoc()) {
                $data= $row;
            }
        }
        return $data;
    }

    public function edit($id) {
        $data = null;

        $query = "SELECT * FROM records WHERE id = '$id'";
        if ($sql = $this->conn->query($query)) {
            while ($row = $sql->fetch_assoc()) {
                $data = $row;
            }
        }
        return $data;
    }

    public function update($data) {
        $query = "UPDATE records SET name='$data[name]', email='$data[email]', tel='$data[tel]', address='$data[address]' WHERE id='$data[id]'";

        if ($sql = $this->conn->query($query)) {
            return true;
        } else {
            return false;
        }
    }

}
