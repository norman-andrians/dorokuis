import * as mchoice from "./lib/multiple-choice.js";

$(document).ready(() => {
    const addChoicesBtn = document.querySelectorAll(".opt-alp");

    if ($('#editanswer').length) {
        if ($('#editanswer').val().length > 0) {
            var index = mchoice.convertToIndex($('#editanswer').val());

            addChoicesBtn[index].children[0].style.backgroundColor = "#209665";
        }
    }
    
    for (let i = 0; i < addChoicesBtn.length; i++) {
        addChoicesBtn[i].children[0].addEventListener('click', () => {
            for (let b = 0; b < addChoicesBtn.length; b++) {
                if (i === b) {
                    addChoicesBtn[b].children[0].style.backgroundColor = "#209665";
                    $('#addanswer').val(mchoice.convertToAlpha(b));
                    
                    if ($('#editanswer').length) {
                        $('#editanswer').val(mchoice.convertToAlpha(b));
                    }
                }
                else {
                    addChoicesBtn[b].children[0].style.backgroundColor = "#737976";
                }
            }
        });
    }
});