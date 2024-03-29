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
