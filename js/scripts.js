
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


$("p.tag-filter").click(function(){
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

$('.bookmark').mouseenter(function(){
	$(this).children('.overlay').css('visibility', 'visible');

})
$('.bookmark').mouseleave(function(){
	$(this).children('.overlay').css('visibility', 'invisible');

})

// JQuery UI for Drag and Drop shit

$(function() {

    $( ".draggable" ).draggable({ revert: "invalid", helper: "clone" 

});
 	
    $( ".droppable" ).droppable({
      activeClass: "ui-state-default",
      hoverClass: "ui-state-hover",

      drop: function( event, ui ) {
      	var user_id = ui.draggable.children('.hidden-user').text();
      	var title = ui.draggable.children('h4').text();
      	var category = $( this ).text(); 
      	var message = "user_id=" + user_id + "&category=" + category + "&title=" + title +"&message=hello&john=egal";
        $( this )	
          .addClass( "ui-state-highlight" )
            .addClass( "dropped" );
            $.post("saveDropped.php", message, function(data){
            	
            });
      }
    });
  });







});