<?php 
    include 'db.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $classId = $_POST['classId'];
        $className = $_POST['className'];
        $course = $_POST['course'];

        $query = "INSERT INTO class(classId, className, course) VALUE('$classId', '$className', '$course')";
        $result = mysqli_query($conn, $query);
        if($result){
            echo "<script>
                alert('Insert class Success!');
                window.location.href = 'readClass.php';
            </script>";
        }
        else{
            echo "<script>
                alert('Insert class Fail!');
                window.location.href = 'readClass.php';
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

            <!-- className input -->
            <div class="form-outline mb-4">
                <input type="text" id="className" class="form-control" name="className" required />
                <label class="form-label" for="className">ClassName</label>
            </div>

            <!-- Student ID input -->
            <div class="form-outline mb-4">
                <input type="text" id="classId" class="form-control" name="classId" required />
                <label class="form-label" for="classId">ClassId</label>
            </div>

            <!-- Date of Birth input -->
            <div class="form-outline mb-4">
                <input type="text" id="course" class="form-control" name="course" required />
                <label class="form-label" for="course">Course</label>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
    </div>

    <!-- MDB UI Kit script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.js"></script>
</body>
</html>
