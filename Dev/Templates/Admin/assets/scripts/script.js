"use strict";
document.addEventListener('DOMContentLoaded', () => {
    setSidebarItemsActivate();
    setSkillProgresses();
});
function setSidebarItemsActivate() {
    let sidebarItemsList = document.querySelectorAll('.sidebar-list__item');
    sidebarItemsList.forEach((item) => {
        item.addEventListener('click', () => {
            document.querySelectorAll('.sidebar-list__item.active')
                .forEach((activeElement) => activeElement.classList.remove('active'));
            item.classList.add('active');
        });
    });
}
function setSkillProgresses() {
    let skillList = document.getElementsByClassName('skill-progress');
    for (let i = 0; i < skillList.length; ++i) {
        let skillHandler = skillList[i].querySelector('.skill-progress__handler');
        let skillFiller = skillList[i].querySelector('.skill-progress__fill');
        if (skillHandler && skillFiller) {
            let skillProgress = skillHandler.textContent;
            skillFiller.style.width = skillProgress !== null && skillProgress !== void 0 ? skillProgress : '';
            skillHandler.style.left = `calc(${skillProgress !== null && skillProgress !== void 0 ? skillProgress : ''} - ${skillHandler.offsetWidth / 2}px)`;
        }
    }
}
