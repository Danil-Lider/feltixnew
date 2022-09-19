/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/js/script.js":
/*!**************************!*\
  !*** ./src/js/script.js ***!
  \**************************/
/***/ (() => {

var mediaQuery = window.matchMedia('(max-width: 992px)');
var bars = document.querySelector('.bars'),
    navOverlay = document.querySelector('.nav-overlay'),
    menu = document.querySelector('.header-nav');

function resizeNav() {
  // Set the circle radius to the length of the window diagonal,
  // this way we're only making the circle as big as it needs to be.
  var radius = Math.sqrt(Math.pow(window.innerHeight, 2) + Math.pow(window.innerWidth, 2));
  var diameter = radius * 2;
  navOverlay.style.width = diameter + 'px';
  navOverlay.style.height = diameter + 'px';
  navOverlay.style.marginTop = -radius + 'px';
  navOverlay.style.marginLeft = -radius + 'px';
}

if (mediaQuery.matches) {
  // Set the nav height to fill the window
  document.querySelector('.header-nav').style.height = window.innerHeight + 'px';
} else {
  document.querySelector('.header-nav').style.height = 'unset';
} // Set up click and window resize callbacks, then init the nav.


bars.addEventListener('click', function () {
  this.classList.toggle('open');
  navOverlay.classList.toggle('open');
  menu.classList.toggle('open');
  document.querySelector('body').classList.toggle('openMenu');
  document.querySelectorAll('li.header__menu-item').forEach(function (item) {
    return item.classList.toggle('show');
  });
});
resizeNav();
/* offerslider */

var offerSlider = document.querySelector('.offer');

if (offerSlider) {
  var showNumberOfSlider = document.querySelector('.offer-slider__num');
  showNumberOfSlider.innerHTML = '01';
  var slider = new Swiper('.offer-slider', {
    // autoplay: {
    //     delay: 5000,
    // },
    loop: true,
    paginationClickable: true,
    grabCursor: true,
    effect: "creative",
    creativeEffect: {
      prev: {
        shadow: true,
        translate: ["-20%", 0, -1]
      },
      next: {
        translate: ["100%", 0, 0]
      }
    },
    slidesPerView: 1,
    pagination: {
      el: ".offer-pagination",
      clickable: true
    }
  });
  slider.on('slideChange', function () {
    slider.realIndex < 10 ? showNumberOfSlider.innerHTML = "0".concat(slider.realIndex + 1) : slider.realIndex + 1;
  });
}
/* singleslider */


var singleSlider = document.querySelector('.single-project');

if (singleSlider) {
  var _showNumberOfSlider = document.querySelector('.single-project__slider-num');

  _showNumberOfSlider.innerHTML = '01';

  var _slider = new Swiper('.single-project__slider', {
    autoplay: {
      delay: 5000
    },
    //loop: true,
    centered: true,
    breakpoints: {
      320: {
        slidesPerView: 1,
        spaceBetween: 50
      },
      1400: {
        slidesPerView: 1.2,
        spaceBetween: 100
      }
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev"
    }
  });

  _slider.on('slideChange', function () {
    _slider.realIndex < 10 ? _showNumberOfSlider.innerHTML = "0".concat(_slider.realIndex + 1) : _slider.realIndex + 1;
  });
} //scroll to section


var solutionSection = document.querySelector('.about'),
    mouse = document.querySelector('.offer-arrow');

function handleButtonClick() {
  solutionSection.scrollIntoView({
    block: "start",
    behavior: "smooth"
  });
}

if (mouse) mouse.addEventListener('click', handleButtonClick); //products-main tabs

var imageblocks = document.querySelectorAll('.products-main__wrap-images_item'),
    listItems = document.querySelectorAll('.products-main__wrap-list ul li');
if (listItems) tabsCreationMouseOver(listItems, imageblocks); // tabs function on mouseover

function tabsCreationMouseOver(firstList, secondList) {
  firstList.forEach(function (item) {
    item.addEventListener('mouseover', function () {
      firstList.forEach(function (item) {
        return item.classList.remove('active');
      });
      this.classList.add('active');
      var numb = Array.prototype.indexOf.call(firstList, item);
      secondList.forEach(function (item, index) {
        var allChildren = item.children;

        for (var i = 0; i < allChildren.length; i++) {
          allChildren[i].classList.remove('active');
        }

        item.classList.remove('active');

        if (numb == index) {
          item.classList.add('active');

          for (var _i = 0; _i < allChildren.length; _i++) {
            allChildren[_i].classList.add('active');
          }
        }
      });
    });
  });
} //products-page tabs


var btns = document.querySelectorAll('.products__btn'),
    productsTabs = document.querySelectorAll('.products-tabs'),
    btnsWrap = document.querySelector('.products-btns'),
    productsMobileBtn = document.querySelector('.products-wrap__mobileBtn');

if (mediaQuery.matches) {
  btns.forEach(function (item) {
    return item.classList.remove('active');
  });

  if (productsMobileBtn) {
    productsMobileBtn.addEventListener('click', function () {
      btnsWrap.classList.add('active');
      btns.forEach(function (item) {
        item.addEventListener('click', function () {
          btns.forEach(function (item) {
            return item.classList.remove('active');
          });
          this.classList.toggle('active');
          this.parentElement.classList.remove('active');
          productsMobileBtn.innerHTML = this.innerHTML;
          var numb = Array.prototype.indexOf.call(btns, item);
          productsTabs.forEach(function (item, index) {
            item.classList.remove('active');
            if (numb == index) item.classList.add('active');
          });
        });
      });
    });
  }
} else {
  if (productsTabs) tabsCreationClick(btns, productsTabs);
} // tabs function on click


function tabsCreationClick(firstList, secondList) {
  firstList.forEach(function (item) {
    item.addEventListener('click', function () {
      firstList.forEach(function (item) {
        return item.classList.remove('active');
      });
      this.classList.add('active');
      var numb = Array.prototype.indexOf.call(firstList, item);
      secondList.forEach(function (item, index) {
        item.classList.remove('active');
        if (numb == index) item.classList.add('active');
      });
    });
  });
} //accord creation function


function accordCreate(accord) {
  accord.forEach(function (item) {
    item.addEventListener('click', function () {
      this.classList.toggle('active');
      this.nextElementSibling.classList.toggle('active');
    });
  });
} //faq accordion function


var faqTitle = document.querySelectorAll('.faq-accord__title');

if (faqTitle) {
  accordCreate(faqTitle);
} //gallery on single product


lightGallery(document.getElementById('lightgallery')); //showing additional photo in gallery on single product page

var galleryItems = document.querySelectorAll('.single-product-gallery__wrap  a'),
    galleryBtn = document.querySelector('.single-product__showMore');
galleryItems.forEach(function (item, index) {
  return index >= 6 ? item.classList.add('additional') : false;
}); // adding class for additionals items

document.querySelectorAll('a.additional').forEach(function (item) {
  return item.classList.add('invisible');
}); //making additional items invisible
//click helper for showing or dissapearing additional photos

if (galleryBtn) {
  galleryBtn.addEventListener('click', function () {
    var _this = this;

    galleryItems.forEach(function (item) {
      if (item.classList.contains('invisible')) {
        item.classList.remove('invisible');
        _this.innerHTML = 'Скрыть';
      } else {
        item.classList.add('invisible');
        _this.innerHTML = 'Показать больше';
      }
    });
  });
} //single product accordion


var singleInfo = document.querySelectorAll('.single-product-info__title');

if (singleInfo) {
  accordCreate(singleInfo);
} //animation


var sections = document.querySelectorAll('*.animated'),
    productCards = document.querySelectorAll('*.products-card');

function offset(el) {
  var rect = el.getBoundingClientRect(),
      scrollLeft = window.scrollX || document.documentElement.scrollLeft,
      scrollTop = window.scrollY || document.documentElement.scrollTop;
  return {
    top: rect.top + scrollTop,
    left: rect.left + scrollLeft
  };
}

if (sections.length > 0) {
  var animationOnScroll = function animationOnScroll() {
    for (var i = 0; i < sections.length; i++) {
      var animatedItem = sections[i],
          animatedItemHeight = animatedItem.offsetHeight,
          animatedItemOffset = offset(animatedItem).top,
          animatedStart = 15;
      var animatedItemPoint = window.innerHeight - animatedItemHeight / animatedStart;

      if (animatedItemHeight > window.innerHeight) {
        animatedItemPoint = window.innerHeight - window.innerHeight / animatedStart;
      }

      if (scrollY > animatedItemOffset - animatedItemPoint && scrollY < animatedItemOffset + animatedItemHeight) {
        animatedItem.classList.add('active');
      }
    }
  };

  window.addEventListener('scroll', animationOnScroll);
}

if (productCards.length > 0) {
  var _animationOnScroll = function _animationOnScroll() {
    for (var i = 0; i < productCards.length; i++) {
      var animatedItem = productCards[i],
          animatedItemHeight = animatedItem.offsetHeight,
          animatedItemOffset = offset(animatedItem).top,
          animatedStart = 99;
      var animatedItemPoint = window.innerHeight - animatedItemHeight / animatedStart;

      if (animatedItemHeight > window.innerHeight) {
        animatedItemPoint = window.innerHeight - window.innerHeight / animatedStart;
      }

      if (scrollY > animatedItemOffset - animatedItemPoint && scrollY < animatedItemOffset + animatedItemHeight) {
        animatedItem.classList.add('active');
      }
    }
  };

  window.addEventListener('scroll', _animationOnScroll);
}

/***/ }),

/***/ "./src/scss/app.scss":
/*!***************************!*\
  !*** ./src/scss/app.scss ***!
  \***************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/script": 0,
/******/ 			"css/app": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunklaravel_mix"] = self["webpackChunklaravel_mix"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./src/js/script.js")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./src/scss/app.scss")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;