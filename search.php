<?php?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>view</title>
    <style>
            .header {
        background-color: aquamarine;
        height: 150px;
    }

    .header a {
        background-color: red;
        padding: 15px;
        border: 1px solid blue;
        margin: 10px;
        color: white;
        font-size: 2rem;
        text-decoration: none;

    }

    footer {
        height: 80px;
        width: 100%;
        background-color: aquamarine;
        padding-left: 400px;
        padding-top: 20px;
    }
    body {
        color: black;
        align-content: center;
        margin: 0;
        padding: 0;

    }

    table {
        border-collapse: collapse;
        width: 100%;

    }

    th,
    td {
        text-align: center;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
        color: black;
    }

    th {
        background-color: black;
        color: white;
        font-weight: bolder;
    }


    #myInput {
        background-image: url('/css/searchicon.png');
        background-position: 10px 10px;
        background-repeat: no-repeat;
        width: 30%;
        font-size: 12px;
        padding: 10px 12px 8px 25px;
        border: 1px solid #ddd;
        margin-bottom: 12px;
    }

    span {
        color: blue;
        font-size: 25px;
    }


    .home {
        text-decoration: None;
        background: green;
        color: yellow;
        margin-left: 5%;
        padding: .5%;
        border-radius: 5px;
        letter-spacing: 2px;
        font-size: 18px;
    }

    .home:hover {
        background-color: blue;
        color: white;
    }
    </style>
</head>

<body>
<center>
        <div class="header">
            <h1>Flight management system</h1>
            <a href="insert.html">Insert</a>
            <a href="search.php">Search</a>
        </div>
    </center>
<center>
    <span>flight details</span> <br />
 <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search by ID.." title="Type in a name">
 </center>
        <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_flight";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM tb_f";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    echo "<table id='myTable'>";
	echo "<tr><th>id</th><th>name</th><th>price</th><th>seat</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
	echo "<tr>";
        echo "<td>" . $row["id"]. "</td><td>" . $row["name"]. "</td><td>" .$row["price"]."</td><td>" .$row["seat"]."</td>";
        
	echo "</tr>";
    }
echo "</table>";
} else {
    echo "0 results";
}



mysqli_close($conn);
?>


        <script>
        function myFunction() {
            var input, filter, table, tr, td, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
        </script>

        <br />
        <br />

</body>
<footer>
        <h2>developed by : shakil</h2>
    </footer>

</html>
<?php ?>