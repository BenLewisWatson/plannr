(function($){
	// JS
	window.addJob = {
		init: function() {
			function toTimestamp(strDate){
			   var datum = Date.parse(strDate);
			   return datum/1000;
			}

			datepicker = rome($('input.date-picker_input')[0], { weekStart: 1 });

			datepicker.on('data', function() {
				var unixDate = toTimestamp($('input.date-picker_input').val());
				if(!isNaN(unixDate)) {
					$('input.date').val(unixDate);
				}
			});

			// Create clone of addd client section
			client = $('.clients .client:first').clone(true);
			$('input.client-id-field').searchable({ search: {url: '/api/search/client/'}});
			$('input.client-role-field').searchable({
				// Stupid temp solution
				search: {
					url: '/api/search/role/',
					min: 1
				},
				results: {
	            	container: {
	            		element: 'ul',
	            		class: 'searchable_results',
	            		id: '',
	            	},
	            	item: {
	            		template: '',
	            		element: 'li',
	            		class: 'searchable_results_item',
	            		id: '',
	            		type: 'link',
	            		dataAccessors: {
	            			value: 'id',
	            			title: 'title',
	            			description: 'desc',
	            			image: 'image',
	            			link: 'url'
	            		},
	            		events: {
	            			click: {
	            				cancel: false,
	            				handler: ''
	            			},
	            			hover: {
	            				cancel: false,
	            				handler: ''
	            			},
	            			select: {
	            				cancel: false,
	            				handler: ''
	            			},
	            		}
	            	}
	            }
			});
		},    
		addClient: function() {
			// Add/Remove Client Button Variables
			clientResultUID = 1;
			clientCount = 1;

			// Add Client
			$(document).on('click', '.client .client_btn-add, .btn-add-client', function() {
				if (clientCount <= 9) {
					clientCount++;
					clientResultUID++;

					clonedClient = client.clone();

					// Update Container ID
					$(clonedClient).attr('id','client_'+clientResultUID);
					// Reset Input Values
					$(clonedClient).find('input').val('');
					// Update Name ID's
					$(clonedClient).find('#client_1_name').attr('id','client_'+clientResultUID+'_name');
					$(clonedClient).find('[for=client_1_name]').attr('for','client_'+clientResultUID+'_name');
					// Update Role ID's
					$(clonedClient).find('#client_1_role').attr('id','client_'+clientResultUID+'_role');
					$(clonedClient).find('[for=client_1_role]').attr('for','client_'+clientResultUID+'_role');

					var cloned;

					if ($(this).hasClass('client_btn-add')) {
						// Insert cloned client after the one clicked
						cloned = $(this).closest('.client').after(clonedClient).next();
						
						// Select client search field
						clientField = clonedClient.find('.client-id-field');
						clientField.searchable({ search: {url: '/api/search/client/'}});
						clientField.rules('add', {'required': true});

						console.log('Test');

						// Select client role search field
						roleField = clonedClient.find('.client-role-field');
						roleField.searchable({
							// Stupid temp solution
							search: {
								url: '/api/search/role/',
								min: 1
							},
							results: {
				            	container: {
				            		element: 'ul',
				            		class: 'searchable_results',
				            		id: '',
				            	},
				            	item: {
				            		template: '',
				            		element: 'li',
				            		class: 'searchable_results_item',
				            		id: '',
				            		type: 'link',
				            		dataAccessors: {
				            			value: 'id',
				            			title: 'title',
				            			description: 'desc',
				            			image: 'image',
				            			link: 'url'
				            		},
				            		events: {
				            			click: {
				            				cancel: false,
				            				handler: ''
				            			},
				            			hover: {
				            				cancel: false,
				            				handler: ''
				            			},
				            			select: {
				            				cancel: false,
				            				handler: ''
				            			},
				            		}
				            	}
				            }
						});
						roleField.rules('add', {'required': true});
						
						// Show client
						cloned.slideDown();
					}	

					// Add validation rule
					console.log(cloned);
				}
				else {
					sweetAlert('You can only have 10 clients per project');
				}
			});

			// Remove Client
			$(document).on('click', '.client .client_btn-remove', function() {
				if (clientCount > 1) {
					$(this).closest('.client').slideUp(function() { $(this).remove(); });
					clientCount--;
				}
			});

			// Re-order clients
			Sortable.create($('.clients')[0], {
				  ghostClass: "client-ghost"
			});
		},
		postcodeFindAddress: function() {
			function updateAddressFields(address) {
				if ($('input#postcode').valid() && $('input#postcode').val().length > 4) {
					$.ajax({
						url: 'https://maps.googleapis.com/maps/api/geocode/json?address='+address+'&key=AIzaSyC_QDIIVFCWhNpOZrzxp1D2gMo5r18v6r8',
						timeout: 100,
						success: function(data) {
							if (data.status == "200" || data.status == "OK") {
								if (data.results[0].types[0] == "postal_code") {
									$('input#address_2').val(data.results[0].address_components[1].long_name);
									$('input#town').val(data.results[0].address_components[2].long_name);
									$('input#city').val(data.results[0].address_components[3].long_name);
								}
							}
						}
					});
				}
			}
			// Find address using postcode button
			$('.btn-find-postcode').on("click", function() {
				updateAddressFields($('input#postcode').val());
				$('.form-group_address.form-group_address_postcode-only').removeClass('form-group_address_postcode-only');
				$("#form-addClient").validate();
			});
		},
		cllientAddressBtn: function() {
			// Check useClientAddress checkbox
			$('.btn-ClientAddress').click(function() {
				$('input#useClientAddress_checkbox').prop('checked', true);
			});

			// Check useClientAddress checkbox and removes form-group_address_postcode-only
			$('.btn-addressForm-fullAddress').click(function() {
				$('input#useClientAddress_checkbox').prop('checked', false);
				$('.form-group_address.form-group_address_postcode-only').removeClass('form-group_address_postcode-only');
			});

			// Check useClientAddress checkbox and removes form-group_address_postcode-only
			$('.btn-addressForm-postcode').click(function() {
				$('input#useClientAddress_checkbox').prop('checked', false);
				$('.form-group_address').addClass('form-group_address_postcode-only');
			});
		},
		validate: function() {
			$("form#form-addJob").validate({
			    ignore: "input.address_input:hidden, .wysiwyg",
				rules: {
					'client[]': {
						required: true,
					},
					date: {
						required: true,
					},
					address_1: {
						required: true,
					},
					address_2: {
						required: true,
					},
					city: {
						required: true,
					},
					postcode: {
						postcode: true
					},
					postcode: {
						postcode: true
					},
					quote: {
						currency: true
					},
				}
			});
		}
	}
	// Run
	$(function(){
		addJob.init(); 
		addJob.addClient(); 
		addJob.validate(); 
		// addJob.cllientAddressBtn(); 
		// addJob.postcodeFindAddress(); 
	});
}(jQuery));