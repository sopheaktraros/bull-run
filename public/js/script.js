var type = ['', 'info', 'success', 'warning', 'danger'];

$(document).ready(function () {
  $sidebar = $('.sidebar');
  $sidebar_img_container = $sidebar.find('.sidebar-background');

  $full_page = $('.full-page');

  $sidebar_responsive = $('body > .navbar-collapse');

  window_width = $(window).width();

  if (window_width > 767) {
    if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
      $('.fixed-plugin .dropdown').addClass('open');
    }

  }

  $('.sidebar .sidebar-wrapper').perfectScrollbar();

});

backend = {
  initPickColor: function () {
    $('.pick-class-label').click(function () {
      var new_class = $(this).attr('new-class');
      var old_class = $('#display-buttons').attr('data-class');
      var display_div = $('#display-buttons');
      if (display_div.length) {
        var display_buttons = display_div.find('.btn');
        display_buttons.removeClass(old_class);
        display_buttons.addClass(new_class);
        display_div.attr('data-class', new_class);
      }
    });
  },

  initFullScreenGoogleMap: function () {
    var myLatlng = new google.maps.LatLng(40.748817, -73.985428);
    var mapOptions = {
      zoom: 13,
      center: myLatlng,
      scrollwheel: false, //we disable de scroll over the map, it is a really annoing when you scroll through page
      styles: [{
        "featureType": "water",
        "stylers": [{"saturation": 43}, {"lightness": -11}, {"hue": "#0088ff"}]
      }, {
        "featureType": "road",
        "elementType": "geometry.fill",
        "stylers": [{"hue": "#ff0000"}, {"saturation": -100}, {"lightness": 99}]
      }, {
        "featureType": "road",
        "elementType": "geometry.stroke",
        "stylers": [{"color": "#808080"}, {"lightness": 54}]
      }, {
        "featureType": "landscape.man_made",
        "elementType": "geometry.fill",
        "stylers": [{"color": "#ece2d9"}]
      }, {
        "featureType": "poi.park",
        "elementType": "geometry.fill",
        "stylers": [{"color": "#ccdca1"}]
      }, {
        "featureType": "road",
        "elementType": "labels.text.fill",
        "stylers": [{"color": "#767676"}]
      }, {
        "featureType": "road",
        "elementType": "labels.text.stroke",
        "stylers": [{"color": "#ffffff"}]
      }, {"featureType": "poi", "stylers": [{"visibility": "off"}]}, {
        "featureType": "landscape.natural",
        "elementType": "geometry.fill",
        "stylers": [{"visibility": "on"}, {"color": "#b8cb93"}]
      }, {"featureType": "poi.park", "stylers": [{"visibility": "on"}]}, {
        "featureType": "poi.sports_complex",
        "stylers": [{"visibility": "on"}]
      }, {"featureType": "poi.medical", "stylers": [{"visibility": "on"}]}, {
        "featureType": "poi.business",
        "stylers": [{"visibility": "simplified"}]
      }]

    }
    var map = new google.maps.Map(document.getElementById("map"), mapOptions);

    var marker = new google.maps.Marker({
      position: myLatlng,
      title: "Hello World!"
    });

    // To add the marker to the map, call setMap();
    marker.setMap(map);
  },

  initCharts: function () {

    /*  **************** 24 Hours Performance - single line ******************** */

    var dataPerformance = {
      labels: ['6pm', '9pm', '11pm', '2am', '4am', '8am', '2pm', '5pm', '8pm', '11pm', '4am'],
      series: [
        [1, 6, 8, 7, 4, 7, 8, 12, 16, 17, 14, 13]
      ]
    };

    var optionsPerformance = {
      showPoint: false,
      lineSmooth: true,
      height: "260px",
      axisX: {
        showGrid: false,
        showLabel: true
      },
      axisY: {
        offset: 40,
      },
      low: 0,
      high: 16
    };

    Chartist.Line('#chartPerformance', dataPerformance, optionsPerformance);


    /*  **************** NASDAQ: AAPL - single line with points ******************** */

    var dataStock = {
      labels: ['\'07', '\'08', '\'09', '\'10', '\'11', '\'12', '\'13', '\'14', '\'15'],
      series: [
        [22.20, 34.90, 42.28, 51.93, 62.21, 80.23, 62.21, 82.12, 102.50, 107.23]
      ]
    };

    var optionsStock = {
      lineSmooth: false,
      height: "260px",
      axisY: {
        offset: 40,
        labelInterpolationFnc: function (value) {
          return '$' + value;
        }

      },
      low: 10,
      high: 110,
      classNames: {
        point: 'ct-point ct-green',
        line: 'ct-line ct-green'
      }
    };

    Chartist.Line('#chartStock', dataStock, optionsStock);


    /*  **************** Users Behaviour - Multiple Lines ******************** */


    var dataSales = {
      labels: ['\'06', '\'07', '\'08', '\'09', '\'10', '\'11', '\'12', '\'13', '\'14', '\'15'],
      series: [
        [287, 385, 490, 554, 586, 698, 695, 752, 788, 846, 944],
        [67, 152, 143, 287, 335, 435, 437, 539, 542, 544, 647],
        [23, 113, 67, 190, 239, 307, 308, 439, 410, 410, 509]
      ]
    };

    var optionsSales = {
      lineSmooth: false,
      axisY: {
        offset: 40
      },
      low: 0,
      high: 1000
    };


    Chartist.Line('#chartBehaviour', dataSales, optionsSales);


    /*  **************** Public Preferences - Pie Chart ******************** */

    var dataPreferences = {
      series: [
        [25, 30, 20, 25]
      ]
    };

    var optionsPreferences = {
      donut: true,
      donutWidth: 40,
      startAngle: 0,
      height: "245px",
      total: 100,
      showLabel: false,
      axisX: {
        showGrid: false
      }
    };

    Chartist.Pie('#chartPreferences', dataPreferences, optionsPreferences);

    Chartist.Pie('#chartPreferences', {
      labels: ['62%', '32%', '6%'],
      series: [62, 32, 6]
    });


    /*  **************** Views  - barchart ******************** */

    var dataViews = {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
      series: [
        [542, 443, 320, 780, 553, 453, 326, 434, 568, 610, 756, 895]
      ]
    };

    var optionsViews = {
      seriesBarDistance: 10,
      classNames: {
        bar: 'ct-bar ct-azure'
      },
      axisX: {
        showGrid: false
      }
    };

    var responsiveOptionsViews = [
      ['screen and (max-width: 640px)', {
        seriesBarDistance: 5,
        axisX: {
          labelInterpolationFnc: function (value) {
            return value[0];
          }
        }
      }]
    ];

    Chartist.Bar('#chartViews', dataViews, optionsViews, responsiveOptionsViews);


    var data = {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
      series: [
        [542, 443, 320, 780, 553, 453, 326, 434, 568, 610, 756, 895],
        [412, 243, 280, 580, 453, 353, 300, 364, 368, 410, 636, 695]
      ]
    };

    var options = {
      seriesBarDistance: 10,
      axisX: {
        showGrid: false
      },
      height: "245px"
    };

    var responsiveOptions = [
      ['screen and (max-width: 640px)', {
        seriesBarDistance: 5,
        axisX: {
          labelInterpolationFnc: function (value) {
            return value[0];
          }
        }
      }]
    ];

    Chartist.Bar('#chartActivity', data, options, responsiveOptions);

  },

  initDashboardPageCharts: function () {


    /*   **************** Email Statistics - Pie Chart ********************    */

    var dataPreferences = {
      series: [
        [25, 30, 20, 25]
      ]
    };
    var optionsPreferences = {
      donut: true,
      donutWidth: 40,
      startAngle: 0,
      height: "350px",
      total: 100,
      showLabel: false,
      axisX: {
        showGrid: false
      }
    };

    Chartist.Pie('#chartEmail', dataPreferences, optionsPreferences);

    Chartist.Pie('#chartEmail', {
      labels: ['62%', '32%', '6%'],
      series: [62, 32, 6]
    });


    /*   **************** 2014 Sales - Bar Chart ********************    */

    var data = {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
      series: [
        [542, 443, 320, 780, 553, 453, 326, 434, 568, 610, 756, 895],
        [412, 243, 280, 580, 453, 353, 300, 364, 368, 410, 636, 695]
      ]
    };

    var options = {
      seriesBarDistance: 10,
      axisX: {
        showGrid: false
      },
      height: "245px"
    };

    var responsiveOptions = [
      ['screen and (max-width: 640px)', {
        seriesBarDistance: 5,
        axisX: {
          labelInterpolationFnc: function (value) {
            return value[0];
          }
        }
      }]
    ];

    Chartist.Bar('#chartActivity', data, options, responsiveOptions);


    /*   **************** Users Behaviour - Line Chart ********************    */

    var dataSales = {
      labels: ['9:00AM', '12:00AM', '3:00PM', '6:00PM', '9:00PM', '12:00PM', '3:00AM', '6:00AM'],
      series: [
        [287, 385, 490, 492, 554, 586, 698, 695, 752, 788, 846, 944],
        [67, 152, 143, 240, 287, 335, 435, 437, 539, 542, 544, 647],
        [23, 113, 67, 108, 190, 239, 307, 308, 439, 410, 410, 509]
      ]
    };

    var optionsSales = {
      lineSmooth: false,
      low: 0,
      high: 800,
      height: "245px",
      axisX: {
        showGrid: false,
      },


    };

    var responsiveSales = [
      ['screen and (max-width: 640px)', {
        axisX: {
          labelInterpolationFnc: function (value) {
            return value[0];
          }
        }
      }]
    ];

    Chartist.Line('#chartHours', dataSales, optionsSales, responsiveSales);

  },

  initSmallGoogleMaps: function () {

    // Regular Map
    var myLatlng = new google.maps.LatLng(40.748817, -73.985428);
    var mapOptions = {
      zoom: 8,
      center: myLatlng,
      scrollwheel: false, //we disable de scroll over the map, it is a really annoing when you scroll through page
    }

    var map = new google.maps.Map(document.getElementById("regularMap"), mapOptions);

    var marker = new google.maps.Marker({
      position: myLatlng,
      title: "Regular Map!"
    });

    marker.setMap(map);


    // Custom Skin & Settings Map
    var myLatlng = new google.maps.LatLng(40.748817, -73.985428);
    var mapOptions = {
      zoom: 13,
      center: myLatlng,
      scrollwheel: false, //we disable de scroll over the map, it is a really annoing when you scroll through page
      disableDefaultUI: true, // a way to quickly hide all controls
      zoomControl: true,
      styles: [{
        "featureType": "water",
        "stylers": [{"saturation": 43}, {"lightness": -11}, {"hue": "#0088ff"}]
      }, {
        "featureType": "road",
        "elementType": "geometry.fill",
        "stylers": [{"hue": "#ff0000"}, {"saturation": -100}, {"lightness": 99}]
      }, {
        "featureType": "road",
        "elementType": "geometry.stroke",
        "stylers": [{"color": "#808080"}, {"lightness": 54}]
      }, {
        "featureType": "landscape.man_made",
        "elementType": "geometry.fill",
        "stylers": [{"color": "#ece2d9"}]
      }, {
        "featureType": "poi.park",
        "elementType": "geometry.fill",
        "stylers": [{"color": "#ccdca1"}]
      }, {
        "featureType": "road",
        "elementType": "labels.text.fill",
        "stylers": [{"color": "#767676"}]
      }, {
        "featureType": "road",
        "elementType": "labels.text.stroke",
        "stylers": [{"color": "#ffffff"}]
      }, {"featureType": "poi", "stylers": [{"visibility": "off"}]}, {
        "featureType": "landscape.natural",
        "elementType": "geometry.fill",
        "stylers": [{"visibility": "on"}, {"color": "#b8cb93"}]
      }, {"featureType": "poi.park", "stylers": [{"visibility": "on"}]}, {
        "featureType": "poi.sports_complex",
        "stylers": [{"visibility": "on"}]
      }, {"featureType": "poi.medical", "stylers": [{"visibility": "on"}]}, {
        "featureType": "poi.business",
        "stylers": [{"visibility": "simplified"}]
      }]

    }

    var map = new google.maps.Map(document.getElementById("customSkinMap"), mapOptions);

    var marker = new google.maps.Marker({
      position: myLatlng,
      title: "Custom Skin & Settings Map!"
    });

    marker.setMap(map);


    // Satellite Map
    var myLatlng = new google.maps.LatLng(40.748817, -73.985428);
    var mapOptions = {
      zoom: 3,
      scrollwheel: false, //we disable de scroll over the map, it is a really annoing when you scroll through page
      center: myLatlng,
      mapTypeId: google.maps.MapTypeId.SATELLITE
    }

    var map = new google.maps.Map(document.getElementById("satelliteMap"), mapOptions);

    var marker = new google.maps.Marker({
      position: myLatlng,
      title: "Satellite Map!"
    });

    marker.setMap(map);


  },

  showNotification: function (from, align) {
    color = Math.floor((Math.random() * 4) + 1);

    $.notify({
      icon: "pe-7s-gift",
      message: "<b>Light Bootstrap Dashboard PRO</b> - forget about boring dashboards."

    }, {
      type: type[color],
      timer: 4000,
      placement: {
        from: from,
        align: align
      }
    });
  },

  initVectorMap: function () {
    var mapData = {
      "AU": 760,
      "BR": 550,
      "CA": 120,
      "DE": 1300,
      "FR": 540,
      "GB": 690,
      "GE": 200,
      "IN": 200,
      "RO": 600,
      "RU": 300,
      "US": 2920,
    };

    $('#worldMap').vectorMap({
      map: 'world_mill_en',
      backgroundColor: "transparent",
      zoomOnScroll: false,
      regionStyle: {
        initial: {
          fill: '#e4e4e4',
          "fill-opacity": 0.9,
          stroke: 'none',
          "stroke-width": 0,
          "stroke-opacity": 0
        }
      },

      series: {
        regions: [{
          values: mapData,
          scale: ["#AAAAAA", "#444444"],
          normalizeFunction: 'polynomial'
        }]
      },
    });
  },

  initAnimationsArea: function () {
    $('.animationsArea .btn').click(function () {
      animation_class = $(this).data('animation-class');

      $parent = $(this).closest('.animationsArea');

      $parent.find('.btn').removeClass('btn-fill');

      $(this).addClass('btn-fill');

      $parent.find('.animated')
        .removeAttr('class')
        .addClass('animated')
        .addClass(animation_class);

      $parent.siblings('.header').find('.title small').html('class: <code>animated ' + animation_class + '</code>');
    });
  },

  showSwal: function (type) {
    if (type == 'basic') {
      swal("Here's a message!");

    } else if (type == 'title-and-text') {
      swal("Here's a message!", "It's pretty, isn't it?")

    } else if (type == 'success-message') {
      swal("Good job!", "You clicked the button!", "success")

    } else if (type == 'warning-message-and-confirmation') {
      swal({
        title: "Are you sure?",
        text: "You will not be able to recover this imaginary file!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn btn-info btn-fill",
        confirmButtonText: "Yes, delete it!",
        cancelButtonClass: "btn btn-danger btn-fill",
        closeOnConfirm: false,
      }, function () {
        swal("Deleted!", "Your imaginary file has been deleted.", "success");
      });

    } else if (type == 'warning-message-and-cancel') {
      swal({
        title: "Are you sure?",
        text: "You will not be able to recover this imaginary file!",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel plx!",
        closeOnConfirm: false,
        closeOnCancel: false
      }, function (isConfirm) {
        if (isConfirm) {
          swal("Deleted!", "Your imaginary file has been deleted.", "success");
        } else {
          swal("Cancelled", "Your imaginary file is safe :)", "error");
        }
      });

    } else if (type == 'custom-html') {
      swal({
        title: 'HTML example',
        html: 'You can use <b>bold text</b>, ' +
        '<a href="http://github.com">links</a> ' +
        'and other HTML tags'
      });

    } else if (type == 'auto-close') {
      swal({
        title: "Auto close alert!",
        text: "I will close in 2 seconds.",
        timer: 2000,
        showConfirmButton: false
      });
    } else if (type == 'input-field') {
      swal({
          title: 'Input something',
          html: '<p><input id="input-field" class="form-control">',
          showCancelButton: true,
          closeOnConfirm: false,
          allowOutsideClick: false
        },
        function () {
          swal({
            html: 'You entered: <strong>' +
            $('#input-field').val() +
            '</strong>'
          });
        })
    }
  },

  initFormExtendedSliders: function () {

    // Sliders for demo purpose in refine cards section
    if ($('#slider-range').length != 0) {
      $("#slider-range").slider({
        range: true,
        min: 0,
        max: 500,
        values: [75, 300],
      });
    }
    if ($('#refine-price-range').length != 0) {
      $("#refine-price-range").slider({
        range: true,
        min: 0,
        max: 999,
        values: [100, 850],
        slide: function (event, ui) {
          min_price = ui.values[0];
          max_price = ui.values[1];
          $(this).siblings('.price-left').html('&euro; ' + min_price);
          $(this).siblings('.price-right').html('&euro; ' + max_price)
        }
      });
    }

    if ($('#slider-default').length != 0 || $('#slider-default2').length != 0) {
      $("#slider-default, #slider-default2").slider({
        value: 70,
        orientation: "horizontal",
        range: "min",
        animate: true
      });
    }
  },

  initFormExtendedDatetimepickers: function () {
    $('.datetimepicker').datetimepicker({
      icons: {
        time: "fa fa-clock-o",
        date: "fa fa-calendar",
        up: "fa fa-chevron-up",
        down: "fa fa-chevron-down",
        previous: 'fa fa-chevron-left',
        next: 'fa fa-chevron-right',
        today: 'fa fa-screenshot',
        clear: 'fa fa-trash',
        close: 'fa fa-remove'
      }
    });

    $('.datepicker').datetimepicker({
      format: 'MM/DD/YYYY',
      icons: {
        time: "fa fa-clock-o",
        date: "fa fa-calendar",
        up: "fa fa-chevron-up",
        down: "fa fa-chevron-down",
        previous: 'fa fa-chevron-left',
        next: 'fa fa-chevron-right',
        today: 'fa fa-screenshot',
        clear: 'fa fa-trash',
        close: 'fa fa-remove'
      }
    });

    $('.timepicker').datetimepicker({
//          format: 'H:mm',    // use this format if you want the 24hours timepicker
      format: 'h:mm A',    //use this format if you want the 12hours timpiecker with AM/PM toggle
      icons: {
        time: "fa fa-clock-o",
        date: "fa fa-calendar",
        up: "fa fa-chevron-up",
        down: "fa fa-chevron-down",
        previous: 'fa fa-chevron-left',
        next: 'fa fa-chevron-right',
        today: 'fa fa-screenshot',
        clear: 'fa fa-trash',
        close: 'fa fa-remove'
      }
    });
  },

  initFullCalendar: function () {
    $calendar = $('#fullCalendar');

    today = new Date();
    y = today.getFullYear();
    m = today.getMonth();
    d = today.getDate();

    $calendar.fullCalendar({
      header: {
        left: 'title',
        center: 'month,agendaWeek,agendaDay',
        right: 'prev,next today'
      },
      defaultDate: today,
      selectable: true,
      selectHelper: true,
      titleFormat: {
        month: 'MMMM YYYY', // September 2015
        week: "MMMM D YYYY", // September 2015
        day: 'D MMM, YYYY'  // Tuesday, Sep 8, 2015
      },
      select: function (start, end) {

        // on select we show the Sweet Alert modal with an input
        swal({
          title: 'Create an Event',
          html: '<br><input class="form-control" placeholder="Event Title" id="input-field">',
          showCancelButton: true,
          closeOnConfirm: true
        }, function () {

          var eventData;
          event_title = $('#input-field').val();

          if (event_title) {
            eventData = {
              title: event_title,
              start: start,
              end: end
            };
            $calendar.fullCalendar('renderEvent', eventData, true); // stick? = true
          }

          $calendar.fullCalendar('unselect');

        });
      },
      editable: true,
      eventLimit: true, // allow "more" link when too many events


      // color classes: [ event-blue | event-azure | event-green | event-orange | event-red ]
      events: [
        {
          title: 'All Day Event',
          start: new Date(y, m, 1)
        },
        {
          id: 999,
          title: 'Repeating Event',
          start: new Date(y, m, d - 4, 6, 0),
          allDay: false,
          className: 'event-blue'
        },
        {
          id: 999,
          title: 'Repeating Event',
          start: new Date(y, m, d + 3, 6, 0),
          allDay: false,
          className: 'event-blue'
        },
        {
          title: 'Meeting',
          start: new Date(y, m, d - 1, 10, 30),
          allDay: false,
          className: 'event-green'
        },
        {
          title: 'Lunch',
          start: new Date(y, m, d + 7, 12, 0),
          end: new Date(y, m, d + 7, 14, 0),
          allDay: false,
          className: 'event-red'
        },
        {
          title: 'LBD Launch',
          start: new Date(y, m, d - 2, 12, 0),
          allDay: true,
          className: 'event-azure'
        },
        {
          title: 'Birthday Party',
          start: new Date(y, m, d + 1, 19, 0),
          end: new Date(y, m, d + 1, 22, 30),
          allDay: false,
        },
        {
          title: 'Click for Creative Tim',
          start: new Date(y, m, 21),
          end: new Date(y, m, 22),
          url: 'http://www.creative-tim.com/',
          className: 'event-orange'
        },
        {
          title: 'Click for Google',
          start: new Date(y, m, 23),
          end: new Date(y, m, 23),
          url: 'http://www.creative-tim.com/',
          className: 'event-orange'
        }
      ]
    });
  },
  showNotification: function (from, align) {
    color = Math.floor((Math.random() * 4) + 1);

    $.notify({
      icon: "pe-7s-gift",
      message: "Welcome to <b>Light Bootstrap Dashboard</b> - a beautiful freebie for every web developer."

    }, {
      type: type[color],
      timer: 4000,
      placement: {
        from: from,
        align: align
      }
    });
  }


}

