
$(document).ready(function(){
$("#login-form").hide();

  $("#login").click(function(){

   $("#register-form").hide();
   $("#login-form").show();

  });

// Insert tag name into value of input field

$("p.tag").click(function(){
	content = $(this).html(); 
	cur_val = $("input[name=tags]").val();

	if(cur_val){
		$("input[name=tags]").val(cur_val + " " + content);
	
	}else{
		$("input[name=tags]").val(content);
	}
	
})

});