<!DOCTYPE html>
<html>
<head>
  <title>User List</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    h1 {
      font-size: 24px;
      text-align: left;
    }
    table {
      margin: inherit;
      width: 50%;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }
    th {
      background-color: #f2f2f2;
    }
    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
    tr:hover {
      background-color: #ddd;
    }
    .button {
      background-color: #4CAF50;
      border: none;
      color: white;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 20px;
      cursor: pointer;
      border-radius: 5px;
    }
    .button:hover {
      background-color: #3e8e41;
    }
  </style>
</head>
<body>
  <h1>User List</h1>
  <?php
    // Connect to MySQL database
    $host = 'localhost';
    $username = '<db-user>';
    $password = '<db-pass>';
    $dbname = '<db>';
    $conn = mysqli_connect($host, $username, $password, $dbname);

    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
    }

    // Query the database for all users
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);

    // Display user data in a table
    if (mysqli_num_rows($result) > 0) {
      echo "<table>";
      echo "<tr><th>ID</th><th>Name</th><th>Email</th></tr>";
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "</tr>";
      }
      echo "</table>";
    } else {
      echo "No users found.";
    }

    // Close database connection
    mysqli_close($conn);
?>
<button class="button" onclick="window.location.href='add_user.php'">Add User</button>
</body>
</html>