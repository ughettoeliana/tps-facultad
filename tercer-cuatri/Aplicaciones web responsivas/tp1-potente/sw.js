const cacheName = 'Peliz.com';

const assets = ['/',
                '/index.html',
                '/js/main.js',
                '/styles.css'
                ];

self.addEventListener('install', event => {
    self.skipWaiting();
    event.waitUntil(
        caches
            .open(cacheName)
            .then(cache => {
                cache.addAll(assets);
            })
    )
})

self.addEventListener('fetch', event => {
    event.respondWith(
        caches
            .match(event.request)
            .then(res => {
                if (res) {
                    return res;
                }
                let requestToCache = event.request.clone();
                return fetch(requestToCache)
                .then(res => {
                    if (!res || res.status !== 200) {
                        return res;
                    }
                    let responseToCache = res.clone();
                    caches
                    .open(cacheName)
                    .then(cache => {
                        cache.put(requestToCache, responseToCache)
                    })
                    return res;
                })
            })
    )
})