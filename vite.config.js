import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import viteCompression from "vite-plugin-compression";


// export default defineConfig({
    
//     plugins: [
        
//         laravel({
//             input: ["resources/css/app.css", "resources/js/app.js"],
//             refresh: true,
//         }),
//         viteCompression({
//             algorithm: "gzip",
//             ext: ".gz",
//             threshold: 10240,
//             deleteOriginFile: false,
//         }),
//     ],
//     // build: {
//     //     minify: "esbuild", // سريع وكفء
//     //     sourcemap: false,
//     //     rollupOptions: {
//     //         output: {
//     //             manualChunks: undefined, // دمج كل JS
//     //         },
//     //     },
//     // },
// });
export default defineConfig({
    server: {
        https: false, // 👈 تفعيل https بدون شهادة مخصصة
        host: "localhost",
        port: 4000,
    },
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
    ],
});


