/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 9);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/attributes.js":
/*!*******************************************!*\
  !*** ./resources/assets/js/attributes.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * When adding a new attribute, we give it a negative id to avoid issues with checkboxes losing information
 * @type {number}
 */
var attribute_id_count = -1000;
$(document).ready(function () {
  if ($('#add_attribute_target').length > 0) {
    initAttributeUI();
  }
});
/**
 * Initiate on click handles for attribute interface
 */

function initAttributeUI() {
  var target = $('#add_attribute_target');
  var targetNew = $('#add_unsortable_attribute_target');
  initAttributeHandlers();
  $('#attribute_add').on('click', function (e) {
    e.preventDefault();
    attribute_id_count -= 1;
    var body = $('#attribute_template').clone().removeClass('hidden').removeAttr('id');
    var html = body.html().replace(/\$TMP_ID\$/g, attribute_id_count);
    body.html(html).insertBefore(target);
    initAttributeHandlers();
    return false;
  });
  $('#block_add').click(function (e) {
    e.preventDefault();
    attribute_id_count -= 1;
    var body = $('#block_template').clone().removeClass('hidden').removeAttr('id');
    var html = body.html().replace(/\$TMP_ID\$/g, attribute_id_count);
    body.html(html).insertBefore(target);
    initAttributeHandlers();
    return false;
  });
  $('#text_add').click(function (e) {
    e.preventDefault();
    attribute_id_count -= 1;
    var body = $('#text_template').clone().removeClass('hidden').removeAttr('id');
    var html = body.html().replace(/\$TMP_ID\$/g, attribute_id_count);
    body.html(html).insertBefore(target);
    initAttributeHandlers();
    return false;
  });
  $('#checkbox_add').click(function (e) {
    e.preventDefault();
    attribute_id_count -= 1;
    var body = $('#checkbox_template').clone().removeClass('hidden').removeAttr('id');
    var html = body.html().replace(/\$TMP_ID\$/g, attribute_id_count);
    body.html(html).insertBefore(target);
    initAttributeHandlers();
    return false;
  });
  $('#section_add').click(function (e) {
    e.preventDefault();
    attribute_id_count -= 1;
    var body = $('#section_template').clone().removeClass('hidden').removeAttr('id');
    var html = body.html().replace(/\$TMP_ID\$/g, attribute_id_count);
    body.html(html).insertBefore(target);
    initAttributeHandlers();
    return false;
  });
  $('#entity_add').click(function (e) {
    e.preventDefault();
    attribute_id_count -= 1;
    var body = $('#entity_template').clone().removeClass('hidden').removeAttr('id');
    var html = body.html().replace(/\$TMP_ID\$/g, attribute_id_count);
    body.html(html).insertBefore(target);
    initAttributeHandlers();
    return false;
  }); // Delete all visible attributes

  $('#attributes-delete-all-confirm-submit').click(function (e) {
    e.preventDefault();
    $('#entity-attributes-all .attribute_delete').click();
    $('#attributes-delete-all-confirm').modal('hide');
    return false;
  });
  $.each($('[data-toggle="private"]'), function () {
    // Add the title first
    if ($(this).hasClass('fa-lock')) {
      $(this).prop('title', $(this).data('private'));
    } else {
      $(this).prop('title', $(this).data('public'));
    }
  });
}
/**
 * This function rebinds the delete on all buttons
 */


function initAttributeHandlers() {
  $('.entity-attributes').sortable({});
  $.each($('.attribute_delete'), function () {
    $(this).unbind('click');
    $(this).on('click', function () {
      $(this).parent().parent().parent().remove();
    });
  });
  $('[data-toggle="private"]').unbind('click').click(function () {
    if ($(this).hasClass('fa-lock')) {
      // Unlock
      $(this).removeClass('fa-lock').addClass('fa-unlock-alt').prop('title', $(this).data('public'));
      $(this).parent().find('input:hidden').val("0");
    } else {
      // Lock
      $(this).removeClass('fa-unlock-alt').addClass('fa-lock').prop('title', $(this).data('private'));
      $(this).parent().find('input:hidden').val("1");
    }
  });
  $('[data-toggle="star"]').unbind('click').click(function () {
    if ($(this).hasClass('far')) {
      // Unlock
      $(this).removeClass('far').addClass('fas').prop('title', $(this).data('entry'));
      $(this).parent().find('input:hidden').val("1");
    } else {
      // Lock
      $(this).removeClass('fas').addClass('far').prop('title', $(this).data('tab'));
      $(this).parent().find('input:hidden').val("0");
    }
  }); //window.initSelect2();
}

/***/ }),

/***/ 9:
/*!**********************************************!*\
  !*** multi ./resources/assets/js/attributes ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\Payne\Php\kanka\resources\assets\js\attributes */"./resources/assets/js/attributes.js");


/***/ })

/******/ });