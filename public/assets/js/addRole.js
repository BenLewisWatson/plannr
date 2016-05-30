(function($){
	// JS
	window.addRole = {
		init: function() {
			$('#create-role-form').validate({
				rules: {	
					title: {
						required: true
					}
				}
			});
		}
	}	
	// Run
	$(function(){
		addRole.init(); 
	});
}(jQuery));