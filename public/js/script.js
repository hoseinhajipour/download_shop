$(document).ready(function ($) {
    // Pause all videos when one starts playing
    $('video').on('play', function () {
        $('video').not(this).each(function () {
            this.pause();
        });
    });
});

