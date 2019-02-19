var App = function () {
    'use strict';


    var CONSTANTS = {
        'readButton1': '#read-more-01',
        'readButton2': '#read-more-02',
        'moreDesc1': '#more-desc-01',
        'moreDesc2': '#more-desc-02'
    }

    var bindEvents = function () {

        $(CONSTANTS.moreDesc1).css('display', 'none');
        $(CONSTANTS.readButton1).css('cursor', 'pointer');
        $(CONSTANTS.readButton1).click(function () {
            if ($(CONSTANTS.readButton1).html() === 'Read More') {
                $(CONSTANTS.moreDesc1).css('display', 'block');
                $(CONSTANTS.readButton1).text('Read Less');
            } else {
                $(CONSTANTS.moreDesc1).css('display', 'none');
                $(CONSTANTS.readButton1).text('Read More');
            }
        });

        $(CONSTANTS.moreDesc2).css('display', 'none');
        $(CONSTANTS.readButton2).css('cursor', 'pointer');
        $(CONSTANTS.readButton2).click(function () {
            if ($(CONSTANTS.readButton2).html() === 'Read More') {
                $(CONSTANTS.moreDesc2).css('display', 'block');
                $(CONSTANTS.readButton2).text('Read Less');
            } else {
                $(CONSTANTS.moreDesc2).css('display', 'none');
                $(CONSTANTS.readButton2).text('Read More');
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