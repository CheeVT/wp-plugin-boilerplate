(function(){function r(e,n,t){function o(i,f){if(!n[i]){if(!e[i]){var c="function"==typeof require&&require;if(!f&&c)return c(i,!0);if(u)return u(i,!0);var a=new Error("Cannot find module '"+i+"'");throw a.code="MODULE_NOT_FOUND",a}var p=n[i]={exports:{}};e[i][0].call(p.exports,function(r){var n=e[i][1][r];return o(n||r)},p,p.exports,r,e,n,t)}return n[i].exports}for(var u="function"==typeof require&&require,i=0;i<t.length;i++)o(t[i]);return o}return r})()({1:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;

//import $ from 'jquery';
var exampleAjax = function exampleAjax() {
  var data = {
    'message': 'Hello from ajax'
  };
  var ajaxData = {
    'action': 'example_func',
    //'nonce': cheevt_object.nonce,
    'data': data
  };
  jQuery.ajax({
    url: cheevt_object.ajax_url,
    type: 'POST',
    data: ajaxData,
    cache: false,
    success: function success(response, textStatus, jqXHR) {
      if (textStatus == 'success') {
        console.log('success', response);
      }
    },
    error: function error(jqXHR, textStatus, errorThrown) {
      console.log('error', jqXHR);
    }
  });
};

var _default = exampleAjax;
exports["default"] = _default;

},{}],2:[function(require,module,exports){
"use strict";

var _exampleAjax = _interopRequireDefault(require("./ajax/exampleAjax"));

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }

console.log('Hello World from plugin boilerplate');
(0, _exampleAjax["default"])();

},{"./ajax/exampleAjax":1}]},{},[2]);
