var App = function () {
    'use strict';


    var CONSTANTS = {
        'readButton': '.read-more',
        'moreDesc': '.more-desc',

    }

    var bindEvents = function () {

        $(CONSTANTS.moreDesc).css('display', 'none');
        $(CONSTANTS.readButton).css('cursor', 'pointer');
        $(CONSTANTS.readButton).click(function () {
            if ($(this).html() === 'Read More') {
                $(this).prev().css('display', 'block');
                $(this).text('Read Less');
            } else {
                $(this).prev().css('display', 'none');
                $(this).text('Read More');
            }
        });
    }

    return {
        init: function () {
            bindEvents();
        }
    };
}();

$(document).ready(function () {
    App.init();
});