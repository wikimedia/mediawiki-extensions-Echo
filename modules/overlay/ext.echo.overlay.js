( function($,mw) {
	$( function() {
		mw.echo.overlay = {
			'updateCount' : function(newCount) {
				$('#pt-notifications a')
					.text( mw.msg('echo-link') )
					.badge( newCount, { 'type' : 'inline' } );

				mw.echo.overlay.notification_count = newCount;
				
				console.log('Updated new notification count to '+newCount);
			},
			'configuration' : mw.config.get('wgEchoOverlayConfiguration')
		};

		mw.echo.overlay.notification_count = mw.echo.overlay.configuration['notification-count'];
		mw.echo.overlay.updateCount( mw.echo.overlay.notification_count );

		var $link = $('#pt-notifications a');
		if ( ! $link.length ) {
			return;
		}

		function buildOverlay(callback) {
			var $overlay = $('<div></div>')
				.addClass('mw-echo-overlay');

			$overlay.append(
				$('<div/>')
					.addClass('mw-echo-overlay-title')
					.text(mw.msg('echo-overlay-title'))
			);

			var Api = new mw.Api();

			Api.get( {
				'action' : 'query',
				'meta' : 'notifications',
				'notformat' : 'html',
				'notprop' : 'index|list'
			}, {
				'ok' : function(result) {
					var notifications = result.query.notifications;
					var $ul = $('<ul></ul>').appendTo($overlay);

					$.each( notifications.index, function(index, id) {
						data = notifications[id];
						var $li = $('<li></li>')
							.data('details', data)
							.data('id', id)
							.addClass('mw-echo-notification')
							.append(data['*'])
							.appendTo($ul);

						if (! data.read ) {
							$li.addClass('mw-echo-unread');
						}
					});

					if ( ! $ul.find('li').length ) {
						$ul.remove();
						$overlay.append(
							$('<div></div>')
								.text(mw.msg('echo-none'))
						);
					}

					$overlay.append(
						$('<div/>')
							.addClass('mw-echo-overlay-link')
							.append( $link
								.clone()
								.text( mw.msg( 'echo-overlay-link' ) )
							)
					);

					callback($overlay);

					Api.get({
						'action' : 'query',
						'meta' : 'notifications',
						'notmarkread' : notifications.index.join('|'),
						'notprop' : 'count'
					}, {
						'ok' : function(result) {
							var count = result.query.notifications.count;

							mw.echo.overlay.updateCount(count);
						}
					});
				},
				'err' : function() {
					window.location.href = $link.attr('href');
				}
			} );
		}

		$link.click( function(e) {
			e.preventDefault();
			var $target = $(e.target);
			// If the user clicked on the overlay or any child,
			//  ignore the click
			if ( $target.hasClass('mw-echo-overlay') ||
				$target.is('mw-echo-overlay *')
			) {
				return;
			}

			var $overlay = $('.mw-echo-overlay');

			if ( $overlay.length ) {
				$overlay.fadeOut( 'fast',
					function() { $overlay.remove(); }
				);
				return;
			}
			
			$overlay = buildOverlay(
				function($overlay) {
					$overlay
						.hide()
						.appendTo($('body'))
						.slideDown('fast');
				} );
		} );

		$('body').click( function(e) {
			if ( ! $(e.target).is('.mw-echo-overlay,.mw-echo-overlay *') ) {
				$('.mw-echo-overlay').fadeOut( 'fast',
					function() { $(this).remove(); }
				);
			}
		});
	});
})( jQuery, mediaWiki );