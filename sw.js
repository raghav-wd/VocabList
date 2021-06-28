const staticAssets = [
    './',
    './css/vocab.css'
];

self.addEventListener('install', async event => {
    const cache = await caches.open('vocab-static');
    cache.addAll(staticAssets);
});

self.addEventListener('fetch', event => {
    const req = event.request;
    event.respondWith(cacheFirst(req));
});

async function cacheFirst(req) {
    const cachedResponse = await caches.match(req);
    return cachedResponse || fetch(req);
}