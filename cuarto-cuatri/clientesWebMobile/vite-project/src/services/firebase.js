import { initializeApp } from "firebase/app";
import { getFirestore } from "firebase/firestore"
import { getAuth } from "firebase/auth"

const firebaseConfig = {
  apiKey: "AIzaSyAF5RgfX7CI_J9ba_aBG8Z2-NzoayOilgQ",
  authDomain: "cwm-2023-2-noche-v-40075.firebaseapp.com",
  projectId: "cwm-2023-2-noche-v-40075",
  storageBucket: "cwm-2023-2-noche-v-40075.appspot.com",
  messagingSenderId: "709358307418",
  appId: "1:709358307418:web:d41bea937c1fe188073063"
};

// Initialize Firebase
export const app = initializeApp(firebaseConfig);
export const db = getFirestore(app);
export const auth = getAuth(app);
