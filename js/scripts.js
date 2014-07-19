
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

// Filtering the output


$("p.tag").click(function(){
	content = $(this).html(); 
	console.log(content);

	$(this).toggleClass('active');
	$(".bookmark:not('." + content +"')").toggleClass('hide');

})
/*
Own Expand Function, Bootstrap solution is better

$("#expand-bookmark").click(function(){
	$(this).parent().find('.url-container').removeClass('hide');
})
*/

$(".bookmark-expand").click(function(){
	if ($(this).parents('.bookmark').length) {

		$(this).toggleClass('glyphicon-chevron-down');
		$(this).toggleClass('glyphicon-chevron-up');

		$(this).parents('.bookmark').toggleClass('open');
}
})

});