/**
 * Global events can be used to trigger events, and pass event-data, across frameworks.
 */
define(['jquery'], function ($) {

    var $eventobject = $({});

    return {
        bind: function () {
            $eventobject.bind.apply($eventobject, arguments);
        },
        trigger: function () {
            $eventobject.trigger.apply($eventobject, arguments);
        }
    };
});