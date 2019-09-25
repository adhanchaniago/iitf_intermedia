$(document).ready(function () {

    "use strict";

    /* --------------------------
     * GLOBAL VARS
     * -------------------------- */
    // The date you want to count down to
    var targetDate = new Date("2019/09/29 23:59:59");
    var targetDate2 = new Date("2019/10/13 08:59:59");

    // Other date related variables
    var days;
    var hrs;
    var min;
    var sec;

    var days2;
    var hrs2;
    var min2;
    var sec2;

    /* --------------------------
     * ON DOCUMENT LOAD
     * -------------------------- */
    $(function () {
        // Calculate time until launch date
        timeToLaunch();
        // Transition the current countdown from 0 
        numberTransition('#days .timer-number', days, 1000, 'easeOutQuad');
        numberTransition('#hours .timer-number', hrs, 1000, 'easeOutQuad');
        numberTransition('#minutes .timer-number', min, 1000, 'easeOutQuad');
        numberTransition('#seconds .timer-number', sec, 1000, 'easeOutQuad');

        timeToLaunch2();
        // Transition the current countdown from 0 
        numberTransition('#days .timer-number2', days2, 1000, 'easeOutQuad');
        numberTransition('#hours .timer-number2', hrs2, 1000, 'easeOutQuad');
        numberTransition('#minutes .timer-number2', min2, 1000, 'easeOutQuad');
        numberTransition('#seconds .timer-number2', sec2, 1000, 'easeOutQuad');
        // Begin Countdown
        setTimeout(countDownTimer, 1001);
        setTimeout(countDownTimer2, 1001);
    });

    /* --------------------------
 * FIGURE OUT THE AMOUNT OF 
   TIME LEFT BEFORE LAUNCH
 * -------------------------- */
    function timeToLaunch() {
        // Get the current date
        var currentDate = new Date();

        // Find the difference between dates
        var diff = (currentDate - targetDate) / 1000;
        var diff = Math.abs(Math.floor(diff));

        // Check number of days until target
        days = Math.floor(diff / (24 * 60 * 60));
        sec = diff - days * 24 * 60 * 60;

        // Check number of hours until target
        hrs = Math.floor(sec / (60 * 60));
        sec = sec - hrs * 60 * 60;

        // Check number of minutes until target
        min = Math.floor(sec / (60));
        sec = sec - min * 60;
    }

    function timeToLaunch2() {
        // Get the current date
        var currentDate = new Date();

        // Find the difference between dates
        var diff = (currentDate - targetDate2) / 1000;
        var diff = Math.abs(Math.floor(diff));

        // Check number of days until target
        days2 = Math.floor(diff / (24 * 60 * 60));
        sec2 = diff - days2 * 24 * 60 * 60;

        // Check number of hours until target
        hrs2 = Math.floor(sec2 / (60 * 60));
        sec2 = sec2 - hrs2 * 60 * 60;

        // Check number of minutes until target
        min2 = Math.floor(sec2 / (60));
        sec2 = sec2 - min2 * 60;
    }

    /* --------------------------
 * DISPLAY THE CURRENT 
   COUNT TO LAUNCH
 * -------------------------- */
    function countDownTimer() {

        // Figure out the time to launch
        timeToLaunch();

        // Write to countdown component
        $("#days .timer-number").text(days);
        $("#hours .timer-number").text(hrs);
        $("#minutes .timer-number").text(min);
        $("#seconds .timer-number").text(sec);

        // Repeat the check every second
        setTimeout(countDownTimer, 1000);
    }

    function countDownTimer2() {

        // Figure out the time to launch
        timeToLaunch2();

        // Write to countdown component
        $("#days .timer-number2").text(days2);
        $("#hours .timer-number2").text(hrs2);
        $("#minutes .timer-number2").text(min2);
        $("#seconds .timer-number2").text(sec2);

        // Repeat the check every second
        setTimeout(countDownTimer2, 1000);
    }

    /* --------------------------
 * TRANSITION NUMBERS FROM 0
   TO CURRENT TIME UNTIL LAUNCH
 * -------------------------- */
    function numberTransition(id, endPoint, transitionDuration, transitionEase) {
        // Transition numbers from 0 to the final number
        $({
            numberCount: $(id).text()
        }).animate({
            numberCount: endPoint
        }, {
            duration: transitionDuration,
            easing: transitionEase,
            step: function () {
                $(id).text(Math.floor(this.numberCount));
            },
            complete: function () {
                $(id).text(this.numberCount);
            }
        });
    };

})