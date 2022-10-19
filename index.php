
<?php 
require_once "db.php";

$query=mysqli_query($connection,"SELECT types.typ, count(drinks.ID) as pocet, people.name as jmeno 
                                 FROM drinks
                                 INNER JOIN people ON drinks.id_people = people.ID
                                 INNER JOIN types ON drinks.id_types = types.ID
                                 GROUP BY types.typ");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <!-- Responsive Design -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/9526c175c2.js" crossorigin="anonymous"></script>
        <!-- CSS -->

        <style>
            table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            }

            td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            }

            tr:nth-child(even) {
            background-color: #dddddd;
            }
        </style>
	</head>

	<body>
        <div class="table">
            <table>
                <tr>
                    <th>Typ</th>
                    <th>Pocet</th>
                    <th>Kdo</th>
                </tr>
                <?php while ($row = mysqli_fetch_array($query)) { ?>
                    <tr>
                        <td><?php echo $row['typ']; ?></td>
                        <td><?php echo $row['pocet']; ?></td>
                        <td><?php echo $row['jmeno']; ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>

	</body>
</html>