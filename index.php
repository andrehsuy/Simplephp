<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
</head>
<body>
<div id="fb-root"></div>
<fb:login-button id="fb-login-button" scope="publish_actions" show-faces="true" width="200"></fb:login-button><br>
<script>
  var appId = 206013596249981;
  function userConnected() {
    FB.api('/me',  function(response) {
	  f.id = response.id;
	  f.name = response.name;
	  f.username = response.username;
	  f.gender = response.gender;
	
	  printEverything();
    });
  }
</script>
<script src="fb.js"></script>
</body>
</html>
