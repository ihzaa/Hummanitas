/*=========================================================================================
	File Name: tour.js
	Description: tour
	----------------------------------------------------------------------------------------
	Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
	Author: Pixinvent
	Author URL: hhttp://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(document).ready(function () {
  displayTour();
  $(window).resize(displayTour)
  var tour = new Shepherd.Tour({
    classes: 'shadow-md bg-purple-dark',
    scrollTo: true
  })

  // tour steps
  tour.addStep('step-1', {
    text: 'Welcome to Hummanitas<br>Lets start the tour.',
    // attachTo: '.breadcrumbs-top .content-header-title bottom',
    attachTo: '',
    buttons: [

      {
        text: "Skip",
        action: tour.complete
      },
      {
        text: 'Next',
        action: tour.next
      },
    ]
  });

  tour.addStep('step-2', {
    text: 'This is your user home<br>(Activate after you join a Community).',
    // attachTo: '.breadcrumbs-top .content-header-title bottom',
    attachTo: '.navbar-nav .nav-link .icon-home bottom',
    buttons: [

      {
        text: "Skip",
        action: tour.complete
      },
      {
        text: "previous",
        action: tour.back
      },
      {
        text: 'Next',
        action: tour.next
      },
    ]
  });

  tour.addStep('step-3', {
    text: 'List of all community.',
    attachTo: '.navbar-nav .nav-link .icon-globe bottom',
    buttons: [

      {
        text: "Skip",
        action: tour.complete
      },

      {
        text: "previous",
        action: tour.back
      },
      {
        text: 'Next',
        action: tour.next
      },
    ]
  });

  tour.addStep('step-4', {
    text: 'Check your notifications from here.',
    attachTo: '.dropdown-notification .icon-bell bottom',
    buttons: [

      {
        text: "Skip",
        action: tour.complete
      },

      {
        text: "previous",
        action: tour.back
      },
      {
        text: 'Next',
        action: tour.next
      },
    ]
  });

  tour.addStep('step-5', {
    text: 'Click here for user options.',
    attachTo: '.dropdown-user-link img bottom',
    buttons: [

      {
        text: "Skip",
        action: tour.complete
      },

      {
        text: "previous",
        action: tour.back
      },
      {
        text: 'Next',
        action: tour.next
      },
    ]
  });

  tour.addStep('step-6', {
    text: 'Create your community here.',
    attachTo: '.card-header button bottom',
    buttons: [

      {
        text: "Skip",
        action: tour.complete
      },

      {
        text: "previous",
        action: tour.back
      },
      {
        text: 'Next',
        action: tour.next
      },
    ]
  });

  tour.addStep('step-7', {
    text: 'Search a community here.',
    attachTo: '.card-content form input bottom',
    buttons: [

      {
        text: "Skip",
        action: tour.complete
      },

      {
        text: "previous",
        action: tour.back
      },
      {
        text: 'Next',
        action: tour.next
      },
    ]
  });

  tour.addStep('step-8', {
    text: 'Search and join a community by community code.',
    attachTo: '.card-content .controls input bottom',
    buttons: [

      {
        text: "Skip",
        action: tour.complete
      },

      {
        text: "previous",
        action: tour.back
      },
      {
        text: 'Next',
        action: tour.next
      },
    ]
  });

  // tour.addStep('step-9', {
  //   text: 'Click here to see a community profile before joining.',
  //   attachTo: '.card .tutorial a bottom',
  //   buttons: [

  //     {
  //       text: "Skip",
  //       action: tour.complete
  //     },

  //     {
  //       text: "previous",
  //       action: tour.back
  //     },
  //     {
  //       text: 'Next',
  //       action: tour.next
  //     },
  //   ]
  // });

  tour.addStep('step-9', {
    text: 'Thank you',
    attachTo: '.buy-now bottom',
    buttons: [

      {
        text: "previous",
        action: tour.back
      },

      {
        text: "Finish",
        action: tour.complete
      },
    ]
  });

  // function to remove tour on small screen
  function displayTour() {
    window.resizeEvt;
    if ($(window).width() > 576) {
      $('#tour').on("click", function () {
        clearTimeout(window.resizeEvt);
        tour.start();
      })
    }
    else {
      $('#tour').on("click", function () {
        clearTimeout(window.resizeEvt);
        tour.cancel()
        window.resizeEvt = setTimeout(function () {
          alert("Tour only works for large screens!");
        }, 250);;
      })
    }
  }

});
