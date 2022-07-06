/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/home.js ***!
  \******************************/
// prepare comment modal to send
var commentModalBtn = document.getElementsByClassName("commentModalBtn");

function prepareCommentsForSend(e) {
  var modalHead = document.getElementById("commentModal-title");
  var parent_id = document.getElementById("parent_id");

  if (modalHead) {
    modalHead.innerHTML = "<span>" + ' پاسخ به "' + e.target.getAttribute("replay_name") + '"</span>';
    parent_id.value = e.target.getAttribute("parent_id");
  }
}

for (var i = 0; i < commentModalBtn.length; i++) {
  commentModalBtn[i].addEventListener("click", prepareCommentsForSend);
} // prepare comment modal to send


document.addEventListener("DOMContentLoaded", function () {
  // make it as accordion for smaller screens
  if (window.innerWidth < 992) {
    // close all inner dropdowns when parent is closed
    document.querySelectorAll(".navbar .dropdown").forEach(function (everydropdown) {
      everydropdown.addEventListener("hidden.bs.dropdown", function () {
        // after dropdown is hidden, then find all submenus
        this.querySelectorAll(".submenu").forEach(function (everysubmenu) {
          // hide every submenu as well
          everysubmenu.style.display = "none";
        });
      });
    });
    document.querySelectorAll(".dropdown-menu a").forEach(function (element) {
      element.addEventListener("click", function (e) {
        var nextEl = this.nextElementSibling;

        if (nextEl && nextEl.classList.contains("submenu")) {
          // prevent opening link if link needs to open dropdown
          e.preventDefault();

          if (nextEl.style.display == "block") {
            nextEl.style.display = "none";
          } else {
            nextEl.style.display = "block";
          }
        }
      });
    });
  } // end if innerWidth


  var send_comment = function send_comment() {
    document.getElementById("comment_form").submit();
  };

  if (document.getElementById("send_replay_comments")) {
    document.getElementById("send_replay_comments").addEventListener("click", send_comment);
  }
}); // DOMContentLoaded  end
/******/ })()
;