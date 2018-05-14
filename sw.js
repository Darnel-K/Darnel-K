var CACHE_NAME = "dev.darnel-k.uk";
var urlsToCache = [
    "/JS/jquery-3.3.1.min.js",
    "/JS/Main.js",
    "/JS/particles.min.js",
    "/Images/Logo - White Text.svg",
    "/Icons/android-icon-36x36.png",
    "/Icons/android-icon-48x48.png",
    "/Icons/android-icon-72x72.png",
    "/Icons/android-icon-96x96.png",
    "/Icons/android-icon-144x144.png",
    "/Icons/android-icon-192x192.png",
    "/Icons/apple-icon-57x57.png",
    "/Icons/apple-icon-60x60.png",
    "/Icons/apple-icon-72x72.png",
    "/Icons/apple-icon-76x76.png",
    "/Icons/apple-icon-114x114.png",
    "/Icons/apple-icon-120x120.png",
    "/Icons/apple-icon-144x144.png",
    "/Icons/apple-icon-152x152.png",
    "/Icons/apple-icon-180x180.png",
    "/Icons/apple-icon-precomposed.png",
    "/Icons/apple-icon.png",
    "/Icons/favicon-16x16.png",
    "/Icons/favicon-32x32.png",
    "/Icons/favicon-96x96.png",
    "/Icons/ms-icon-70x70.png",
    "/Icons/ms-icon-144x144.png",
    "/Icons/ms-icon-150x150.png",
    "/Icons/ms-icon-310x310.png",
    "/SASS/Main.min.css",
    "https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900|Open+Sans:300,400,600,700,800|Roboto:100,300,400,500,700,900&subset=latin-ext",
    "https://use.fontawesome.com/releases/v5.0.6/css/all.css",
    "/favicon.ico"
];

self.addEventListener("install", function(event) {
    // Perform install steps
    event.waitUntil(
        caches.open(CACHE_NAME).then(function(cache) {
            console.log("Opened cache");
            return cache.addAll(urlsToCache);
        })
    );
});

self.addEventListener("fetch", function(event) {
    event.respondWith(
        caches.match(event.request).then(function(response) {
            // Initial request
            // Cache hit - return response
            if (response) {
                // If in cache server from cache
                return response;
            }

            var fetchRequest = event.request.clone();

            return fetch(fetchRequest).then(function(response) {
                // Inital request when not in cache
                // Check if we received a valid response
                if (
                    !response ||
                    response.status !== 200 ||
                    response.type !== "basic"
                ) {
                    // Return errored Response
                    return response;
                }

                var responseToCache = response.clone();
                // Clone Response

                // Add to cache
                if (fetchRequest["method"] !== "POST") {
                    caches.open(CACHE_NAME).then(function(cache) {
                        cache.put(event.request, responseToCache);
                    });
                }
                return response;
            });
        })
    );
});