function iconList() {

  var icons = [
    'pe-7s-album',
    'pe-7s-arc',
    'pe-7s-back-2',
    'pe-7s-bandaid',
    'pe-7s-car',
    'pe-7s-diamond',
    'pe-7s-door-lock',
    'pe-7s-eyedropper',
    'pe-7s-female',
    'pe-7s-gym',
    'pe-7s-hammer',
    'pe-7s-headphones',
    'pe-7s-helm',
    'pe-7s-hourglass',
    'pe-7s-leaf',
    'pe-7s-magic-wand',
    'pe-7s-male',
    'pe-7s-map-2',
    'pe-7s-next-2',
    'pe-7s-paint-bucket',
    'pe-7s-pendrive',
    'pe-7s-photo',
    'pe-7s-piggy',
    'pe-7s-plugin',
    'pe-7s-refresh-2',
    'pe-7s-rocket',
    'pe-7s-settings',
    'pe-7s-shield',
    'pe-7s-smile',
    'pe-7s-usb',
    'pe-7s-vector',
    'pe-7s-wine',
    'pe-7s-cloud-upload',
    'pe-7s-cash',
    'pe-7s-close',
    'pe-7s-bluetooth',
    'pe-7s-cloud-download',
    'pe-7s-way',
    'pe-7s-close-circle',
    'pe-7s-id',
    'pe-7s-angle-up',
    'pe-7s-wristwatch',
    'pe-7s-angle-up-circle',
    'pe-7s-world',
    'pe-7s-angle-right',
    'pe-7s-volume',
    'pe-7s-angle-right-circle',
    'pe-7s-users',
    'pe-7s-angle-left',
    'pe-7s-user-female',
    'pe-7s-angle-left-circle',
    'pe-7s-up-arrow',
    'pe-7s-angle-down',
    'pe-7s-switch',
    'pe-7s-angle-down-circle',
    'pe-7s-scissors',
    'pe-7s-wallet',
    'pe-7s-safe',
    'pe-7s-volume2',
    'pe-7s-volume1',
    'pe-7s-voicemail',
    'pe-7s-video',
    'pe-7s-user',
    'pe-7s-upload',
    'pe-7s-unlock',
    'pe-7s-umbrella',
    'pe-7s-trash',
    'pe-7s-tools',
    'pe-7s-timer',
    'pe-7s-ticket',
    'pe-7s-target',
    'pe-7s-sun',
    'pe-7s-study',
    'pe-7s-stopwatch',
    'pe-7s-star',
    'pe-7s-speaker',
    'pe-7s-signal',
    'pe-7s-shuffle',
    'pe-7s-shopbag',
    'pe-7s-share',
    'pe-7s-server',
    'pe-7s-search',
    'pe-7s-film',
    'pe-7s-science',
    'pe-7s-disk',
    'pe-7s-ribbon',
    'pe-7s-repeat',
    'pe-7s-refresh',
    'pe-7s-add-user',
    'pe-7s-refresh-cloud',
    'pe-7s-paperclip',
    'pe-7s-radio',
    'pe-7s-note2',
    'pe-7s-print',
    'pe-7s-network',
    'pe-7s-prev',
    'pe-7s-mute',
    'pe-7s-power',
    'pe-7s-medal',
    'pe-7s-portfolio',
    'pe-7s-like2',
    'pe-7s-plus',
    'pe-7s-left-arrow',
    'pe-7s-play',
    'pe-7s-key',
    'pe-7s-plane',
    'pe-7s-joy',
    'pe-7s-photo-gallery',
    'pe-7s-pin',
    'pe-7s-phone',
    'pe-7s-plug',
    'pe-7s-pen',
    'pe-7s-right-arrow',
    'pe-7s-paper-plane',
    'pe-7s-delete-user',
    'pe-7s-paint',
    'pe-7s-bottom-arrow',
    'pe-7s-notebook',
    'pe-7s-note',
    'pe-7s-next',
    'pe-7s-news-paper',
    'pe-7s-musiclist',
    'pe-7s-music',
    'pe-7s-mouse',
    'pe-7s-more',
    'pe-7s-moon',
    'pe-7s-monitor',
    'pe-7s-micro',
    'pe-7s-menu',
    'pe-7s-map',
    'pe-7s-map-marker',
    'pe-7s-mail',
    'pe-7s-mail-open',
    'pe-7s-mail-open-file',
    'pe-7s-magnet',
    'pe-7s-loop',
    'pe-7s-look',
    'pe-7s-lock',
    'pe-7s-lintern',
    'pe-7s-link',
    'pe-7s-like',
    'pe-7s-light',
    'pe-7s-less',
    'pe-7s-keypad',
    'pe-7s-junk',
    'pe-7s-info',
    'pe-7s-home',
    'pe-7s-help2',
    'pe-7s-help1',
    'pe-7s-graph3',
    'pe-7s-graph2',
    'pe-7s-graph1',
    'pe-7s-graph',
    'pe-7s-global',
    'pe-7s-gleam',
    'pe-7s-glasses',
    'pe-7s-gift',
    'pe-7s-folder',
    'pe-7s-flag',
    'pe-7s-filter',
    'pe-7s-file',
    'pe-7s-expand1',
    'pe-7s-exapnd2',
    'pe-7s-edit',
    'pe-7s-drop',
    'pe-7s-drawer',
    'pe-7s-download',
    'pe-7s-display2',
    'pe-7s-display1',
    'pe-7s-diskette',
    'pe-7s-date',
    'pe-7s-cup',
    'pe-7s-culture',
    'pe-7s-crop',
    'pe-7s-credit',
    'pe-7s-copy-file',
    'pe-7s-config',
    'pe-7s-compass',
    'pe-7s-comment',
    'pe-7s-coffee',
    'pe-7s-cloud',
    'pe-7s-clock',
    'pe-7s-check',
    'pe-7s-chat',
    'pe-7s-cart',
    'pe-7s-camera',
    'pe-7s-call',
    'pe-7s-calculator',
    'pe-7s-browser',
    'pe-7s-box2',
    'pe-7s-box1',
    'pe-7s-bookmarks',
    'pe-7s-bicycle',
    'pe-7s-bell',
    'pe-7s-battery',
    'pe-7s-ball',
    'pe-7s-back',
    'pe-7s-attention',
    'pe-7s-anchor',
    'pe-7s-albums',
    'pe-7s-alarm',
    'pe-7s-airplay'
  ];

  var iconModal = '<div class="modal fade modal-max" id="iconModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">';
  iconModal += '<div class="modal-dialog" role="document">';
  iconModal += '<div class="modal-content">';
  iconModal += '<div class="modal-header">';
  iconModal += '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
  iconModal += '<h4 class="modal-title" id="gridSystemModalLabel">All available icons</h4>';
  iconModal += '</div>';
  iconModal += '<div class="modal-body">';

  iconModal += '<div class="content all-icons"><div class="row">';
  iconModal += '<div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">';
  iconModal += '<div class="font-icon-detail" style="padding: 65px 0 52px;"><p>None</p></div>';
  iconModal += '</div>';
  for (i = 0; i < icons.length; i++) {
    iconModal += '<div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">';
    iconModal += '<div class="font-icon-detail"><i class="' + icons[i] + '"></i><p>' + icons[i] + '</p></div>';
    iconModal += '</div>';
  }

  iconModal += '</div></div>';
  iconModal += '</div>'; //modal-body
  iconModal += '</div>'; //modal-content
  iconModal += '</div>'; //modal-dialog
  iconModal += '</div>'; //modal

  return iconModal;
}

