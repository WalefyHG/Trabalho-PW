function toggleDD(myDropMenu) {
    document.getElementById(myDropMenu).classList.toggle("invisible");
}

function highlightMenuItem(menuItem) {
    var menuItems = document.querySelectorAll(".menu-item");
    menuItems.forEach(function (item) {
        item.classList.remove("border-b-2", "border-blue-600");
    });

    menuItem.classList.add("border-b-2", "border-blue-600");
}

function toggleTaskModal() {
    var taskModal = document.getElementById("taskModal");
    var teacherModal = document.getElementById("teacherModal");
    var dashboard = document.getElementById("dashboardModal");
    var salaModal = document.getElementById("salaModal");
    var controlsalaModal = document.getElementById("controlsalaModal");
    if (!taskModal.classList.contains("invisible")) {
        taskModal.classList.add("invisible");
        var menuItems = document.querySelectorAll(".menu-item");
        menuItems.forEach(function (item) {
            item.classList.remove("border-b-2", "border-blue-600");
        });
    } else {
        taskModal.classList.toggle("invisible");
    }

    dashboard.classList.add("invisible");
    teacherModal.classList.add("invisible");
    salaModal.classList.add("invisible");
    controlsalaModal.classList.add("invisible");
}

function toggleDashboardModal() {
    var taskModal = document.getElementById("taskModal");
    var teacherModal = document.getElementById("teacherModal");
    var dashboard = document.getElementById("dashboardModal");
    var salaModal = document.getElementById("salaModal");
    var controlsalaModal = document.getElementById("controlsalaModal");

    if (!dashboard.classList.contains("invisible")) {
        dashboard.classList.add("invisible");
        var menuItems = document.querySelectorAll(".menu-item");
        menuItems.forEach(function (item) {
            item.classList.remove("border-b-2", "border-blue-600");
        });
    } else {
        dashboard.classList.toggle("invisible");
    }

    teacherModal.classList.add("invisible");

    taskModal.classList.add("invisible");

    salaModal.classList.add("invisible");

    controlsalaModal.classList.add("invisible");
}

function toggleControlSalaModal() {
    var controlsalaModal = document.getElementById("controlsalaModal");
    var taskModal = document.getElementById("taskModal");
    var teacherModal = document.getElementById("teacherModal");
    var dashboard = document.getElementById("dashboardModal");
    var salaModal = document.getElementById("salaModal");

    if (!controlsalaModal.classList.contains("invisible")) {
        controlsalaModal.classList.add("invisible");
        var menuItems = document.querySelectorAll(".menu-item");
        menuItems.forEach(function (item) {
            item.classList.remove("border-b-2", "border-blue-600");
        });
    } else {
        controlsalaModal.classList.toggle("invisible");
    }

    teacherModal.classList.add("invisible");
    taskModal.classList.add("invisible");
    dashboard.classList.add("invisible");
    salaModal.classList.add("invisible");
}

function toggleSalaModal() {
    var salaModal = document.getElementById("salaModal");
    var taskModal = document.getElementById("taskModal");
    var teacherModal = document.getElementById("teacherModal");
    var dashboard = document.getElementById("dashboardModal");
    var controlsalaModal = document.getElementById("controlsalaModal");

    if (!salaModal.classList.contains("invisible")) {
        salaModal.classList.add("invisible");
        var menuItems = document.querySelectorAll(".menu-item");
        menuItems.forEach(function (item) {
            item.classList.remove("border-b-2", "border-blue-600");
        });
    } else {
        salaModal.classList.toggle("invisible");
    }

    teacherModal.classList.add("invisible");

    taskModal.classList.add("invisible");

    dashboard.classList.add("invisible");

    controlsalaModal.classList.add("invisible");
}

window.onclick = function (event) {
    var modal = document.getElementById("taskModal");
    if (modal && event.target == modal) {
        modal.classList.add("invisible");
    }
};

function toggleTeacherModal() {
    var taskModal = document.getElementById("taskModal");
    var teacherModal = document.getElementById("teacherModal");
    var dashboard = document.getElementById("dashboardModal");
    var salaModal = document.getElementById("salaModal");
    var controlsalaModal = document.getElementById("controlsalaModal");

    if (!teacherModal.classList.contains("invisible")) {
        teacherModal.classList.add("invisible");
        var menuItems = document.querySelectorAll(".menu-item");
        menuItems.forEach(function (item) {
            item.classList.remove("border-b-2", "border-blue-600");
        });
    } else {
        teacherModal.classList.toggle("invisible");
    }

    taskModal.classList.add("invisible");
    dashboard.classList.add("invisible");
    salaModal.classList.add("invisible");
    controlsalaModal.classList.add("invisible");
}

window.onclick = function (event) {
    var modal = document.getElementById("teacherModal");
    if (modal && event.target == modal) {
        modal.classList.add("invisible");
    }
};

function filterDD(myDropMenu, myDropMenuSearch) {
    var input, filter, ul, li, a, i;
    input = document.getElementById(myDropMenuSearch);
    filter = input.value.toUpperCase();
    div = document.getElementById(myDropMenu);
    a = div.getElementsByTagName("a");
    for (i = 0; i < a.length; i++) {
        if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
            a[i].style.display = "";
        } else {
            a[i].style.display = "none";
        }
    }
}

function closeModal(modalId) {
    var modal = document.getElementById(modalId);
    modal.classList.add("hidden");
}

function openModal(id) {
    var modal = document.getElementById("editarProfessorModal" + id);
    modal.classList.remove("hidden");
    window.addEventListener("click", function (event) {
        if (event.target === modal) {
            modal.classList.add("hidden");
        }
    });
}

function openAlunoModal(id) {
    var modal = document.getElementById("editarAlunoModal" + id);
    modal.classList.remove("hidden");

    window.addEventListener("click", function (event) {
        if (event.target === modal) {
            modal.classList.add("hidden");
        }
    });
}

function openSalaModal(id) {
    var modal = document.getElementById("editarSalaModal" + id);
    modal.classList.remove("hidden");

    window.addEventListener("click", function (event) {
        if (event.target === modal) {
            modal.classList.add("hidden");
        }
    });
}

document.addEventListener("DOMContentLoaded", function () {
    var alertElement = document.getElementById("alert");
    alertElement.classList.remove("hidden");

    setTimeout(function () {
        alertElement.classList.add("hidden");
    }, 3000);
});

window.onclick = function (event) {
    if (
        !event.target.matches(".drop-button") &&
        !event.target.matches(".drop-search")
    ) {
        var dropdowns = document.getElementsByClassName("dropdownlist");
        for (var i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (!openDropdown.classList.contains("invisible")) {
                ("opdown.class.addible");
            }
        }
    }
};
