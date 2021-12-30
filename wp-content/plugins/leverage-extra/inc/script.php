<?php
/**
 * @package Leverage Extra
 */

namespace LVR\Widgets;

function add_slider_script() { ?>

  <script>
    jQuery(function ($) {
      $('.full-slider').css('cursor', 'inherit');
      var fullSlider = new Swiper('.full-slider', {
        autoplay: false,
        slidesPerView: 1,
        spaceBetween: 0,
        navigation: false,
        pagination: {
          el: '.full-slider .swiper-pagination',
          clickable: true
        }
      })
    })
  </script>

<?php 
}

function add_mid_slider_script() { ?>

  <script>
    jQuery(function ($) {
      $('.mid-slider').each(function() {
        $(this).css('cursor', 'inherit');
        var midSlider = new Swiper('.mid-slider', {
          autoplay: false,
          loop: true,
          slidesPerView: $(this).data('perview'),
          spaceBetween: 30
        })
      })
    })
  </script>
  
<?php 
}

function add_min_slider_script() { ?>

  <script>
    jQuery(function ($) {
      $('.min-slider').each(function() {
        $(this).css('cursor', 'inherit');
        var minSlider = new Swiper('.min-slider', {
          autoplay: false,
          loop: false,
          slidesPerView: $(this).data('perview'),
          spaceBetween: 15
        })
      })
    })
  </script>
  
<?php 
}

function add_particles_script() { ?>

  <script>
    jQuery(function($) {
      'use strict';
      function particles(type, ID) {
          if(type === 'default') {
              particlesJS(ID,{particles:{number:{value:80,density:{enable:!0,value_area:800}},color:{value:"#ffffff"},shape:{type:"circle",stroke:{width:0,color:"#000000"},polygon:{nb_sides:5},image:{src:"img/github.svg",width:100,height:100}},opacity:{value:.25,random:!1,anim:{enable:!1,speed:1,opacity_min:.1,sync:!1}},size:{value:5,random:!0,anim:{enable:!1,speed:40,size_min:.1,sync:!1}},line_linked:{enable:!0,distance:150,color:"#ffffff",opacity:.25,width:1},move:{enable:!0,speed:6,direction:"none",random:!1,straight:!1,out_mode:"out",attract:{enable:!1,rotateX:600,rotateY:1200}}},interactivity:{detect_on:"canvas",events:{onhover:{enable:0,mode:"repulse"},onclick:{enable:!0,mode:"push"},resize:!0},modes:{grab:{distance:400,line_linked:{opacity:1}},bubble:{distance:400,size:40,duration:2,opacity:8,speed:3},repulse:{distance:200},push:{particles_nb:4},remove:{particles_nb:2}}},retina_detect:!0,config_demo:{hide_card:!1,background_color:"#b61924",background_image:"",background_position:"50% 50%",background_repeat:"no-repeat",background_size:"cover"}});
          }
          if(type === 'bubble') {
              particlesJS(ID,{particles:{number:{value:6,density:{enable:!0,value_area:800}},color:{value:"#182c50"},shape:{type:"polygon",stroke:{width:0,color:"#000"},polygon:{nb_sides:6},image:{src:"img/github.svg",width:100,height:100}},opacity:{value:.3,random:!0,anim:{enable:!1,speed:1,opacity_min:.1,sync:!1}},size:{value:160,random:!1,anim:{enable:!0,speed:10,size_min:40,sync:!1}},line_linked:{enable:!1,distance:200,color:"#ffffff",opacity:1,width:2},move:{enable:!0,speed:8,direction:"none",random:!1,straight:!1,out_mode:"out",bounce:!1,attract:{enable:!1,rotateX:600,rotateY:1200}}},interactivity:{detect_on:"canvas",events:{onhover:{enable:!1,mode:"grab"},onclick:{enable:!1,mode:"push"},resize:!0},modes:{grab:{distance:400,line_linked:{opacity:1}},bubble:{distance:400,size:40,duration:2,opacity:8,speed:3},repulse:{distance:200,duration:.4},push:{particles_nb:4},remove:{particles_nb:2}}},retina_detect:!0});
          }
          if(type === 'space') {
              particlesJS(ID,{particles:{number:{value:160,density:{enable:!0,value_area:800}},color:{value:"#ffffff"},shape:{type:"circle",stroke:{width:0,color:"#000000"},polygon:{nb_sides:5},image:{src:"img/github.svg",width:100,height:100}},opacity:{value:1,random:!0,anim:{enable:!0,speed:1,opacity_min:0,sync:!1}},size:{value:3,random:!0,anim:{enable:!1,speed:4,size_min:.3,sync:!1}},line_linked:{enable:!1,distance:150,color:"#ffffff",opacity:.4,width:1},move:{enable:!0,speed:1,direction:"none",random:!0,straight:!1,out_mode:"out",bounce:!1,attract:{enable:!1,rotateX:600,rotateY:600}}},interactivity:{detect_on:"canvas",events:{onhover:{enable:!0,mode:"bubble"},onclick:{enable:!0,mode:"repulse"},resize:!0},modes:{grab:{distance:400,line_linked:{opacity:1}},bubble:{distance:250,size:0,duration:2,opacity:0,speed:3},repulse:{distance:400,duration:.4},push:{particles_nb:4},remove:{particles_nb:2}}},retina_detect:!0});
          }
      }
      $('.particles').each(function() {
          let type = $(this).data('particle');
          let ID   = $(this).attr('id');
          particles(type, ID);
      })
    })
  </script>

<?php 
}

