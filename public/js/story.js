!function(e){var t={};function n(r){if(t[r])return t[r].exports;var o=t[r]={i:r,l:!1,exports:{}};return e[r].call(o.exports,o,o.exports,n),o.l=!0,o.exports}n.m=e,n.c=t,n.d=function(e,t,r){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(n.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var o in e)n.d(r,o,function(t){return e[t]}.bind(null,o));return r},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="/",n(n.s=10)}({10:function(e,t,n){e.exports=n("q8+Z")},"q8+Z":function(e,t){$(document).ready((function(){$(".element-live-reorder").sortable(),$(".fa-arrow-up").click((function(e){var t=$(this).closest("div.element"),n=t.prev("div.element");return 0!==n.length&&t.insertBefore(n),!1})),$(".fa-arrow-down").click((function(e){var t=$(this).closest("div.element"),n=t.next("div.element");return 0!==n.length&&t.insertAfter(n),!1})),function(){var e=$(".focus-image");if(0===e.length)return;e.on("click",(function(e){var t=$(this),n=e.pageX-t.offset().left,r=e.pageY-t.offset().top;$(".focus").css("top",r-22).css("left",n-22).show(),$('input[name="focus_x"]').val(parseInt(n)),$('input[name="focus_y"]').val(parseInt(r))})),$(".focus").click((function(e){$(".focus").hide(),$('input[name="focus_x"]').val(),$('input[name="focus_y"]').val()}))}()}))}});