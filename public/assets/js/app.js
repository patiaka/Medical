"use strict";

/* ===== Enable Bootstrap Popover (on element  ====== */

var popoverTriggerList = [].slice.call(
    document.querySelectorAll('[data-toggle="popover"]')
);
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl);
});

/* ==== Enable Bootstrap Alert ====== */
var alertList = document.querySelectorAll(".alert");
alertList.forEach(function (alert) {
    new bootstrap.Alert(alert);
});

/* ===== Responsive Sidepanel ====== */
const sidePanelToggler = document.getElementById("sidepanel-toggler");
const sidePanel = document.getElementById("app-sidepanel");
const sidePanelDrop = document.getElementById("sidepanel-drop");
const sidePanelClose = document.getElementById("sidepanel-close");

window.addEventListener("load", function () {
    responsiveSidePanel();
});

window.addEventListener("resize", function () {
    responsiveSidePanel();
});

function responsiveSidePanel() {
    let w = window.innerWidth;
    if (w >= 1200) {
        // if larger
        //console.log('larger');
        sidePanel.classList.remove("sidepanel-hidden");
        sidePanel.classList.add("sidepanel-visible");
    } else {
        // if smaller
        //console.log('smaller');
        sidePanel.classList.remove("sidepanel-visible");
        sidePanel.classList.add("sidepanel-hidden");
    }
}

sidePanelToggler.addEventListener("click", () => {
    if (sidePanel.classList.contains("sidepanel-visible")) {
        console.log("visible");
        sidePanel.classList.remove("sidepanel-visible");
        sidePanel.classList.add("sidepanel-hidden");
    } else {
        console.log("hidden");
        sidePanel.classList.remove("sidepanel-hidden");
        sidePanel.classList.add("sidepanel-visible");
    }
});

sidePanelClose.addEventListener("click", (e) => {
    e.preventDefault();
    sidePanelToggler.click();
});

sidePanelDrop.addEventListener("click", (e) => {
    sidePanelToggler.click();
});

/* ====== Mobile search ======= */
const searchMobileTrigger = document.querySelector(".search-mobile-trigger");
const searchBox = document.querySelector(".app-search-box");

searchMobileTrigger.addEventListener("click", () => {
    searchBox.classList.toggle("is-visible");

    let searchMobileTriggerIcon = document.querySelector(
        ".search-mobile-trigger-icon"
    );

    if (searchMobileTriggerIcon.classList.contains("fa-search")) {
        searchMobileTriggerIcon.classList.remove("fa-search");
        searchMobileTriggerIcon.classList.add("fa-times");
    } else {
        searchMobileTriggerIcon.classList.remove("fa-times");
        searchMobileTriggerIcon.classList.add("fa-search");
    }
});

function deleteConfirmation(url) {
    swal.fire({
        title: "Delete?",
        icon: "question",
        text: "Would you want to delete this",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, Delete!",
        confirmButtonColor: "red",
        cancelButtonText: "No, Cancel!",
        reverseButtons: true,
    }).then(
        function (e) {
            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");
                $.ajax({
                    type: "DELETE",
                    url: url,
                    data: { _token: CSRF_TOKEN },
                    dataType: "JSON",
                    success: function (results) {
                        if (results.success === true) {
                            swal.fire("Done!", results.message, "success");
                            // refresh page after 2 seco nds
                            setTimeout(function () {
                                location.reload();
                            }, 2000);
                        } else {
                            swal.fire("Error!", results.message, "error");
                        }
                    },
                });
            } else {
                e.dismiss;
            }
        },
        function (dismiss) {
            return false;
        }
    );
}

// boostrap validation js function
(() => {
    "use strict";

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll(".needs-validation");

    // Loop over them and prevent submission
    Array.from(forms).forEach((form) => {
        form.addEventListener(
            "submit",
            (event) => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add("was-validated");
            },
            false
        );
    });
})();
