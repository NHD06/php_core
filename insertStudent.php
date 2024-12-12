<?php 
    include 'db.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $studentId = $_POST['studentId'];
        $fullname = $_POST['fullname'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $classId = $_POST['classId'];
        $email = $_POST['email'];
        $avatar_name = $_FILES['avatar']['name'];
        $upload_dir = 'upload/';
        $target_path = $upload_dir . basename($avatar_name);
        move_uploaded_file($_FILES['avatar']['tmp_name'], $target_path);

        $query = "INSERT INTO students(studentId, fullname, dob, gender, classId, email, avatar) values('$studentId', '$fullname', '$dob', '$gender', '$classId', '$email', '$avatar_name')";
        $result = mysqli_query($conn, $query);
        if($result){
            echo "<script>
                alert('Insert Success!');
                window.location.href = 'readStudent.php';
            </script>";
        }
        else{
            echo "<script>
                alert('Insert Fail!');
            </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm Sinh Viên</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.css">
</head>
<style>
  body{
    width: 350px;
    margin: 0 auto;
    background-color: beige;
  }

  h2{
    text-align: center;
    font-family: sans-serif;
    font-weight: 500;
    letter-spacing: 3px;
    color: #CB9DF0;
  }
</style>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Insert student</h2>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">

            <!-- Fullname input -->
            <div class="form-outline mb-4">
                <input type="text" id="fullname" class="form-control" name="fullname" required />
                <label class="form-label" for="fullname">Fullname</label>
            </div>

            <!-- Student ID input -->
            <div class="form-outline mb-4">
                <input type="text" id="studentId" class="form-control" name="studentId" required />
                <label class="form-label" for="studentId">studentId</label>
            </div>

            <!-- Date of Birth input -->
            <div class="form-outline mb-4">
                <input type="date" id="dob" class="form-control" name="dob" required />
                <label class="form-label" for="dob">Date of birth</label>
            </div>

            <!-- Gender input -->
            <div class="form-outline mb-4">
                <label class="form-label d-block">Gender</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="Male" required />
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="Female" />
                    <label class="form-check-label" for="female">Female</label>
                </div>
            </div>

            <!-- Class input -->
            <div class="form-outline mb-4">
                <input type="text" id="classId" class="form-control" name="classId" required />
                <label class="form-label" for="class">ClassId</label>
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="email" id="email" class="form-control" name="email" />
                <label class="form-label" for="email">Email</label>
            </div>

            <!-- Avatar input -->
            <div class="form-outline mb-4">
                 <label class="form-label" for="avatar">Avatar</label>
                 <input type="file" id="avatar" class="form-control" name="avatar" accept="image/*" />
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
    </div>

    <!-- MDB UI Kit script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.js"></script>
</body>
</html>
