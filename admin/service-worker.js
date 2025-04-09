self.addEventListener('install', (event) => {
    event.waitUntil(
        caches.open('pwa-cache-v1').then((cache) => {
            return cache.addAll([
                '/admin/',
                '/admin/manifest.json',
                '/admin/assets/css/argon-dashboard.css',
                '/admin/assets/js/argon-dashboard.js',
                '/admin/assets/img/192.png',
                '/admin/assets/img/512.png'
            ]);
        })
    );
});

self.addEventListener('fetch', (event) => {
    event.respondWith(
        caches.match(event.request).then((response) => {
            return response || fetch(event.request);
        })
    );
});