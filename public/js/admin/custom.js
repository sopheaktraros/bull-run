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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/admin/custom.js":
/*!**************************************!*\
  !*** ./resources/js/admin/custom.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports) {

window.remove = function (url) {
  $.confirm({
    title: 'Are you sure ?',
    type: 'red',
    typeAnimated: true,
    buttons: {
      tryAgain: {
        text: 'Confirm',
        btnClass: 'btn-red',
        action: function action() {
          window.open(url, "_self");
        }
      },
      close: function close() {}
    }
  });
};

window.paid = function (url) {
  $.confirm({
    title: 'Are you sure ?',
    type: 'red',
    typeAnimated: true,
    buttons: {
      tryAgain: {
        text: 'Confirm',
        btnClass: 'btn-red',
        action: function action() {
          window.open(url, "_self");
        }
      },
      close: function close() {}
    }
  });
};

window.detail = function (url) {
  window.open(url, "_self");
};

window.cancel = function (url) {
  $.confirm({
    title: 'Are you sure ?',
    type: 'red',
    typeAnimated: true,
    buttons: {
      tryAgain: {
        text: 'Confirm',
        btnClass: 'btn-red',
        action: function action() {
          window.open(url, "_self");
        }
      },
      close: function close() {}
    }
  });
};

window.clear = function (url) {
  $.confirm({
    title: 'Are you sure ?',
    type: 'red',
    typeAnimated: true,
    buttons: {
      tryAgain: {
        text: 'Confirm',
        btnClass: 'btn-red',
        action: function action() {
          window.open(url, "_self");
        }
      },
      close: function close() {}
    }
  });
};

$('.number').keypress(function (event) {
  return isNumber(event, this);
});

function isNumber(evt, element) {
  var charCode = evt.which ? evt.which : event.keyCode;
  if ((charCode != 46 || $(element).val().indexOf('.') != -1) && ( // “.” CHECK DOT, AND ONLY ONE.
  charCode < 48 || charCode > 57)) return false;
  return true;
}

var n = 1;

window.checkValidation = function () {
  var isTrue = false;
  $('.wizard-content-active .required').each(function () {
    if ($(this).val() == "") {
      isTrue = false;
      return false;
    }

    isTrue = true;
  });
  return isTrue;
}; // function checkValidation(){
//     var isTrue = false;
//     $('.wizard-content-active .required').each(function() {
//         if($(this).val() == ""){
//             isTrue = false;
//             return false;
//         }
//         isTrue = true;
//     });
//     return isTrue;
// }


function checkValidationStep2() {
  var isTrue = false;
  var rowCount = $('#tblbody tr').length;

  if (rowCount <= 0) {
    isTrue = false;
    return false;
  }

  isTrue = true;
  return isTrue;
}

$("#nextStep").click(function () {
  var check = checkValidation();
  var step = $(this).attr('data-step');

  if (step == 2) {
    check = checkValidationStep2();
  }

  step = parseInt(step) + 1;

  if (check) {
    $("#previousStep").removeClass('hidden');
    $(this).attr('data-step', step);
    $(this).addClass('hidden');
    $("#save").removeClass('hidden');
    stepActive(step);
    n = step;
  } else {
    showErrorMsg('Please check the blank fields !');
  }
});
$("#previousStep").click(function () {
  n--;
  stepActive(n);
  $("#nextStep").attr('data-step', n);
  $("#nextStep").removeClass('hidden');
  $("#save").addClass('hidden');

  if (n == 1) {
    $(this).addClass('hidden');
  }
});

function stepActive(step) {
  $(".wizard-steps .wizard-step").removeClass('wizard-step-active');
  $(".wizard-steps .step-" + step).addClass('wizard-step-active');
  $(".wizard-contents .wizard-content").removeClass('wizard-content-active');
  $(".wizard-contents .step-" + step).addClass('wizard-content-active');
}

function showErrorMsg(title) {
  $.confirm({
    title: 'Encountered an error!',
    content: title,
    type: 'red',
    typeAnimated: true,
    buttons: {
      tryAgain: {
        text: 'Close',
        btnClass: 'btn-red'
      }
    }
  });
}

/***/ }),

/***/ 1:
/*!********************************************!*\
  !*** multi ./resources/js/admin/custom.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\bull-run\resources\js\admin\custom.js */"./resources/js/admin/custom.js");


/***/ })

/******/ });