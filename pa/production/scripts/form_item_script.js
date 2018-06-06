$(document).ready(function(){
	$("#botao").click(function(){
		var name = $("#first_name").val();
		var email = $("#last_name").val();
		var password = $("#number").val();
		var contact = $("#visible").val();
		var contact = $("#desc").val();
		var contact = $("#name").val();
		// Returns successful data submission message when the entered information is stored in database.
		var dataString = 'name1='+ name + '&email1='+ email + '&password1='+ password + '&contact1='+ contact;
		if(name==''||email==''||password==''||contact=='')
		{
			alert("Please Fill All Fields");
		}
		else
		{
			// AJAX Code To Submit Form.
			$.ajax({
				type: "POST",
				url: "http://myslimsite/api/teste/insertF",
				data: dataString,
				cache: false,
				success: function(result){
					alert(result);
				}
			});
		}
		return false;
	});
});