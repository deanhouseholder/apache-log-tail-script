var b = document.body;
var autoScrollActive = true;
autoScroll();

function autoScroll() {
    if (autoScrollActive) {
        b.scrollTop = b.scrollHeight; // Scroll to bottom
        autoScrollActive = true;
    }
    setTimeout(autoScroll, 1000);
}

window.onscroll = function (e) {
    if (b.scrollTop + b.clientHeight == b.scrollHeight) {
        autoScrollActive = true;
    } else {
        autoScrollActive = false;
    }
}
