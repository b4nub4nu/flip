<html>
	<head>
		<title>Flip</title>
	</head>
	<body>
		Detail disbursment<br>
		<a href="/flip/?menu=3">Kembali</a><br>
		<table>
					<?php 
						echo '<tr><td>id disbursment </td><td>:</td><td> ' . $Data['id_disbursment'] . '</td></tr>';
						echo '<tr><td>status </td><td>:</td><td> ' . $Data['status_disbursment'] . '</td></tr>';
						echo '<tr><td>receipt </td><td>:</td><td> ' . $Data['receipt'] . '</td></tr>';
						echo '<tr><td>time served </td><td>:</td><td> ' . $Data['time_served'] . '</td></tr>';
					?>
		</table>		
	</body>
</html>
