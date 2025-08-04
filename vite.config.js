import jigsaw from "@tighten/jigsaw-vite-plugin";
import { defineConfig } from "vite";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        jigsaw({
            input: [
                "source/_assets/js/main.js",
                "source/_assets/js/prism.js",
                "source/_assets/css/main.css",
                "source/_assets/css/prism.css",
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
