"use strict";
document.addEventListener('DOMContentLoaded', () => {
    var _a;
    let navHtml = document.querySelector('.Main-navigation');
    (_a = navHtml === null || navHtml === void 0 ? void 0 : navHtml.querySelector('.Main-navigation__toggler')) === null || _a === void 0 ? void 0 : _a.addEventListener('click', () => {
        navHtml === null || navHtml === void 0 ? void 0 : navHtml.classList.toggle('showed');
    });
});
