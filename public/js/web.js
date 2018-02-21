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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(1);
__webpack_require__(2);
__webpack_require__(3);
module.exports = __webpack_require__(4);


/***/ }),
/* 1 */
/***/ (function(module, exports) {

//////////////////////////////
// 						    //
//        PLUGINS           //
//                          //
//////////////////////////////

new WOW().init();

//////////////////////////////
// 					        //
//        NAVIGATION        //
//                          //
//////////////////////////////

$(document).ready(function () {

	var section = $('#ActualSection').data('section');
	var logo = $('.navbar .navbar-brand');
	var navbar = $('.navbar-default');

	function nav_logic() {

		switch (section) {

			//////// HOME /////////
			case "home":
				// $('body').css('padding-top','0');
				logo.css('opacity', '0');
				// $('.navbar .navbar-right').css('border-bottom', '1px solid white');
				navbar.addClass('home-nav');

				$(window).scroll(function () {
					var scrollPos = $(window).scrollTop();

					if (scrollPos > 250) {
						navbar.addClass('change-nav');
						logo.css('opacity', '100');
					} else {
						navbar.removeClass('change-nav');
						logo.css('opacity', '0');
					}
				});

				break;

			//////// PORTFOLIO /////////
			case "portfolio":

				navbar = $('.navbar-default');
				navbar.addClass('nav-portfolio');
				$('body').css('background-color', '#f9f9f9');
				$(window).scroll(function () {
					var scrollPos = $(window).scrollTop();

					if (scrollPos > 250) {
						navbar.addClass('change-nav');
					} else {
						navbar.removeClass('change-nav');
					}
				});

				break;

			//////// GENERIC /////////
			default:
				$(window).scroll(function () {

					var scrollPos = $(window).scrollTop(),
					    navbar = $('.navbar-default');

					if (scrollPos > 250) {
						navbar.addClass('change-nav');
					} else {
						navbar.removeClass('change-nav');
					}
				});
		}
	}
	// ----------- End Navigation Script ------------ //

	//Activate nav effects in desktop
	if (screen.width > 775) {
		nav_logic();
	} else {}
}); // Document Ready

/***/ }),
/* 2 */
/***/ (function(module, exports) {

throw new Error("Module build failed: ModuleBuildError: Module build failed: \n@import _WebElements\r\n^\n      File to import not found or unreadable: _WebElements.\nParent style sheet: /home/javzero/Documentos/Incubator/studiovimana/resources/assets/sass/web/web.sass\n      in /home/javzero/Documentos/Incubator/studiovimana/resources/assets/sass/web/web.sass (line 2, column 1)\n    at runLoaders (/home/javzero/Documentos/Incubator/studiovimana/node_modules/webpack/lib/NormalModule.js:195:19)\n    at /home/javzero/Documentos/Incubator/studiovimana/node_modules/loader-runner/lib/LoaderRunner.js:364:11\n    at /home/javzero/Documentos/Incubator/studiovimana/node_modules/loader-runner/lib/LoaderRunner.js:230:18\n    at context.callback (/home/javzero/Documentos/Incubator/studiovimana/node_modules/loader-runner/lib/LoaderRunner.js:111:13)\n    at Object.asyncSassJobQueue.push [as callback] (/home/javzero/Documentos/Incubator/studiovimana/node_modules/sass-loader/lib/loader.js:55:13)\n    at Object.<anonymous> (/home/javzero/Documentos/Incubator/studiovimana/node_modules/async/dist/async.js:2257:31)\n    at Object.callback (/home/javzero/Documentos/Incubator/studiovimana/node_modules/async/dist/async.js:958:16)\n    at options.error (/home/javzero/Documentos/Incubator/studiovimana/node_modules/node-sass/lib/index.js:294:32)");

/***/ }),
/* 3 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 4 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ })
/******/ ]);