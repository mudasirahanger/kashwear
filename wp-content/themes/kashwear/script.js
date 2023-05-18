 /// NAV
    //Show expander plusses
    $('.multi-level-nav ul li a').each(function(){
        var $siblingUL = $(this).siblings('ul');
        if($siblingUL.length > 0) {
          if($siblingUL.hasClass('listed')) {
                $(this).addClass('has-children listing-title');
          } else {
              $(this).addClass('has-children').append('<span class="exp">+</span>');
          }
        }
        });
    
      //Handle expanding nav
        $(document).on('click clickinstant', '.multi-level-nav a.has-children', function(e){
        var navAnimSpeed = 200;
        if(e.type == 'clickinstant') {
          navAnimSpeed = 0;
        }
        
        //Mobile main nav?
        if($(this).closest('#main-nav').length == 1 && $('#main-nav').css('position') == 'fixed') {
          if($(this).parent().hasClass('mobile-expanded')) {
            $(this).siblings('ul').slideUp(navAnimSpeed, function(){
              $(this).css('display','').parent().removeClass('mobile-expanded');
            });
            
          } else {
            $(this).siblings('ul').slideDown(navAnimSpeed, function(){
              $(this).css('display','');
            }).parent().addClass('mobile-expanded');
          }
        } else {
          //Large menu
          //Not for list titles
          if($(this).hasClass('listing-title')) return true;
             
          //Set some useful vars
          var $tierEl = $(this).closest('[class^="tier-"]');
          var $tierCont = $tierEl.parent();
          var targetTierNum = parseInt($tierEl.attr('class').split('-')[1]) + 1;
          var targetTierClass = 'tier-' + targetTierNum;
          var $targetTierEl = $tierCont.children('.' + targetTierClass);
  
          ///Remove nav for all tiers higher than this one
          $tierCont.children().each(function(){
            if(parseInt($(this).attr('class').split('-')[1]) >= targetTierNum) {
              $(this).slideUpAndRemove(navAnimSpeed);
            }
          });
  
          //Are we expanding or collapsing
          if($(this).hasClass('expanded')) {
            //Collapsing. Reset state
            $(this).removeClass('expanded').find('.exp').html('+');
          } else {
            ///Show nav
            //Reset other nav items at this level
            $tierEl.find('a.expanded').removeClass('expanded').find('.exp').html('+');
            //If next tier div doesn't exist, make it
            if($targetTierEl.length == 0) {
              $targetTierEl = $('<div />').addClass(targetTierClass).appendTo($tierCont).hide();
            }
            $targetTierEl.empty().stop().append($(this).siblings('ul').clone().attr('style','')).slideDown(navAnimSpeed, function(){
              $(this).css('height', ''); //Clear height
            });
            //Mark as expanded
            $(this).addClass('expanded').find('.exp').html('-');
          }
        }
        return false;
      });
      
    
    
      /// Mobile nav
      $(document).on('click', '.mobile-nav-toggle', function(e){
        e.preventDefault();
        $('body').toggleClass('reveal-mobile-nav');
        $('#main-nav div[class^="tier-"]:not(.tier-1)').remove(); //Remove any expanded rows
      });
      $('<a href="#" class="mobile-nav-toggle" id="mobile-nav-return"></a>').appendTo('body');