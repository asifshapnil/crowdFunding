<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<script type="text/javascript" src="https://pt01.mul-pay.jp/ext/js/token.js"></script>
	<script type="text/javascript">
		Multipayment.init(9101225942865);
		Multipayment.getToken({
		  holdername: 'Crowd Test',
		  cardno: '4111111111111111',           // card number without spaces
		  expire: '201905',                     // expiry in format 'YYYYMM'
		  securitycode: '123'
		}, 'gmoResponseHandler');               // callback function should be a string only

		function gmoResponseHandler(response) {
			console.log(response);
		  if(repsonse.resultCode != '000') {
		    // show error message
		  } else {
		    token = response.tokenObject.token;
		    console.log(token);
		    // use this token instead of card details to create transactions
		  }
		}
	</script>
</body>
</html>