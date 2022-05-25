import deleteConfirm from "../components/delete-confirm";

//require ('leaflet.markercluster/dist/leaflet.markercluster');
//require ('leaflet.markercluster.layersupport');

var mapPageBody;
var sidebarMap, sidebarMarker;
var markerModal, markerModalContent, markerModalTitle;

$(document).ready(function() {

    window.map.invalidateSize();
    //deleteConfirm();

    window.map.on('popupopen', function (ev) {
        deleteConfirm();
    });

    // Event fired when clicking on an existing map point

    $('a[href="#marker-pin"]').click(function (e) {
        $('input[name="shape_id"]').val(1);
        $('#map-marker-bg-colour').show();
    });
    $('a[href="#marker-label"]').click(function (e) {
        $('input[name="shape_id"]').val(2);
        $('#map-marker-bg-colour').hide();
    });
    $('a[href="#marker-circle"]').click(function (e) {
        $('input[name="shape_id"]').val(3);
        $('#map-marker-bg-colour').show();
    });
    $('a[href="#marker-poly"]').click(function (e) {
        $('input[name="shape_id"]').val(5);
        $('#map-marker-bg-colour').show();
    });
    $('a[href="#form-markers"]').click(function (e) {
        window.map.invalidateSize();
    });

    initMapExplore();
    initMapForms();
    initMapEntryClick();
});

/**
 *
 */
function initMapExplore()
{
    //console.log('initMapExplore', '');
    mapPageBody = $('#map-body');
    if (mapPageBody.length === 0) {
        //console.log('initMapExplore', 'no explore mode');
        return;
    }
    sidebarMap = $('#sidebar-map');
    sidebarMarker = $('#sidebar-marker');
    markerModal = $('#map-marker-modal');
    markerModalTitle = $('#map-marker-modal-title');
    markerModalContent = $('#map-marker-modal-content');

    // Allow ajax requests to use the X_CSRF_TOKEN for moves
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    window.markerDetails = function(url)
    {
        showSidebar();
        if (window.kankaIsMobile.matches) {
            url = url + '?mobile=1'
        }
        $.ajax({
            url: url,
            type: 'GET',
            async: true,
            success: function (result) {
                if (result) {
                    if (window.kankaIsMobile.matches) {
                        markerModalTitle.html(result.name);
                        markerModalContent.find('.content').html(result.body);
                        markerModalContent.find('.spinner').hide();
                    } else {
                        sidebarMarker.html(result.body).parent().find('.spinner').hide();

                        handleCloseMarker();
                        mapPageBody.addClass('sidebar-open');
                    }
                    deleteConfirm();
                }
            }
        })
    }

    initLegend();
}

/**
 * When submitting the layer or marker form from the map modal, disable the map form unsaved changed
 * alert.
 */
function initMapForms()
{
    $('select[name="size_id"]').change(function (e) {
        if (this.value == 6) {
            $('.map-marker-circle-helper').hide();
            $('.map-marker-circle-radius').show();
        } else {
            $('.map-marker-circle-radius').hide();
            $('.map-marker-circle-helper').show();
        }
    });

    //console.info('mapsv3', 'initMapForms');
    let layerForm = $('#map-layer-form');
    let markerForm = $('#map-marker-form');
    let groupForm = $('#map-group-form');
    if ($('#entity-form').length === 0 && $('.map-marker-edit-form').length === 0) {
        //console.info('initMapForms empty');
        return;
    }

    layerForm.unbind('submit').on('submit', function() {
        window.entityFormHasUnsavedChanges = false;
    });
    markerForm.unbind('submit').on('submit', function() {
        window.entityFormHasUnsavedChanges = false;
    });
    groupForm.unbind('submit').on('submit', function() {
        window.entityFormHasUnsavedChanges = false;
    });

    initLegend();
}

function showSidebar()
{
    // On mobile use the modal instead of the sidebar
    if (window.kankaIsMobile.matches) {
        markerModalContent.find('.spinner').show();
        markerModalContent.find('.content').hide();
        markerModal.modal('toggle');
        return;
    }

    //window.map.invalidateSize();
    mapPageBody.removeClass('sidebar-collapse').addClass('sidebar-open');
    sidebarMap.hide();
    sidebarMarker.html('');
    sidebarMarker.parent().find('.spinner').show();
    invalidateMapOnSidebar();
}

function handleCloseMarker()
{
    $('.marker-close').click(function (ev) {
        sidebarMarker.hide();
        sidebarMap.show();
    });
}

function initLegend()
{
    $('.map-legend-marker').click(function (ev) {
        ev.preventDefault();
        window.map.panTo(L.latLng($(this).data('lat'), $(this).data('lng')));
        window[$(this).data('id')].openPopup();
    });

    $('a.sidebar-toggle').click(function () {
        invalidateMapOnSidebar();
        //console.log('wat');
    });
}
function invalidateMapOnSidebar() {
    setTimeout(() => {
        // Invalidate the map size when the sidebar is rendered/hidden
        window.map.invalidateSize();
    }, 500);
}
function initMapEntryClick() {
    $('.map-marker-entry-click').click(function (e) {
        e.preventDefault();
        $(this).parent().hide();
        $('.map-marker-entry-entry').show();
    });

}
