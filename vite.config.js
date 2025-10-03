import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '@': '/resources/js',
            '~bootstrap': '/node_modules/bootstrap',
        },
    },
    build: {
        manifest: true,
        outDir: 'public/build',
        rollupOptions: {
            output: {
                manualChunks: {
                    'vendor': ['alpinejs'],
                    'bootstrap': ['bootstrap'],
                    'charts': ['chart.js'],
                }
            }
        }
    },
    server: {
        hmr: {
            host: 'localhost',
        },
    },
});
