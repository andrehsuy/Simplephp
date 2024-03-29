<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

</head>

<body>

<script>

/*Used to create a user w/o Facebook using basic credentials*/
function createUser(username,password, email, gender){
	var dataSend= {
        'account_medium':'basic',
        'credentials': {
            'username': username,
            'password':password
        },
        'profile': {
            'email':email,
            'base_categories':gender
        }
	};
    
	$.ajax({
           url: 'http://ec2-54-193-73-153.us-west-1.compute.amazonaws.com:8080/phresh-server/user',
           type: 'POST',
           
           data: JSON.stringify(dataSend),
           processData: false,
           contentType: "application/json;charset=ISO-8859-1",
           headers: {
           "Content-Type":"application/json"
           },
           error:function(xhr, status, error){
           if(xhr.responseText == "")
           console.log("EMPTY RESPONSE");
           console.log('response: ' + xhr.responseText);
           }
           }).done(function(json){ //created!
                   console.log(json);
                   }).fail(function(jqXHR, textStatus){ //ERROR
                           console.log(jqXHR.responseText);
                           console.log('FAILURE: ' + textStatus);
                           });
}

/*login w/o Facebook*/
function login(username, password){
	var dataSend = {
        "account_medium":"basic",
        "credentials":
        {
            "username":username,
            "password":password
        }
	};
	
	$.ajax({
           url: 'http://ec2-54-193-73-153.us-west-1.compute.amazonaws.com:8080/phresh-server/user/login',
           type: 'POST',
           data: JSON.stringify(dataSend),
           processData: false,
           contentType: "application/json",
           headers: {
           "Content-Type":"application/json"
           }
           })
	.done(function(json){
          console.log('AUTH_TOKEN: ' + json.auth_token);
          getItems(json.auth_token);
          
          })
	.fail(function(jqXHR, textStatus){ //ERROR
          //no user or no connection
          });
}

/*called on login complete to get 5 items*/
function getItems(auth_token){
	$.ajax({
           url: 'http://ec2-54-193-73-153.us-west-1.compute.amazonaws.com:8080/phresh-server_delete/closet?limit=5&offset=10',
           crossDomain:true,
           beforeSend: function(xhr){
           console.log('before send');
           xhr.setRequestHeader('Authorization', auth_token);	
           },
           headers: {
           "Authorization": auth_token
           }
           })
	.done(function(json){
          console.log(json);
          })
	.fail(function(jqXHR, textStatus){
          console.log('Fail: ' + textStatus);
          });
}

function getItemsR(auth_token){
	$.ajax({
           url: 'http://ec2-54-193-73-153.us-west-1.compute.amazonaws.com:8080/phresh-server_delete/items?limit=5&offset=10',
           crossDomain:true,
           beforeSend: function(xhr){
           console.log('before send');
           xhr.setRequestHeader('Authorization', auth_token);
           },
           headers: {
           "Authorization": auth_token
           }
           })
	.done(function(json){
          console.log(json);
          })
	.fail(function(jqXHR, textStatus){
          console.log('Fail: ' + textStatus);
          });
}


function addItems(auth_token, item_id){
	$.ajax({
           url: 'http://ec2-54-193-73-153.us-west-1.compute.amazonaws.com:8080/phresh-server_delete/closet',
           type: 'POST',
           data: JSON.stringify({"item_id": item_id, "delete": "false"}),
           contentType: 'application/json; charset=utf-8',
           dataType: 'json',
           processData: false,
           crossDomain:true,
           beforeSend: function(xhr){
           console.log('before send');
           xhr.setRequestHeader('Authorization', auth_token);
           },
           headers: {
           "Authorization": auth_token
           }
           })
	.done(function(json){
          console.log(json);
          })
	.fail(function(jqXHR, textStatus){
          console.log('Fail: ' + textStatus);
          });
}

function deleteItems(auth_token, item_id){
	$.ajax({
           url: 'http://ec2-54-193-73-153.us-west-1.compute.amazonaws.com:8080/phresh-server_delete/closet',
           type: 'POST',
           data: JSON.stringify({"item_id": item_id, "delete": "true"}),
           contentType: 'application/json; charset=utf-8',
           dataType: 'json',
           processData: false,
           crossDomain:true,
           beforeSend: function(xhr){
           console.log('before send');
           xhr.setRequestHeader('Authorization', auth_token);
           },
           headers: {
           "Authorization": auth_token
           }
           })
	.done(function(json){
          console.log(json);
          })
	.fail(function(jqXHR, textStatus){
          console.log('Fail: ' + textStatus);
          });
}

$(document).ready(function() {
                  //addItems("lgs8y6mlt9hzcif5pslaqmsjg", "shop_style405806507Blue7 M");
                  getItems("lgs8y6mlt9hzcif5pslaqmsjg");
                  //deleteItems("lgs8y6mlt9hzcif5pslaqmsjg", "shop_style431307548Blush Suede/Gold Chrome8 B(M) US");
                  getItems("lgs8y6mlt9hzcif5pslaqmsjg");
                  });




</script>



</body>
</html>