<!DOCTYPE html>
<html>
<head>
  <title>Add User</title>
  <style>
    form {
      width: 30%;
      margin: inherit;
      padding: 10px;
      border: 3px solid #ccc;
      border-radius: 5px;
    }
    label, input {
      display: block;
      margin-bottom: 10px;
    }
    input[type="submit"] {
      padding: 10px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #3e8e41;
    }
    button {
      padding: 10px;
      background-color: #f44336;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    button:hover {
      background-color: #da190b;
    }
  </style>
</head>
<body>
  <h1>Add User</h1>
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

    // Check if the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Get the user data from the form
      $name = $_POST['name'];
      $email = $_POST['email'];

      // Insert the user data into the database
      $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
      if (mysqli_query($conn, $sql)) {
        echo "New user added successfully.";
      } else {
        echo "Error: " . mysqli_error($conn);
      }
    }

    // Close database connection
    mysqli_close($conn);
  ?>
  <br>
  <form method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email">
    <input type="submit" value="Add User">
  </form>
  <br>
  <button onclick="window.location.href='index.php'">Back to User List</button>
</body>
</html>