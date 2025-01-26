// script.js

document.addEventListener("DOMContentLoaded", function () {
    const tabLinks = document.querySelectorAll('.tab-link');

    //When a tab is clicked the function is executed, and constructs a URL with tabname
    tabLinks.forEach(function (link) {
        link.addEventListener('click', function () {
            const tabName = this.dataset.tab;
            window.location.href = '?tab=' + tabName;
        });
    });
});
