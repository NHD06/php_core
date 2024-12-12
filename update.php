<?php 
include 'db.php';

$studentId = $_GET['studentId'];
$query = "SELECT * FROM students WHERE studentId = '$studentId'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST['fullname'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $classId = $_POST['classId'];
    $email = $_POST['email'];

    // Kiểm tra và xử lý upload avatar nếu có
    $avatar_name = $row['avatar']; // Giữ nguyên avatar cũ nếu không upload mới
    if (!empty($_FILES['avatar']['name'])) {
        $avatar_name = $_FILES['avatar']['name'];
        $upload_dir = 'upload/';
        $target_path = $upload_dir . basename($avatar_name);
        move_uploaded_file($_FILES['avatar']['tmp_name'], $target_path);
    }

    $query_update = "UPDATE students SET fullname='$fullname', dob='$dob', gender='$gender', classId='$classId', email='$email', avatar='$avatar_name' WHERE studentId='$studentId'";
    $result_update = mysqli_query($conn, $query_update);

    if ($result_update) {
        echo "<script>
            alert('Update Success!');
            window.location.href = 'readStudent.php';
        </script>";
    } else {
        echo "<script>
            alert('Update Fail!');
            window.location.href = 'readStudent.php';
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
            <label for="fullname" class="form-label">Fullname</label>
            <input type="text" class="form-control" name="fullname" value="<?php echo $row['fullname']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="dob" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" name="dob" value="<?php echo $row['dob']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select class="form-select" name="gender" required>
                <option value="Male" <?php if ($row['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                <option value="Female" <?php if ($row['gender'] == 'Female') echo 'selected'; ?>>Female</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="classId" class="form-label">Class ID</label>
            <input type="text" class="form-control" name="classId" value="<?php echo $row['classId']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="avatar" class="form-label">Avatar</label>
            <input type="file" class="form-control" name="avatar">
            <img src="upload/<?php echo $row['avatar']; ?>" alt="Avatar" class="img-thumbnail mt-3" width="100">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
