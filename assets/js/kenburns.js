jQuery(document).ready(function() {
    var getUrl = window.location;
    var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1] + "/" + getUrl.pathname.split('/')[2];
    jQuery('#home').vegas({
        slides: [{
            src:  baseUrl + "/wp-content/uploads/2021/06/01.jpg"
        }, {
            src: baseUrl + "/wp-content/uploads/2021/06/02.jpg"
        }, {
            src: baseUrl + "/wp-content/uploads/2021/06/03.jpg"
        }, {
            src: baseUrl + "/wp-content/uploads/2021/06/04.jpg"
        }],
        overlay: true,
        transition: 'fade',
        animation: 'kenburnsDown',
        transitionDuration: 2000,
        delay: 10000,
        animationDuration: 20000
    });
});