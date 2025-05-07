import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import viteCompression from "vite-plugin-compression";

export default defineConfig({
    server: {
        https: false,
        host: "localhost",
        port: 4000,
    },
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
        viteCompression({
            algorithm: 'gzip',
            ext: '.gz',
            filter: /\.(js|mjs|json|css|html)$/i,
            threshold: 1024,
            compressionOptions: {
                level: 9,
            },
            deleteOriginFile: false
        })
    ],
    build: {
        minify: 'esbuild',
        sourcemap: false,
        rollupOptions: {
            output: {
                manualChunks: undefined,
                compact: true
            }
        },
        chunkSizeWarningLimit: 1000
    }
});


