<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "Project";

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$addedActivities = []; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["add"])) {
        $tid = $_POST["tid"];
        $activity = $_POST["activity"];
        
        $addedActivities[] = array(
            "tid" => $tid,
            "activity" => $activity,
        );
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
}

.container {
    text-align: center;
    margin-top: 20px;
}

.form-container {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

h2 {
    color: #007bff;
}

.form-group {
    margin-bottom: 20px;
}

.form-label {
    font-weight: bold;
}

.btn {
    margin-top: 10px;
}

.table-container {
    margin-top: 20px;
}

.table {
    width: 100%;
    border-collapse: collapse;
    background-color: #fff;
}

.table th, .table td {
    padding: 8px;
    text-align: center;
    border: 1px solid #ddd;
}

.delete-btn {
    background-color: #dc3545;
    color: #fff;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
}

.delete-btn:hover {
    background-color: #c82333;
}
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity Assigning</title>
   
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<center>
<div class="d-flex justify-content-center">
    <form id="activity-form" action="assgnTask.php" method="POST" class="p-4 bg-light rounded">
        <center><h2 style="color: #007bff;">Activities</h2></center>
        <table class="form-table">
            <tr>
                <td class="form-label">Task ID  </td>
                <td>
                    <select name="tid" id="tid" class="form-control">
                        <?php
                        // dropdown with Task IDs from the database
                        $sql = "SELECT Tid FROM task";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row["Tid"] . "'>" . $row["Tid"] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="form-label">Activity  </td>
                <td><input type="text" name="activity" class="form-control"/></td>
            </tr>
        </table>
        <button type="button" name="add" id="add" class="btn btn-success">Add</button>
    </form>
</div>
<br><br>
<div class="table-container">
    <table class="table">
        <thead class="mx-auto">
            <tr>
                <th>Task ID</th>
                <th>Activity</th>
                
            </tr>
        </thead>
        <tbody id="activity-table-body" class="mx-auto">
            
        </tbody>
    </table>
    <button type="submit" name="submit" id="submit" class="btn btn-primary">Save DB</button>
</div>
</center>

<script>
$(document).ready(function () {
    var addedActivities = []; 

    $("#add").click(function () {
        var tid = $("#tid").val();
        var activity = $("input[name='activity']").val();

        var newActivity = {
            "tid": tid,
            "activity": activity
        };

        addedActivities.push(newActivity);

        $("input[name='activity']").val("");

        refreshTable();
    });

    function refreshTable() {
        var tableBody = $("#activity-table-body");
        tableBody.empty(); 

        for (var i = 0; i < addedActivities.length; i++) {
            var data = addedActivities[i];
            var row = "<tr><td>" + data.tid + "</td><td>" + data.activity + "</td></tr>";
            tableBody.append(row);
        }

        $(".delete-btn").click(function () {
            var index = $(this).data("index");
            addedActivities.splice(index, 1);
            refreshTable(); 
        });
    }

    $("#submit").click(function () {
        $.ajax({
            type: "POST",
            url: "assigntask.php",
            data: { "addedActivities": addedActivities },
            success: function (response) {
                if (response === "success") {
                    alert("Data submitted successfully!");
                    addedActivities = [];
                    refreshTable();
                } else {
                  alert("Data submitted successfully!");
                    addedActivities = [];
                    refreshTable();
                }
            },
            error: function (xhr, status, error) {
                // Handle AJAX errors
                alert("AJAX Error: " + error);
            }
        });
    });
});

</script>
</body>
</html>
