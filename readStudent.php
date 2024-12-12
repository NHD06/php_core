<?php 
    include 'db.php';
    $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
    if(!empty($keyword)){
        $query = $query = "SELECT * FROM students WHERE studentId LIKE '%$keyword%' OR fullname LIKE '%$keyword%'";
        $result = mysqli_query($conn, $query);
    }
    else{
        $query = "SELECT * FROM students";
        $result = mysqli_query($conn, $query);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
</head>
<style>
    button {
        margin-bottom: 16px;
    }

    button a {
        text-decoration: none;
        color: aliceblue;
    }

    table th, table td {
        text-align: center;
        vertical-align: middle;
    }

    .action-contain{
        display: flex;
        gap: 25px;
    }
    .input-group{

    }

    .action-contain form{
        position: relative;
        width: 270px;
        height: 50px;
    }
    .action-contain form input{
        position: absolute;
        border-radius: 13px;
        width: 250px;
    }

    .action-contain form i{
        position: absolute;
        right: 29px;
        top: 5px;
        cursor: pointer;
    }
</style>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Student List</h2>

        <div class="action-contain">
            <button type="button" class="btn btn-success"><a href="/insertStudent.php">Insert student</a></button>
            <button type="button" class="btn btn-success"><a href="/read/readClass.php">Read Class</a></button>
            <button type="button" class="btn btn-success"><a href="/read/readScore.php">Read Score</a></button>
            <button type="button" class="btn btn-success"><a href="/read/readSubject.php">Read Subject</a></button>
            <form method="GET">
                <input type="text" name="keyword" placeholder="Search" value="<?php echo isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : ''; ?>">
                <i class="fa-solid fa-magnifying-glass"></i>
            </form>
        </div>
        <table class="table table-striped table-bordered">
            <thead class="table-dark text-center">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Student ID</th>
                    <th scope="col">Date of Birth</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Class</th>
                    <th scope="col">Email</th>
                    <th scope="col">Avatar</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $index = 1;
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td>". $index++ . "</td>";
                        echo "<td>" .$row['studentId']. "</td>";
                        echo "<td>" .$row['fullname']. "</td>";
                        echo "<td>" .$row['dob']. "</td>";
                        echo "<td>" .$row['gender']. "</td>";
                        echo "<td>" .$row['classId']. "</td>";
                        echo "<td>" .$row['email']. "</td>";
                        echo "<td><img src='upload/".$row['avatar'] ."' alt='avatar' class='img-thumbnail' width='80'></td>";
                        echo "<td>
                                <a href='update.php?studentId=" . $row['studentId'] . "' class='btn btn-warning btn-sm'>Update</a>
                                <a href='delete.php?studentId=" . $row['studentId'] . "' class='btn btn-danger btn-sm' onclick='return confirmDelete();'>Delete</a>
                            </td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function confirmDelete(){
            return confirm('Are you sure you want to delete this student?');
        }
    </script>
</body>
</html>
