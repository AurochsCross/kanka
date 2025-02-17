// Live search is based on corejs-typeahead.
// Doc: https://github.com/corejavascript/typeahead.js

require('corejs-typeahead');
window.Bloodhound = require('bloodhound-js');

var liveSearchField;
var liveSearchForm, liveSearchClose;
var searchEngine;
var liveSearchTargetUrl;



$(document).ready(function() {
    liveSearchField = $('.typeahead');
    if (liveSearchField.length !== 1) {
        return;
    }
    initLiveSearch();
});

/**
 * Init the bloodhound search engine
 */
function initSearchEngine() {
    // Set the Options for "Bloodhound" suggestion engine
    searchEngine = new window.Bloodhound({
        remote: {
            url: liveSearchField.data('url') + '?q=%QUERY%',
            wildcard: '%QUERY%'
        },
        datumTokenizer: window.Bloodhound.tokenizers.whitespace('q'),
        queryTokenizer: window.Bloodhound.tokenizers.whitespace
    });
}
/**
 * Live Search
 */
function initLiveSearch() {
    initSearchEngine();

    liveSearchField.typeahead({
        minLength: 3
    },{
        source: searchEngine.ttAdapter(),

        // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
        name: 'entityList',

        // Data field used for selection injection in the search field
        displayKey: 'name',
        valueKey: 'id',

        // the key from the array we want to display (name,id,email,etc...)
        templates: {
            empty: [
                '<div class="list-group search-results-dropdown">' +
                '<div class="list-group-item">' + liveSearchField.data('empty') + '</div>' +
                '</div>'
            ],
            header: [
                ''
            ],
            suggestion: function (data) {
                return '<a href="' + data.url + '" class="list-group-item" title="' + data.tooltip +
                    '" data-toggle="tooltip">' +
                    data.image + data.name + ' (' + data.type + ')</a>'
                ;
            }
        }
    })

    //Catch typeahead events
    .on('typeahead:select', submitSelection)
    .on('typeahead:autocomplete', submitSuggestion)
    .on('keyup', submitEnter)
    ;

    // Mobile search
    liveSearchForm = $('.live-search-form');
    liveSearchClose = $('.live-search-close');
    $('.mobile-search').on('click', function(e) {
        e.preventDefault();
        liveSearchForm.removeClass('visible-md').removeClass('visible-lg');
        $('.navbar-custom-menu').hide();
        $('#live-search').focus();
    });

    liveSearchClose.on('click', function(e) {
        e.preventDefault();
        liveSearchForm.addClass('visible-md').addClass('visible-lg');
        $('.navbar-custom-menu').show();
    });
}

/**
 * User triggered a submit, either via the typeahead:submit
 * or autocomplete event
 */
function submitSuggestion(ev, suggestion) {
    //console.log('suggestion');
    //liveSearchField.val(suggestion.name);
    liveSearchField.prop('disabled', true);
    window.location = suggestion.url;
}

function submitSelection(ev, suggestion) {
    liveSearchTargetUrl = suggestion.url;
    //console.log('selection', ev);
}

function submitEnter(ev) {
    if (ev.keyCode !== 13) {
        return;
    }

    //console.log('trigger search', liveSearchTargetUrl);
    if (liveSearchTargetUrl) {
        liveSearchField.prop('disabled', true);
        window.location = liveSearchTargetUrl;
    }
}
