/*jslint browser: true*/
/*global console*/

var myapp = myapp || {};
myapp.pages = myapp.pages || {};

myapp.pages.IndexPageController = function (myapp, $$) {
  'use strict';
  
  // Init method
  (function () {
    var options = {
      'bgcolor': '#f07a68',
      'fontcolor': '#fff',
      'onOpened': function () {
        console.log("welcome screen opened");
      },
      'onClosed': function () {
        console.log("welcome screen closed");
      }
    },
    welcomescreen_slides = [
      {
        id: 'slide0',
        picture: '<div class="tutorialicon"><img src="../../../Public/front/images/slider0.png"></div>',
      },
      {
        id: 'slide1',
        picture: '<div class="tutorialicon"><img src="../../../Public/front/images/slider1.png"></div>',
      },
      {
        id: 'slide2',
        picture: '<div class="tutorialicon"><img src="../../../Public/front/images/slider2.png"></div>',
      },
      {
        id: 'slide3',
        picture: '<div class="tutorialicon"><img src="../../../Public/front/images/slider3.png"></div>',
      },
      {
        id: 'slide4',
        picture: '<div class="tutorialicon"><img src="../../../Public/front/images/slider4.png"></div>',
        text: '<a class="tutorial-close-btn" href="#">进入味+</a>'
      }
    ],
    welcomescreen = myapp.welcomescreen(welcomescreen_slides, options);
    
    $$(document).on('click', '.tutorial-close-btn', function () {
      welcomescreen.close();
    });

    $$('.tutorial-open-btn').click(function () {
      welcomescreen.open();  
    });
    
    $$(document).on('click', '.tutorial-next-link', function (e) {
      welcomescreen.next(); 
    });
    
    $$(document).on('click', '.tutorial-previous-slide', function (e) {
      welcomescreen.previous(); 
    });
  
  }());

};