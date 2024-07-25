import { defineConfig } from 'vite'
import laravel, { refreshPaths } from 'laravel-vite-plugin'
import basicSsl from '@vitejs/plugin-basic-ssl'


export default defineConfig({
    plugins: [
        // basicSsl({
        //     /** name of certification */
        //     name: 'events.v4',
        //     /** custom trust domains */
        //     domains: ['events.v4'],
        //     /** custom certification directory */
        //     certDir: '/Users/pavelklimov/.config/ssl'
        // }),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: [
                ...refreshPaths,
                'app/Filament/**',
                'app/Forms/Components/**',
                'app/Livewire/**',
                'app/Infolists/Components/**',
                'app/Providers/Filament/**',
                'app/Tables/Columns/**',
            ],
        }),
    ],
})
