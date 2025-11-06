import laravel from 'laravel-vite-plugin';
import { defineConfig } from 'vite';

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
        // Generate manifest at public/build/manifest.json to match Laravel's default lookup
        manifest: 'manifest.json',
        outDir: 'public/build',
        rollupOptions: {
            output: {
                manualChunks: {
                    'vendor': ['alpinejs'],
                    'bootstrap': ['bootstrap']
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
