import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js','resources/js/table-of-contents.js','resources/js/tw-dark-mode.js','resources/js/additional-post-script.js'],
            refresh: true,
        }),
    ],
});
