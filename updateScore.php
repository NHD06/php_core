<?php 
    include 'db.php';
    $studentId = $_GET['studentId'];

    $query = "SELECT * FROM score WHERE studentId = '$studentId'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $subjectId = $_POST['subjectId'];
        $testScore = $_POST['testScore'];
        $query_update = "UPDATE score SET subjectId = '$subjectId', testScore = '$testScore' WHERE studentId = '$studentId' AND subjectId = '{$row['subjectId']}'";

        $result_update = mysqli_query($conn, $query_update);
        if ($result_update) {
            echo "<script>
                alert('Update score Success!');
                window.location.href = 'readScore.php';
            </script>";
        } else {
            echo "<script>
                alert('Update score Fail!');
                window.location.href = 'readScore.php';
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
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . "?studentId=$studentId"; ?>" enctype="multipart/form-data" method="POST">
        <div class="mb-3">
            <label for="subjectId" class="form-label">SubjectId</label>
            <input type="text" class="form-control" name="subjectId" value="<?php echo $row['subjectId']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="testScore" class="form-label">TestScore</label>
            <input type="text" class="form-control" name="testScore" value="<?php echo $row['testScore']; ?>" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>