<!DOCTYPE html>
<html>
<head>
    <title>Manage Pelanggan</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 40px;
            background-color: #f4f7f9;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
            font-weight: 600;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        input[type="text"], input[type="email"], select {
            width: 100%;
            padding: 7px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        .btn {
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 600;
        }

        .btn-update {
            background-color: #28a745;
            color: white;
        }

        .btn-update:hover {
            background-color: #218838;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }

        .msg {
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .success {
            color: green;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>

<?php
$con = mysqli_connect("localhost", "root", "", "icm572") or die(mysqli_connect_error());

// Update logic
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $status = $_POST['status'];

    $update = mysqli_query($con, "UPDATE pelanggan SET 
        name='$name', 
        phone='$phone', 
        email='$email', 
        address='$address', 
        gender='$gender',
        status='$status'
        WHERE id='$id'") or die(mysqli_error($con));

    if ($update) {
        echo "<p class='msg success'>✔ Data for <strong>$name</strong> updated successfully!</p>";
    } else {
        echo "<p class='msg error'>✖ Failed to update data.</p>";
    }
}

// Delete logic
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $delete = mysqli_query($con, "DELETE FROM pelanggan WHERE id='$id'") or die(mysqli_error($con));

    if ($delete) {
        echo "<p class='msg success'>🗑 Record deleted successfully!</p>";
    } else {
        echo "<p class='msg error'>✖ Failed to delete record.</p>";
    }
}

$carian = mysqli_query($con, "SELECT * FROM pelanggan") or die(mysqli_error($con));

echo "<h1>Senarai Pelanggan</h1>";

echo "<table>
<tr>
    <th>ID</th>
    <th>Nama</th>
    <th>Phone</th>
    <th>Email</th>
    <th>Address</th>
    <th>Gender</th>
    <th>Status</th>
    <th>Action</th>
</tr>";

while ($data = mysqli_fetch_array($carian)) {
    echo "<tr>
        <form method='post' action=''>
            <td><input type='hidden' name='id' value='{$data['id']}'>{$data['id']}</td>
            <td><input type='text' name='name' value='{$data['name']}'></td>
            <td><input type='text' name='phone' value='{$data['phone']}'></td>
            <td><input type='email' name='email' value='{$data['email']}'></td>
            <td><input type='text' name='address' value='{$data['address']}'></td>
            <td>
                <select name='gender'>
                    <option value='Male' " . ($data['gender'] == 'Male' ? 'selected' : '') . ">Male</option>
                    <option value='Female' " . ($data['gender'] == 'Female' ? 'selected' : '') . ">Female</option>
                </select>
            </td>
            <td>
                <select name='status'>
                    <option value='CUSTOMER' " . ($data['status'] == 'CUSTOMER' ? 'selected' : '') . ">Customer</option>
                    <option value='ADMIN' " . ($data['status'] == 'ADMIN' ? 'selected' : '') . ">Admin</option>
                </select>
            </td>
            <td>
                <input type='submit' name='update' value='Update' class='btn btn-update'>
                <input type='submit' name='delete' value='Delete' class='btn btn-delete' onclick=\"return confirm('Are you sure to delete this record?');\">
            </td>
        </form>
    </tr>";
}

echo "</table>";

mysqli_close($con);
?>

</body>
</html>
