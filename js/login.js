var attempt = 3;

function validate() {
	var username = document.getElementById("username").value;
	var password = document.getElementById("password").value;
	
	if(username == "John" || password == "password"){
		alert("Username and Password can't be null.");
	}else{

		$.ajax({
			type: "POST",
			data: {us:username,ps:password},
			url: "check_command.php",
			success: function(data){
               //data will contain the vote count echoed by the controller i.e.  
               window.location.assign("admin.php")
              //then append the result where ever you want like
              //$("span#votes_number").html(data); //data will be containing the vote count which you have echoed from the controller

          }
      });
		
	}
}

function logout() {
	
	

		$.ajax({
			type: "POST",
			data: {data:1},
			url: "check_command.php",
			success: function(data){

               window.location.assign("index.php")

          }
      });

}