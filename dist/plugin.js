(function(){function r(e,n,t){function o(i,f){if(!n[i]){if(!e[i]){var c="function"==typeof require&&require;if(!f&&c)return c(i,!0);if(u)return u(i,!0);var a=new Error("Cannot find module '"+i+"'");throw a.code="MODULE_NOT_FOUND",a}var p=n[i]={exports:{}};e[i][0].call(p.exports,function(r){var n=e[i][1][r];return o(n||r)},p,p.exports,r,e,n,t)}return n[i].exports}for(var u="function"==typeof require&&require,i=0;i<t.length;i++)o(t[i]);return o}return r})()({1:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;

function _createForOfIteratorHelper(o, allowArrayLike) { var it = typeof Symbol !== "undefined" && o[Symbol.iterator] || o["@@iterator"]; if (!it) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) { o = it; } var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) { return { done: true }; } return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = it.call(o); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it["return"] != null) { it["return"](); } } finally { if (didErr) { throw err; } } } }; }

function _unsupportedIterableToArray(o, minLen) { if (!o) { return; } if (typeof o === "string") { return _arrayLikeToArray(o, minLen); } var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) { n = o.constructor.name; } if (n === "Map" || n === "Set") { return Array.from(o); } if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) { return _arrayLikeToArray(o, minLen); } }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) { len = arr.length; } for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

var form = document.getElementById('contact-form');
var sendBtn = form.querySelector('button');
var msgDiv = form.querySelector('.contact-form__msg');

var contactFormAjax = function contactFormAjax() {
  sendBtn.addEventListener('click', function () {
    sendBtn.innerText = 'Sending...';
    var ajaxData = {
      'action': 'contact_form',
      'nonce': cheevt_object.nonce,
      'data': getFormValues()
    };
    jQuery.ajax({
      url: cheevt_object.ajax_url,
      type: 'POST',
      data: ajaxData,
      cache: false,
      success: function success(response, textStatus, jqXHR) {
        if (textStatus == 'success') {
          console.log('success', response);
          sendBtn.innerText = 'Send';
          msgDiv.classList.remove('contact-form__msg--hidden');
          setTimeout(function () {
            msgDiv.classList.add('contact-form__msg--hidden');
          }, 3000);
          msgDiv.innerHTML = "<p>".concat(response.message, "</p>");
          form.reset();
        }
      },
      error: function error(jqXHR, textStatus, errorThrown) {
        sendBtn.innerText = 'Send';
        msgDiv.classList.remove('contact-form__msg--hidden');
        setTimeout(function () {
          msgDiv.classList.add('contact-form__msg--hidden');
        }, 3000);
        msgDiv.innerHTML = "<p>".concat(jqXHR.responseJSON.message, "</p>");
        console.log('error', jqXHR);
      }
    });
  });
};

var getFormValues = function getFormValues() {
  var formData = new FormData(form);
  var data = {};

  var _iterator = _createForOfIteratorHelper(formData.entries()),
      _step;

  try {
    for (_iterator.s(); !(_step = _iterator.n()).done;) {
      var pair = _step.value;
      data[pair[0]] = pair[1];
    }
  } catch (err) {
    _iterator.e(err);
  } finally {
    _iterator.f();
  }

  return data;
};

var _default = contactFormAjax;
exports["default"] = _default;

},{}],2:[function(require,module,exports){
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
    'nonce': cheevt_object.nonce,
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

},{}],3:[function(require,module,exports){
"use strict";

var _exampleAjax = _interopRequireDefault(require("./ajax/exampleAjax"));

var _contactFormAjax = _interopRequireDefault(require("./ajax/contactFormAjax"));

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }

console.log('Hello World from plugin boilerplate');
(0, _exampleAjax["default"])();
(0, _contactFormAjax["default"])();

},{"./ajax/contactFormAjax":1,"./ajax/exampleAjax":2}]},{},[3]);
