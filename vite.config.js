import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: [ 'resources/assets/sass/app.scss', 'resources/assets/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
