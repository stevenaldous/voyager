jQuery(document).ready(function($) { 

    // close submenu on click of new one.
    $('.dropdown-toggle.has-submenu').click( function() {
        $(this).parent().siblings().children('.dropdown-toggle.show').dropdown('hide');
        $(this).dropdown('show');
        $(this).siblings('.dropdown-menu').css('display','block');

    });

    // give top data-parent to all menu items
    $('#main-menu > .dropdown').each( function(){
        var id = $(this).attr('id');
        $(this).find('*').attr('data-parent', id);
    });
    $(window).on('resize scroll', function() {
        if( $(window).width() >= 992 ) {
            // menu mouse over events
            $('.dropdown-toggle').mouseenter( function() {
                if( $(this).hasClass('has-submenu') ) {
                    $(this).parent().siblings().children('.dropdown-toggle').dropdown('hide');
                    // ('.dropdown-toggle').dropdown('hide');
                }
                if( $(this).hasClass('top-toggle') ) {
                    $(this).parent().siblings().children('.dropdown-toggle').dropdown('hide');
                    // $('.dropdown-toggle').dropdown('hide');
                }
                $(this).siblings('button').dropdown('show');
            });
            $('.dropdown-item').mouseenter( function() {
                $(this).parent().siblings().children('button.dropdown-toggle').dropdown('hide');
            });
            $('.not-toggle').mouseenter( function() {
                $(this).parent().siblings().children('.dropdown-toggle').dropdown('hide');
                // $('.dropdown-toggle').dropdown('hide');
            });
            // close dropdown menu on mouseleave
            $('.dropdown-menu').mouseleave( function() {
                $(this).siblings('button').dropdown('hide');
            });

            // reset dropdown status when mouse over body content
            $('#content').mouseenter( function() {
                $('button.dropdown-toggle').each( function() {
                    $(this).dropdown('hide');
                } )
            });
        }
    }).resize();

    ///////////////////////////////////////////////////////
    // Third tier support: inspired by https://bootstrap-menu.com/detail-multilevel.html
    ///////////////////////////////////////////////////////
    
    /////// Prevent closing from click inside dropdown
    document.querySelectorAll('.dropdown-menu').forEach(function(element){
        element.addEventListener('click', function (e) {
          e.stopPropagation();
        });
    })

    // make it as accordion for smaller screens
    if (window.innerWidth < 992) {
        // close all inner dropdowns when parent is closed
        document.querySelectorAll('.navbar .dropdown').forEach(function(everydropdown){
            everydropdown.addEventListener('hidden.bs.dropdown', function () {
                // after dropdown is hidden, then find all submenus
                  this.querySelectorAll('.submenu').forEach(function(everysubmenu){
                      // hide every submenu as well
                      everysubmenu.style.display = 'none';
                  });
            })
        });     
        document.querySelectorAll('.dropdown-menu a').forEach(function(element){
            element.addEventListener('click', function (e) {
                  let nextEl = this.nextElementSibling;
                  if(nextEl && nextEl.classList.contains('submenu')) {	
                      // prevent opening link if link needs to open dropdown
                      e.preventDefault();
                      console.log(nextEl);
                      if(nextEl.style.display == 'block'){
                          nextEl.style.display = 'none';
                      } else {
                          nextEl.style.display = 'block';
                      }

                  }
            });
        })
    }
    // end if innerWidth

}); // end of doc.ready
