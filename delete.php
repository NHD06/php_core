<?php 
    include 'db.php';

    $studentId = $_GET['studentId'];

    $queryClass = "DELETE FROM score WHERE studentId = '$studentId'";
    $resultClass = mysqli_query($conn, $queryClass);
    $query = "DELETE FROM students WHERE `studentId` = '$studentId'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>
            alert('Delete student Success!');
            window.location.href = 'readStudent.php';
        </script>";
    } else {
        echo "<script>
            alert('Delete student Fail!');
            window.location.href = 'readStudent.php';
        </script>";
    }
?>