function loadingBeforeReloadPage() {
  $('body').append('<div id="submit-loading"><div class="spinner"><div class="rect1"></div><div class="rect2"></div><div class="rect3"></div><div class="rect4"></div><div class="rect5"></div></div></div>');
}

$(document).ready(function () {
  $('a[disabled]').click(function (e) {
    e.preventDefault();
    return false;
  });

  $(document).on('click', '.form-fixed-footer [type="submit"], .modal-footer #doneUpload, .submit-with-loading', function (e) {
    loadingBeforeReloadPage();
  });

  $(document).on('click', '.choose-icon', function () {
    if ($('#iconModal').length == 0) {
      $('body').append(iconList());

      $('#iconModal').modal('show').data('target-input', $(this).closest('.icon-control').find('input[type="hidden"]'));
    }
  });

  $(document).on('click', '#iconModal .font-icon-detail', function () {
    var iconValue = $(this).find('p').text();
    var targetInput = $('#iconModal').data('target-input');

    $('#iconModal').modal('hide');
    if (iconValue == 'None') {
      iconValue = null;

      targetInput.val('');
      targetInput.parent().find('button').html('');
    } else {
      targetInput.val(iconValue);
      targetInput.parent().find('button').html('<span class="icon ' + iconValue + '"></span><span>' + iconValue + '</span>');
    }
  });

});

