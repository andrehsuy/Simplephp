<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

</head>

<body>
<div id="fb-root"></div>
<fb:login-button id="fb-login-button" scope="publish_actions" show-faces="true" width="200"></fb:login-button><br>
<script>




window.fbAsyncInit = function() {
    FB.init({
            appId      : appId,
            status     : true, // check login status
            cookie     : true, // enable cookies to allow the server to access the session
            xfbml      : true  // parse XFBML
            });
    FB.Event.subscribe('auth.authResponseChange', function(response) {
                       if (response.status === 'connected') {
                       //This is what runs when the user connects to Facebook
                       userConnected();
                       } else if (response.status === 'not_authorized') {
                       FB.login();
                       } else {
                       FB.login();
                       }
                       });
};
(function(d){
 var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
 if (d.getElementById(id)) {return;}
 js = d.createElement('script'); js.id = id; js.async = true;
 js.src = "//connect.facebook.net/en_US/all.js";
 ref.parentNode.insertBefore(js, ref);
 }(document));

</script>


<script>
var appId = 206013596249981;

function userConnected()
{
    
    FB.getLoginStatus( function(response)
                       {
                            alert('hi');
                            var uid = response.authResponse.userID;
                            var accessToken = response.authResponse.accessToken;
                            var token;
                            $.support.cors = true;
                    
                      var arr = {
                                "account_medium":"basic",
                                "credentials": { "username":"andrehsu", "password":"test" },
                                "profile": { "email":"andrehsuy@gmail.com", "first_name":"Andre", "last_name":"Hsu", "base_categories":"male" }
                                };

                      $.ajax({
                             url: 'http://phresh-lb-1028091368.us-west-2.elb.amazonaws.com/phresh-server/user',
                             type: 'POST',
                             data: JSON.stringify(arr),
                             processData: false,
                             contentType: 'application/json; charset=UTF-8',
                             async: false,
                             success: function(msg) {
                             alert(msg);
                             },
                             error: function(jqXHR, textStatus, errorThrown){
                             alert('something went wrong');
                             }
                             });
                      
                      }
                );
}

    
    
</script>


<span id="tokenTest"></span>



</body>
</html>