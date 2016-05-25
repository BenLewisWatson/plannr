/**
 * RSearch.js
 *
 * Author: Ben Watson
 * Version: 0.1
 */

(function ($) { 
    $.fn.searchable = function(options) {
    	/**
    	 * Variables
    	 */
    	var searchableIDCount = 0;

    	/**
    	 * Settings
    	 */
    	var settings = $.extend({
            container: {
            	class: ["searchable"],
            	id: "searchable-"+searchableIDCount,
            },
    		search: {
	    		url: '',
	    		params: '',
	    		events: {
	    			before: {
	    				cancel: false,
	    				handler: '',
	    			},
	    			done: {
	    				cancel: false,
	    				handler: '',
	    			}
	    		}
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
            			title: 'firstname',
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
        }, options);

        /**
         * Inputs
         */

        var input = $(this);

        // Searchable container
        var container = input.wrap( "<div class='"+settings.container.class.join(' ')+"'></div>" ).parent();

        // Searchable results container
        var resultsContainer = $( "<"+settings.results.container.element+"></"+settings.results.container.element+">" )
			.addClass(settings.results.container.class)
			.attr('id', settings.results.container.id)
			.css('marginTop', (parseInt(input.css('marginBottom')) > 0) ? 0-parseInt(input.css('marginBottom')) : 0)
			.appendTo(container)
			.hide();

        // Search field
        var searchableField = $(this).clone(true)
	    	.attr('id', 'searchable_'+input.attr('id'))
	    	.attr('class', input.attr('class') ? 'searchable_'+input.attr('class') : '')
	    	.attr('name', input.attr('class') ? 'searchable_'+input.attr('class') : '')
	    	.prop('autocomplete', 'off')
	    	.removeProp('for');


		// Searchable result item
		var resultsItem = settings.results.item.template ? $(settings.results.item.template) : $("<"+settings.results.item.element+"></"+settings.results.item.element+">")
			.addClass(settings.results.item.class)
			.attr('id', settings.results.item.id);

	   	// Hide input for backend
		input
	        .hide()
	        .prop('hidden', 'hidden')
	        .prop('tabindex', '-1')
	        .prop('placeholder', '')
	        .before(searchableField);

		/**
		 * Events
		 */
		
		// Search event
		searchableField.on('input focus', function(e) {
			if (searchableField.val().length > 2) {
				query = settings.search.url+encodeURI($(this).val());
				query += settings.search.params != "" ? "?"+settings.search.params : "";
				$.ajax({
				    type: 'GET',
				    url: query,
				    success: function (data) {
				    	if (data.length) {
	 						resultsContainer.empty();
					        for (var i = 0; i < data.length; i++) {		        	
					        	resultsContainer.append(resultsItem.text(data[i][settings.results.item.dataAccessors.title]).attr('data-searchable-value', data[i][settings.results.item.dataAccessors.value]).clone(true));
					        }
			        		resultsContainer.show();
				    	}
				    	else {
					        resultsContainer.hide();
				    	}
				    }
				});
			}
			else {
		        resultsContainer.hide();
			}
		});
			
		// Searchbox focus out event
        searchableField.on('focusout', function(e) {
			resultsContainer.fadeOut(function() {
 				resultsContainer.empty();
			});
		});

        // Click item event
		resultsItem.on("click", function(e) {
			// Event handler
			if (typeof settings.results.item.events.select.handler == "function") {
				settings.results.item.events.click.handler(e);
			}

			// Event canceler
			if (settings.results.item.events.click.cancel) {
				return;
			}

			selectSearchItem($(this));
		});

		// Select item event
		var liSelected;
		var selectedClass = settings.results.item.class+'-selected';
		searchableField.on('keydown', function(e) {
			// Event handler
			if (typeof settings.results.item.events.select.handler == "function") {
				settings.results.item.events.select.handler(e);
			}

			// Event canceler
			if (settings.results.item.events.select.cancel) {
				return;
			}

			var li = $('.searchable li');
			// Select Item
			if((e.which == 0 || e.which == 9 || e.which == 13) && liSelected) {
				selectSearchItem(liSelected);
				liSelected = false;
				return false;
			}
			// Esc
		    else if(e.which === 27) {
		    	searchableField.blur();
		    }
		    // Up
		    else if(e.which === 38) {
		        if(liSelected) {
		            liSelected.removeClass(selectedClass);
		            next = liSelected.prev();
		            if(next.length > 0){
		                liSelected = next.addClass(selectedClass);
		            }else{
		                liSelected = li.last().addClass(selectedClass);
		            }
		        }
		        else{
		            liSelected = li.last().addClass(selectedClass);
		        }
		        return false;
		    }
			// Down
		    else if(e.which === 40) {
		        if(liSelected) {
		            liSelected.removeClass(selectedClass);
		            next = liSelected.next();
		            if(next.length > 0){
		                liSelected = next.addClass(selectedClass);
		            }
		            else{
		                liSelected = li.eq(0).addClass(selectedClass);
		            }
		        }
		        else{
		            liSelected = li.eq(0).addClass(selectedClass);
		        }
		        return false;
		    }
		});
		
		/**
		 * Methods
		 */

		function selectSearchItem(searchItem) {
			input.val(searchItem.data('searchable-value'));
			searchableField.focus();
			searchableField.val(searchItem.text());

			resultsContainer.fadeOut(function() {
					resultsContainer.empty();
			});
		}

		return this;

		};
}( jQuery ));