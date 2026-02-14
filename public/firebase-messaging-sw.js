importScripts(
    "https://www.gstatic.com/firebasejs/10.0.0/firebase-app-compat.js"
);
importScripts(
    "https://www.gstatic.com/firebasejs/10.0.0/firebase-messaging-compat.js"
);

firebase.initializeApp({
    apiKey: "AIzaSyDGxJEpFBHtnpCZE2Hw9eHQ9Edpc9S4Xn8",
    authDomain: "notification-ce4c5.firebaseapp.com",
    projectId: "notification-ce4c5",
    storageBucket: "notification-ce4c5.appspot.com",
    messagingSenderId: "346720125375",
    appId: "1:346720125375:web:cc4774ec949fb2f2ace10a",
});

const messaging = firebase.messaging();

messaging.onBackgroundMessage(messaging, ({ notification }) => {
    console.log("[firebase-messaging-sw.js] Received background message ", notification);

    const notificationTitle = notification.title;
    const notificationOptions = {
        body: notification.body,
    };

    self.registration.showNotification(notificationTitle, notificationOptions);
});
