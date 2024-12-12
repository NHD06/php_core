<?php 
    include 'db.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $studentId = $_POST['studentId'];
        $subjectId = $_POST['subjectId'];
        $testScore = $_POST['testScore'];

        $query = "INSERT INTO score(studentId, subjectId, testScore) VALUE ('$studentId', '$subjectId', '$testScore')";
        $result = mysqli_query($conn, $query);
        if($result){
            echo "<script>
                alert('Insert class Success!');
                window.location.href = 'readScore.php';
            </script>";
        }
        else{
            echo "<script>
                alert('Insert class Fail!');
                window.location.href = 'readScore.php';
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
        <h2 class="mb-4">Insert Score</h2>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">

            <!-- Student ID input -->
            <div class="form-outline mb-4">
                <input type="text" id="studentId" class="form-control" name="studentId" required />
                <label class="form-label" for="studentId">StudentId</label>
            </div>

            <!-- subjectId input -->
            <div class="form-outline mb-4">
                <input type="text" id="subjectId" class="form-control" name="subjectId" required />
                <label class="form-label" for="subjectId">SubjectId</label>
            </div>


            <!-- Date of Birth input -->
            <div class="form-outline mb-4">
                <input type="text" id="testScore" class="form-control" name="testScore" required />
                <label class="form-label" for="testScore">Test Score</label>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
    </div>

    <!-- MDB UI Kit script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.js"></script>
</body>
</html>