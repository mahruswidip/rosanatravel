self.addEventListener('install', (event) => {
    event.waitUntil(
        caches.open('pwa-cache-v1').then((cache) => {
            return cache.addAll([
                '/rosanatravel_1/admin/',
                '/rosanatravel_1/admin/manifest.json',
                '/rosanatravel_1/admin/assets/css/argon-dashboard.css',
                '/rosanatravel_1/admin/assets/js/argon-dashboard.js',
                "/rosanatravel_1/admin/assets/img/192.png",
                "/rosanatravel_1/admin/assets/img/512.png"
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