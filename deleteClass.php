<?php 
    include 'db.php';
    $classId = $_GET['classId'];

    $query_delete_student = "DELETE FROM students WHERE classId = '$classId'";
    $result_delete_student = mysqli_query($conn, $query_delete_student);

    $query = "DELETE FROM class WHERE classId = '$classId';";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>
            alert('Delete class Success!');
            window.location.href = 'readClass.php';
        </script>";
    } else {
        echo "<script>
            alert('Delete class Fail!');
            window.location.href = 'readClass.php';
        </script>";
    }
?>