<html>
	<head>
		<title>Flip</title>
		
	</head>
	<body>
		Daftar Disbursment<br><a  href="/flip/?">Home </a>
				<table>
					<tr>
						<td>ID Disbursment</td>
						<td>Status</td>
						<td>Time served</td>
						<td>Receipt</td>
						<td>Created</td>
						<td>Fee</td>
						<td>Request</td>
					</tr>
					<?php 

						
						while ($list = $Data->fetch_array())
						{
							echo '<tr><td><a  href="?menu=3&id='.$list['id_disbursment'].'">'.$list['id_disbursment'].'</a></td><td>'.$list['status_disbursment'].'</td><td>'.$list['time_served'].'</td><td>'.$list['receipt'].'</td><td>'.$list['created_at'].'</td><td>'.$list['fee'].'</td><td>'.$list['request'].'</td></tr>';
						}

					?>
				</table>
	</body>
</html>
