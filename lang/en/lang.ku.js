/*
 * This file has been compiled from: /modules/system/lang/ku/client.php
 */
if ($.wn === undefined) $.wn = {}
if ($.oc === undefined) $.oc = $.wn
if ($.wn.langMessages === undefined) $.wn.langMessages = {}
$.wn.langMessages['ku'] = $.extend(
    $.wn.langMessages['ku'] || {},
    {
        "markdowneditor": {
            "formatting": "Formatandin",
            "quote": "Biparêzok",
            "code": "Koda",
            "header1": "Sernav 1",
            "header2": "Sernav 2",
            "header3": "Sernav 3",
            "header4": "Sernav 4",
            "header5": "Sernav 5",
            "header6": "Sernav 6",
            "bold": "Qelêtî",
            "italic": "Serhêl",
            "unorderedlist": "Lîsteya Neqanûnî",
            "orderedlist": "Lîsteya Qanûnî",
            "video": "Vîdyoyê",
            "image": "Wêneyê",
            "link": "Girrêdanê",
            "horizontalrule": "Xêta Çapê",
            "fullscreen": "Pûrbûr",
            "preview": "Pêşnerî"
        },
        "mediamanager": {
            "insert_link": "Girrêdana Medyayê Bikin",
            "insert_image": "Wêneyê Bikin",
            "insert_video": "Vîdyoyê Bikin",
            "insert_audio": "Sestan Bikin",
            "invalid_file_empty_insert": "Ji kerema xwe pelê hilbijêrin da ku li ser girêdanê bikin.",
            "invalid_file_single_insert": "Ji kerema xwe pelê yek hilbijêrin.",
            "invalid_image_empty_insert": "Ji kerema xwe wêne(yan) hilbijêrin ku li ser girêdanê bikin.",
            "invalid_video_empty_insert": "Ji kerema xwe pelê vîdyoyê hilbijêrin da ku li ser girêdanê bikin.",
            "invalid_audio_empty_insert": "Ji kerema xwe pelê sestê hilbijêrin da ku li ser girêdanê bikin."
        },
        "alert": {
            "confirm_button_text": "Erê",
            "cancel_button_text": "Betal",
            "widget_remove_confirm": "Ev widgetê jêbirin?"
        },
        "datepicker": {
            "previousMonth": "Meha Berê",
            "nextMonth": "Meha Piştî",
            "months": ["Rêbendan", "Reşemî", "Adar", "Avrêl", "Gulan", "Pûşper", "Tîrmeh", "Tebax", "Îlon", "Cotmeh", "Mijdar", "Berfanbar"],
            "weekdays": ["Yekşem", "Duşem", "Sêşem", "Çarşem", "Pêncşem", "Înî", "Şemî"],
            "weekdaysShort": ["Yek", "Du", "Sê", "Çar", "Pênc", "Înî", "Şemî"]
        },
        "colorpicker": {
            "last_color": "Rengê berê bikar bînin",
            "aria_palette": "Qada hilbijartina rengê",
            "aria_hue": "Slidera hilbijartina rengê",
            "aria_opacity": "Slidera hilbijartina şeffafiyê"
        },
        "filter": {
            "group": {
                "all": "Hemû"
            },
            "scopes": {
                "apply_button_text": "Bikaranîn",
                "clear_button_text": "Paqij bûnin"
            },
            "dates": {
                "all": "Hemû",
                "filter_button_text": "Parzûn",
                "reset_button_text": "Veşartin",
                "date_placeholder": "Dîrok",
                "after_placeholder": "Piştî",
                "before_placeholder": "Berî"
            },
            "numbers": {
                "all": "Hemû",
                "filter_button_text": "Parzûn",
                "reset_button_text": "Veşartin",
                "min_placeholder": "Min",
                "max_placeholder": "Zêde"
            }
        },
        "eventlog": {
            "show_stacktrace": "Stacktrace nîşan bide",
            "hide_stacktrace": "Stacktrace veşêre",
            "tabs": {
                "formatted": "Format kirî",
                "raw": "Raw"
            },
            "editor": {
                "title": "Edîtora kodê",
                "description": "Sistemê karûbarê we ya karûbarê pêwîst e ku bi yek ji van şemayên URL-an guhdar bike.",
                "openWith": "Bi vêve vekin",
                "remember_choice": "Vebijêrkek hilbijartî ji bo vê serê hilgirtinê bîr bike",
                "open": "Vekirin",
                "cancel": "Betal"
            }
        }
    }
    
);

//! moment.js locale configuration v2.22.2

;(function (global, factory) {
   typeof exports === 'object' && typeof module !== 'undefined'
       && typeof require === 'function' ? factory(require('../moment')) :
   typeof define === 'function' && define.amd ? define(['../moment'], factory) :
   factory(global.moment)
}(this, (function (moment) { 'use strict';


    var ku = moment.defineLocale('ku', {
        months : 'January_February_March_April_May_June_July_August_September_October_November_December'.split('_'),
        monthsShort : 'Jan_Feb_Mar_Apr_May_Jun_Jul_Aug_Sep_Oct_Nov_Dec'.split('_'),
        weekdays : 'Sunday_Monday_Tuesday_Wednesday_Thursday_Friday_Saturday'.split('_'),
        weekdaysShort : 'Sun_Mon_Tue_Wed_Thu_Fri_Sat'.split('_'),
        weekdaysMin : 'Su_Mo_Tu_We_Th_Fr_Sa'.split('_'),
        longDateFormat : {
            LT : 'h:mm A',
            LTS : 'h:mm:ss A',
            L : 'DD/MM/YYYY',
            LL : 'D MMMM YYYY',
            LLL : 'D MMMM YYYY h:mm A',
            LLLL : 'dddd, D MMMM YYYY h:mm A'
        },
        calendar : {
            sameDay : '[Today at] LT',
            nextDay : '[Tomorrow at] LT',
            nextWeek : 'dddd [at] LT',
            lastDay : '[Yesterday at] LT',
            lastWeek : '[Last] dddd [at] LT',
            sameElse : 'L'
        },
        relativeTime : {
            future : 'in %s',
            past : '%s ago',
            s : 'a few seconds',
            ss : '%d seconds',
            m : 'a minute',
            mm : '%d minutes',
            h : 'an hour',
            hh : '%d hours',
            d : 'a day',
            dd : '%d days',
            M : 'a month',
            MM : '%d months',
            y : 'a year',
            yy : '%d years'
        },
        dayOfMonthOrdinalParse: /\d{1,2}(st|nd|rd|th)/,
        ordinal : function (number) {
            var b = number % 10,
                output = (~~(number % 100 / 10) === 1) ? 'th' :
                (b === 1) ? 'st' :
                (b === 2) ? 'nd' :
                (b === 3) ? 'rd' : 'th';
            return number + output;
        },
        week : {
            dow : 1, // Monday is the first day of the week.
            doy : 4  // The week that contains Jan 4th is the first week of the year.
        }
    });

    return ku;

})));

