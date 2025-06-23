import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
<<<<<<< HEAD
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/js/delete-confirm.js'],
=======
            input: ["resources/css/app.css", "resources/js/app.js"],
>>>>>>> 5260114762614247690f54a1210fd6ca68acf199
            refresh: true,
        }),
    ],
});
