$('document').ready(function(){
 var username_state = false;
 $('#name').on('blur', function(){
  var name = $('#name').val();
  if (name == '') {
  	username_state = false;
  	return;
  }
  $.ajax({
    url: 'new_user.php',
    type: 'post',
    data: {
    	'username_check' : 1,
    	'name' : name,
    },
    success: function(response){
      if (response == 'taken' ) {
      	username_state = false;
      	$('#name').parent().removeClass();
      	$('#name').parent().addClass("form_error");
      	$('#name').siblings("span").text('Sorry... Username already taken');
      }else if (response == 'not_taken') {
      	username_state = true;
      	$('#name').parent().removeClass();
      	$('#name').parent().addClass("form_success");
      	$('#name').siblings("span").text('Username available');
      }
    }
  });
 });		