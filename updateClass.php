<?php 
    include 'db.php';
    $classId = $_GET['classId'];

    $query = "SELECT * FROM class WHERE classId = '$classId'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $className = $_POST['className'];
        $course = $_POST['course'];

        $query_update = "UPDATE class SET className = '$className', course = '$course'";
        $result_update = mysqli_query($conn, $query_update);
        if ($result_update) {
            echo "<script>
                alert('Update class Success!');
                window.location.href = 'readClass.php';
            </script>";
        } else {
            echo "<script>
                alert('Update class Fail!');
                window.location.href = 'readClass.php';
            </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Update Student Information</h2>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . "?classId=$classId"; ?>" enctype="multipart/form-data" method="POST">
        <div class="mb-3">
            <label for="className" class="form-label">className</label>
            <input type="text" class="form-control" name="className" value="<?php echo $row['className']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="course" class="form-label">Course</label>
            <input type="text" class="form-control" name="course" value="<?php echo $row['course']; ?>" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>