$('.make-slug').bind('change blur keydown keypress keyup', function () {
  $($(this).data('target')).val(slug($(this).val()));
});

var slug = function (str) {
  var $slug = '';
  var trimmed = $.trim(str);
  $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').replace(/-+/g, '-').replace(/^-|-$/g, '');
  return $slug.toLowerCase();
}

function notify(message, type) {
  $.notify({
    icon: 'pe-7s-info',
    message: message
  }, {
    type: type,
    timer: 4000
  });
}

$.fn.previewImage = function (input) {
  var $this = $(this);

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {

    }

    reader.addEventListener("load", function () {
      console.log(reader.result);
      $this.html('<img class="img-responsive" src="' + reader.result + '">');
    }, false);

    // if (file) {
    //     reader.readAsDataURL(file);
    // }

    reader.readAsDataURL(input.files[0]);
  }
}

$.fn.jFiler = function () {
  var $elm = $(this);

  var actionUpload = $elm.data('action');
  var actionRemove = $elm.data('action-remove');
  var elmPreview = $elm.data('thumb-container');
  var token = $elm.data('token');

  //Example 2
  $elm.filer({
    limit: null,
    maxSize: null,
    extensions: null,
    changeInput: '<div class="jFiler-input-dragDrop"><div class="jFiler-input-inner"><div class="jFiler-input-icon"><i class="icon-jfi-cloud-up-o"></i></div><div class="jFiler-input-text"><h3>Drag&Drop files here</h3> <span style="display:inline-block; margin: 15px 0">or</span></div><a class="jFiler-input-choose-btn blue">Browse Files</a></div></div>',
    showThumbs: true,
    appendTo: elmPreview,
    theme: "dragdropbox",
    templates: {
      box: '<ul class="jFiler-items-list jFiler-items-grid"></ul>',
      item: '<li class="jFiler-item">\
                        <div class="jFiler-item-container">\
                            <div class="jFiler-item-inner">\
                                <div class="jFiler-item-thumb">\
                                    <div class="jFiler-item-status"></div>\
                                    <div class="jFiler-item-info">\
                                        <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>\
                                        <span class="jFiler-item-others">{{fi-size2}}</span>\
                                    </div>\
                                    {{fi-image}}\
                                </div>\
                                <div class="jFiler-item-assets jFiler-row">\
                                    <ul class="list-inline pull-left">\
                                        <li>{{fi-progressBar}}</li>\
                                    </ul>\
                                    <ul class="list-inline pull-right">\
                                        <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
                                    </ul>\
                                </div>\
                            </div>\
                        </div>\
                    </li>',
      itemAppend: '<li class="jFiler-item">\
                            <div class="jFiler-item-container">\
                                <div class="jFiler-item-inner">\
                                    <div class="jFiler-item-thumb">\
                                        <div class="jFiler-item-status"></div>\
                                        <div class="jFiler-item-info">\
                                            <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>\
                                            <span class="jFiler-item-others">{{fi-size2}}</span>\
                                        </div>\
                                        {{fi-image}}\
                                    </div>\
                                    <div class="jFiler-item-assets jFiler-row">\
                                        <ul class="list-inline pull-left">\
                                            <li><span class="jFiler-item-others">{{fi-icon}}</span></li>\
                                        </ul>\
                                        <ul class="list-inline pull-right">\
                                            <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
                                        </ul>\
                                    </div>\
                                </div>\
                            </div>\
                        </li>',
      progressBar: '<div class="bar"></div>',
      itemAppendToEnd: false,
      removeConfirmation: true,
      _selectors: {
        list: '.jFiler-items-list',
        item: '.jFiler-item',
        progressBar: '.bar',
        remove: '.jFiler-item-trash-action'
      }
    },
    dragDrop: {
      dragEnter: null,
      dragLeave: null,
      drop: null,
    },
    uploadFile: {
      url: actionUpload,
      data: {'_token': token},
      type: 'POST',
      enctype: 'multipart/form-data',
      beforeSend: function () {
      },
      success: function (data, el) {
        var parent = el.find(".jFiler-jProgressBar").parent();
        el.find(".jFiler-jProgressBar").fadeOut("slow", function () {
          $("<div class=\"jFiler-item-others text-success\"><i class=\"icon-jfi-check-circle\"></i> Success</div>").hide().appendTo(parent).fadeIn("slow");
        });
      },
      error: function (el) {
        $('#uploadImageform').serialize()

        var parent = el.find(".jFiler-jProgressBar").parent();
        el.find(".jFiler-jProgressBar").fadeOut("slow", function () {
          $("<div class=\"jFiler-item-others text-error\"><i class=\"icon-jfi-minus-circle\"></i> Error</div>").hide().appendTo(parent).fadeIn("slow");
        });
      },
      statusCode: null,
      onProgress: null,
      onComplete: null
    },
    files: null,
    addMore: false,
    clipBoardPaste: true,
    excludeName: null,
    beforeRender: null,
    afterRender: null,
    beforeShow: null,
    beforeSelect: null,
    onSelect: null,
    afterShow: null,
    onRemove: function (itemEl, file, id, listEl, boxEl, newInputEl, inputEl) {
      var file = file.name;
      $.post(actionRemove, {file: file, '_token': token});
    },
    onEmpty: null,
    options: null,
    captions: {
      button: "Choose Files",
      feedback: "Choose files To Upload",
      feedback2: "files were chosen",
      drop: "Drop file here to Upload",
      removeConfirmation: "Are you sure you want to remove this file?",
      errors: {
        filesLimit: "Only {{fi-limit}} files are allowed to be uploaded.",
        filesType: "Only Images are allowed to be uploaded.",
        filesSize: "{{fi-name}} is too large! Please upload file up to {{fi-maxSize}} MB.",
        filesSizeAll: "Files you've choosed are too large! Please upload files up to {{fi-maxSize}} MB."
      }
    }
  });

}

