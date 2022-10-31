const navmenus = document.querySelectorAll(".row-nav-btn");
const menucontents = document.querySelectorAll(".dtab-menu-content");

$(document).ready(() => {
    for (let i = 0; i < navmenus.length; i++) {
        navmenus[i].children[0].addEventListener('click', () => {
            if (i >= navmenus.length - 1) {
                window.location.href = "../index.php?logout=true";
            }
            for (let b = 0; b < navmenus.length; b++) {
                if (b == i) {
                    navmenus[i].children[0].style.backgroundColor = "rgb(237, 243, 240)";
                    navmenus[i].children[0].style.color = "rgb(32, 150, 101)";
                    navmenus[i].children[0].style.borderWidth = "0 4px 0 0";

                    menucontents[i].style.display = "block";
                }
                else {
                    navmenus[b].children[0].style.backgroundColor = "white";
                    navmenus[b].children[0].style.color = "grey";
                    navmenus[b].children[0].style.borderWidth = "0";

                    menucontents[b].style.display = "none";
                }
            }
        });
    }

    $('.btn-create').click(() => { window.location.href = "../creator/make-new.php" });
});