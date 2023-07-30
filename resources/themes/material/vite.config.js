import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import path from "path";



export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/themes/material/sass/app.scss",
                "resources/themes/material/sass/_button.scss",
                "resources/themes/material/sass/_scrollbar.scss",
                "resources/themes/material/sass/_webkit-grid.scss",
                "resources/themes/material/sass/font-awesome.scss",
                "resources/themes/material/sass/index.scss",
                "resources/themes/material/sass/profile.scss",
                "resources/themes/material/sass/registration.scss",
                "resources/themes/material/sass/settings.scss",
                "resources/themes/material/js/app.js"
            ],
            buildDirectory: "build",
        }),


        {
            name: "blade",
            handleHotUpdate({ file, server }) {
                if (file.endsWith(".blade.php")) {
                    server.ws.send({
                        type: "full-reload",
                        path: "*",
                    });
                }
            },
        },
    ],
    resolve: {
        alias: {
            '@': '/resources/themes/material/js',

        }
    },

});
