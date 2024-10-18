import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/css/listagem.css",
                "resources/css/formulario.css",
                "resources/css/global.css",
                "resources/js/app.js",
            ],
            refresh: true,
        }),
    ],
});
