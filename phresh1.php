<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

</head>

<body>

<script>

function makeUserData(){
    var dataSend= {
        "account_medium":"basic",
        "credentials": { "username": "andrehsuyy", "password": "1234" },
        "profile": { "email": "andrehsuy@gmail.com", "first_name":"a", "last_name":"h", "base_categories":"male" }
    }
    return dataSend;
}

function makeUser(){
    $.ajax({
           url: "http://phresh-lb-1028091368.us-west-2.elb.amazonaws.com/phresh-server/user",
           type: 'POST',
           data: JSON.stringify(makeUserData()),
           processData: false,
           dataType: 'json',
           headers: {
           "Content-Type":"application/json"
           },
           success: function(response, textStatus, jqXHR){
           console.log(response)
           },
           error: function(jqXHR, textStatus, errorThrown){
           alert("error");
           }
           });	
}


makeUser();

</script>








</body>
</html>