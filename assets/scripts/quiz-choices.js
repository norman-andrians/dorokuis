import * as mchoice from "./lib/multiple-choice.js";

$(document).ready(() => {
    const addChoicesBtn = document.querySelectorAll(".opt-alp");

    for (let i = 0; i < addChoicesBtn.length; i++) {
        addChoicesBtn[i].children[0].addEventListener('click', () => {
            for (let b = 0; b < addChoicesBtn.length; b++) {
                if (i === b) {
                    addChoicesBtn[b].children[0].style.backgroundColor = "#209665";
                    $('#addanswer').val(mchoice.convertToAlpha(b));
                }
                else {
                    addChoicesBtn[b].children[0].style.backgroundColor = "#737976";
                }
            }
        });
    }
});