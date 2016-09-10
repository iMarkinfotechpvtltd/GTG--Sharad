var links = "http://gtg.stagingdevsite.com/dev/";

/*-------------------Registration form -----------------------*/
jQuery(function($) 
{
	jQuery('#registration').validate
	({	
		rules: 
		{
			name: {
					required: true,
					number: false
				   },
			email: {
					required: true,
					email: true,
					},
			phone_number: 
					{
						required: true,	
						number: true,
					},
		},
		
		submitHandler: function(form) {
			jQuery("#loading").show();
			//jQuery("#btn_submit").hide();			

			jQuery(form).ajaxSubmit({
				type: "POST",
				data: jQuery(form).serialize(),
				url: links+'wp-content/themes/gtg/ajax/register.php', 
				success: function(data) 
				{
					if(data==1)
					{
					    jQuery('#msg_success').show();
						jQuery("#name").val('');
						jQuery("#email").val('');
						jQuery("#phone_number").val('');
						jQuery("#message").val('');
						//jQuery("#btn_submit").show();
						jQuery("#loading").hide();
						
                        				
					}
					else
					{
						 jQuery('#msg_error').show();
						 jQuery("#loading").hide();
					}						
				}
			});
		}
	});
});

