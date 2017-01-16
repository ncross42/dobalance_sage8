/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  var addEventsListener = function(obj,events,callback){
    events.split(" ").forEach( (e) => {
      if ( typeof(obj.length) == "undefined" ) { obj.addEventListener(e,callback); }
      else { obj.forEach( o => o.addEventListener(e,callback) ); }
    });
  };

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        console.log('common');
        // JavaScript to be fired on all pages

        // sidebar-primary 
        var $body = document.querySelector('body');
        if ( $body.classList.contains('sidebar-primary') ) {
          $toggle_sidebar = document.querySelectorAll('a[href="#toggle_sidebar"]');
          addEventsListener($toggle_sidebar, 'click touchend', function(event) {
            event.stopPropagation();
            event.preventDefault();
            document.querySelector('#sidebar').classList.toggle('sidebar-active');
            document.querySelector('div.toggle_sidebar').classList.toggle('sidebar-active');
          });

          // Event: Prevent clicks/taps inside the sidebar from bubbling.
          var $sidebar = document.querySelector('#sidebar');
          addEventsListener($sidebar, 'click touchend', function(event) {
            event.stopPropagation();
          });
          // Event: Hide sidebar on body click/tap.
          addEventsListener($body, 'click touchend', function(event) {
            var $sidebar = document.querySelector('#sidebar');
            if ( $sidebar.classList.contains('sidebar-active') ) {
              $sidebar.classList.remove('sidebar-active');
              document.querySelector('div.toggle_sidebar').classList.remove('sidebar-active');
            }
          });
        } // end sidebar-primary

      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    },
    'single': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