function loadDataList(url, data, elementAppend) {
    $.ajax({
        'url': url,
        'type': 'GET',
        'data': data,
        'success': function (res) {
            $(elementAppend).html(res);
        }
    });
}

function search(url, idList) {
    var text = $('.txt-search').val();
    if (text) {
        loadDataList(base_url + url, {'search_term': text}, idList);
    } else {
        loadDataList(base_url + url, null, idList);
    }
}

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //---- Search owners ------------------------------
    $('#search_owner').on('input', function () {
        var searchTerm = $(this).val().toLowerCase();
        if (!searchTerm) {
            $('table tr').show();

            return true;
        }

        $('table tr').removeClass('found');

        $('table tr td').each(function () {
            var item = $(this);

            if (item.text().trim()) {
                if (item.text().toString().toLowerCase().indexOf(searchTerm) >= 0) {
                    (item.parent()).addClass('found').show();
                } else {
                    if (!(item.parent()).hasClass('found')) {
                        item.parent().hide();
                    }
                }
            }
        });
    });
// -------end search owners


//   ------------ Search search_property_active
    $('.search_property').on('input', function () {
        var search_type = $(this).attr('id');
        var searchTerm = $(this).val().toLowerCase();

        $('table tbody tr').hide();

        $.ajax({
            'method': 'POST',
            'url': siteUrl + '/properties/search_property',
            'data': {'searchTerm': searchTerm, 'search_type': search_type},
            'success': function (data) {

                $('table tbody tr').hide();

                if (!searchTerm) {
                    $('table tbody tr').fadeIn();
                    return false;
                }

                $.each(data.result, function (key, val) {
                    $('table tbody tr[class="' + val + '"]').show();
                });
            }
        });
    });




    $(document).on('click', '.sold-price', function () {

        var price = $('.input-sold-price').val();
        var id = $(this).data('id');
        var property_id = $(this).data('proid');
        if (!price) {
            notify("Please input price", "danger");
            return false;
        }
        $.ajax({
            type: 'post',
            url: base_url + '/invitees/sold-price',
            data: {'price': price, 'id': id, 'property_id': property_id},
            success: function (data) {
                $('#soldModal').modal('hide');
                notify("Property sold.", "info");
                $('table tr.tr_' + id).fadeOut();
            }
        });
    });
//    ----------- End search_property_active

    $(document).on('click', '.property-sold', function () {
        var id = $(this).data('id');
        var name = $(this).closest('tr').children('td:nth-child(2)').text();
        var gender = $(this).closest('tr').children('td:nth-child(3)').text();
        var status = $(this).closest('tr').children('td:nth-child(4)').text();
        var phone = $(this).closest('tr').children('td:nth-child(5)').text();
        var email = $(this).closest('tr').children('td:nth-child(6)').text();
        var refer = $(this).closest('tr').children('td:nth-child(7)').text();
        var price = $(this).closest('tr').children('td:nth-child(9)').text();

        $('#name').val(name);
        $('#gender').val(gender);
        $('#status').val(status);
        $('#phone').val(phone);
        $('#email').val(email);
        $('#referred').text(refer);
        $('#price').val(price);
        $('.sold-price').data('id', id);
        $('.sold-price').data('proid', $(this).data('proid'));
    });


});