import ConditionsManager from "./control-conditions";

const Component = {
	tabClass:           '.cx-tab',
	accordionClass:     '.cx-accordion',
	toggleClass:        '.cx-toggle',

	buttonClass:        '.cx-component__button',
	contentClass:       '.cx-settings__content',

	buttonActiveClass:  'active',
	showClass:          'show',

	localStorage:        {},

	conditionsManager:   ConditionsManager,

	init: function () {
		this.localStorage = this.getState() || {};

		this.componentInit( this.tabClass );
		this.componentInit( this.accordionClass );
		this.componentInit( this.toggleClass );

		this.addEvent();
		this.conditionsManager.init();
	},

	addEvent: function() {
		$( 'body' )
			.off( 'click.cxInterfaceBuilder' )
			.on( 'click.cxInterfaceBuilder',
				this.tabClass + ' ' + this.buttonClass + ', ' +
				this.toggleClass + ' ' + this.buttonClass + ', ' +
				this.accordionClass + ' ' + this.buttonClass,

				this.componentClick.bind( this )
			);
	},

	componentInit: function( componentClass ) {
		var _this = this,
			components = $( componentClass ),
			componentId = null,
			button = null,
			contentId = null,
			notShow = '';

		components.each( function( index, component ) {
			component   = $( component );
			componentId = component.data( 'compotent-id' );

			switch ( componentClass ) {
				case _this.toggleClass:
					if ( _this.localStorage[ componentId ] && _this.localStorage[ componentId ].length ) {
						notShow = _this.localStorage[ componentId ].join( ', ' );
					}

					$( _this.contentClass, component )
						.not( notShow )
						.addClass( _this.showClass )
						.prevAll( _this.buttonClass )
						.addClass( _this.buttonActiveClass );
					break;

				case _this.tabClass:
				case _this.accordionClass:
					if ( _this.localStorage[ componentId ] ) {
						contentId = _this.localStorage[ componentId ][ 0 ];
						button = $( '[data-content-id="' + contentId + '"]', component );
					} else {
						button = $( _this.buttonClass, component ).eq( 0 );
						contentId = button.data( 'content-id' );
					}

					_this.showElement( button, component, contentId );
					break;
			}
		} );
	},

	componentClick: function( event ) {
		var $target      = $( event.target ),
			$parent      = $target.closest( this.tabClass + ', ' + this.accordionClass + ', ' + this.toggleClass ),
			expr          = new RegExp( this.tabClass + '|' + this.accordionClass + '|' + this.toggleClass ),
			componentName = $parent[0].className.match( expr )[ 0 ].replace( ' ', '.' ),
			contentId     = $target.data( 'content-id' ),
			componentId   = $parent.data( 'compotent-id' ),
			activeFlag    = $target.hasClass( this.buttonActiveClass ),
			itemClosed;

		switch ( componentName ) {
			case this.tabClass:
				if ( ! activeFlag ) {
					this.hideElement( $parent );
					this.showElement( $target, $parent, contentId );

					this.localStorage[ componentId ] = new Array( contentId );
					this.setState();
				}
				break;

			case this.accordionClass:
				this.hideElement( $parent );

				if ( ! activeFlag ) {
					this.showElement( $target, $parent, contentId );

					this.localStorage[ componentId ] = new Array( contentId );
				} else {
					this.localStorage[ componentId ] = {};
				}
				this.setState();
				break;

			case this.toggleClass:
				$target
					.toggleClass( this.buttonActiveClass )
					.nextAll( contentId )
					.toggleClass( this.showClass );

				if ( Array.isArray( this.localStorage[ componentId ] ) ) {
					itemClosed = this.localStorage[ componentId ].indexOf( contentId );

					if ( -1 !== itemClosed ) {
						this.localStorage[ componentId ].splice( itemClosed, 1 );
					} else {
						this.localStorage[ componentId ].push( contentId );
					}

				} else {
					this.localStorage[ componentId ] = new Array( contentId );
				}

				this.setState();
				break;
		}
		$target.blur();

		return false;
	},

	showElement: function ( button, holder, contentId ) {
		button
			.addClass( this.buttonActiveClass );

		holder
			.data( 'content-id', contentId );

		$( contentId, holder )
			.addClass( this.showClass );
	},

	hideElement: function ( holder ) {
		var contsntId = holder.data( 'content-id' );

		$( '[data-content-id="' + contsntId + '"]', holder )
			.removeClass( this.buttonActiveClass );

		$( contsntId, holder )
			.removeClass( this.showClass );
	},

	getState: function() {
		try {
			return JSON.parse( localStorage.getItem( 'interface-builder' ) );
		} catch ( e ) {
			return false;
		}
	},

	setState: function() {
		try {
			localStorage.setItem( 'interface-builder', JSON.stringify( this.localStorage ) );
		} catch ( e ) {
			return false;
		}
	},
};

export default Component;