function add_counter_script() { ?>

  <script>
    jQuery(function($) {

      'use strict';

      function initCounter(section, item, duration) {

        $(document).one('inview', item, function(event, inview) {

          if (inview) {            

            $(item).each(function() {

              var percent = $(this).data('percent');
              var pcolor  = $(this).data('color');
              var scolor  = $(this).data('color');
              var ecolor  = $(this).data('empty-color');
              
              if ( $(section).hasClass('preloader') || $(section).hasClass('skills')) {
                var symbol = '<i>%</i>';
              } else {
                var symbol = '';
              }

              if(section == '.counter.preloader' || section == '.counter.funfacts') {
                var height = 70;
              } else {
                var height = 110;
              }

              $(this).radialProgress({
                value: (percent / 100),
                size: height,
                thickness: 10,
                lineCap: 'butt',
                emptyFill: ecolor,
                animation: { 
                  duration: duration, 
                  easing: "radialProgressEasing" 
                },
                fill: {
                  gradient: [[pcolor, 0.1], [scolor, 1]], 
                  gradientAngle: Math.PI / 4
                }
              }).on('radial-animation-progress', function(event, progress) {
                $(this).find('span').html(Math.round(percent * progress) + symbol);
              })
            })
          }
        })
      }

      initCounter('.counter.funfacts', '.counter.funfacts .radial', 5000);
    })
  </script>

<?php 
}

function add_counter_circle_script() { ?>

  <script>
    jQuery(function($) {

      'use strict';

      function initCounter(section, item, duration) {

        $(document).one('inview', item, function(event, inview) {

          if (inview) {            

            $(item).each(function() {

              var percent = $(this).data('percent');

              if ( $(this).data('p-color').length > 0 && $(this).data('s-color').length > 0 ) {
                  var pcolor  = $(this).data('p-color');
                  var scolor  = $(this).data('s-color');
              } else {
                  var pcolor  = getComputedStyle(document.documentElement).getPropertyValue('--primary-color');
                  var scolor  = getComputedStyle(document.documentElement).getPropertyValue('--secondary-color');
              }

              if ( $(this).data('empty-color').length > 0 ) {
                  var ecolor  = $(this).data('empty-color');
              } else {
                  var ecolor = 'rgba(0, 0, 0, 0.075)';
              }
              
              if ( $(section).hasClass('preloader') || $(section).hasClass('skills')) {
                var symbol = '<i>%</i>';
              } else {
                var symbol = '';
              }

              if(section == '.counter.preloader' || section == '.counter.funfacts') {
                var height = 70;
              } else {
                var height = 110;
              }

              $(this).radialProgress({
                value: (percent / 100),
                size: height,
                thickness: 10,
                lineCap: 'butt',
                emptyFill: ecolor,
                animation: { 
                  duration: duration, 
                  easing: "radialProgressEasing" 
                },
                fill: {
                  gradient: [[pcolor, 0.1], [scolor, 1]], 
                  gradientAngle: Math.PI / 4
                }
              }).on('radial-animation-progress', function(event, progress) {
                $(this).find('span').html(Math.round(percent * progress) + symbol);
              })
            })
          }
        })
      }

      initCounter('.counter.skills', '.counter.skills .radial', 5000);
    })
  </script>

<?php 
}

function add_pulse_icon_script() { ?>

  <script>
    jQuery(function ($) {

      $('.card-pulse-icon').each(function() {

        let card = $(this);

        card.hover(function() {

          let color = card.find('.pulse-icon').data('color');

          $(':root').css('--pulse-color', color);
        })
      })
    })
  </script>

<?php 
}

function add_form_script() { ?>

  <script>
    jQuery(function ($) {

        'use strict';

        $('.leverage-contact-form-7 label').each(function() {            
            $(this).css('font-size', '0');
            $(this).find('input').attr('placeholder', $(this).text());
            $(this).find('textarea').attr('placeholder', $(this).text());
        })

        $('.leverage-contact-form-7').each(function() {

            $(this).find('.wpcf7-submit').addClass('btn');

            if ( $(this).hasClass('add-primary-button') ) {
                $(this).find('.wpcf7-submit').addClass('primary-button');

            } else {
                $('.wpcf7-submit').removeClass('primary-button');
            }

            if ( $(this).hasClass('add-dark-button') ) {
                $(this).find('.wpcf7-submit').addClass('dark-button');

            } else {
                $(this).find('.wpcf7-submit').removeClass('dark-button');
            }

        })
    })
  </script>

<?php 
}