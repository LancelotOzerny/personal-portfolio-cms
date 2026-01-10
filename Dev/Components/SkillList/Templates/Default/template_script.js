document.addEventListener('DOMContentLoaded', setSkillProgresses);

function setSkillProgresses()
{
    let skillList = document.getElementsByClassName('skill-progress');

    for (let i = 0; i < skillList.length; ++i)
    {
        let skillHandler = skillList[i].querySelector('.skill-progress__handler');
        let skillFiller = skillList[i].querySelector('.skill-progress__fill');
        let skillProgress = skillHandler.textContent;

        skillFiller.style.width = skillProgress;
        skillHandler.style.left = `calc(${skillProgress} - ${skillHandler.offsetWidth / 2}px)`;
    }
}