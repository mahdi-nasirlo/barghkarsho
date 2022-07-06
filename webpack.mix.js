const mix = require("laravel-mix");

mix.js("resources/js/app.js", "public/js")
    .postCss("./resources/css/home.css", "public/css")
    .js("./resources/js/home.js", "public/js")
    .postCss("resources/css/app.css", "public/css", [require("tailwindcss")])
    .version();
