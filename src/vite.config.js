import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path'                      // 追加

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss', //これを追加
                'resources/js/app.js',       // 'resources/sass/app.scss',を左記に変更
            ],
            refresh: true,
        }),
    ],
	resolve: {                               // 追加ここから
		alias: {
			'~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
		}
	},                                       // 追加ここまで
});

