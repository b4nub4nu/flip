<html>
	<head>
		<title>Flip</title>
	</head>
	<body>
		<form method="post" action="/flip/?menu=2">
			<table>
			<tr><td>Kode Bank </td><td><input type="text" id="bank_code" name="bank_code"></td></tr>
			<tr><td>Nomor Rekening </td><td><input type="text" id="account_number" name="account_number"></td></tr>
			<tr><td>Nominal </td><td><input type="text" id="amount" name="amount" ></td></tr>
			<tr><td>Keterangan </td><td><input type="text" id="remark" name="remark"></td></tr>
			<tr><td>&nbsp;</td><td><button type="submit">Submit</button></td></tr>
			</table>
		</form>
		<br>
			<a  href="/flip/?menu=3">Daftar Disbursment</a>
	</body>
</html>