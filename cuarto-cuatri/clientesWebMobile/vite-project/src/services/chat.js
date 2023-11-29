// Funciones que sirven para interactuar con el chat.
import { db } from './firebase.js';
import { addDoc, collection, onSnapshot, serverTimestamp, query, orderBy } from "firebase/firestore";

const refChat = collection(db, 'chats');
const q = query(refChat, orderBy('created_at'));

export function chatSaveMessage(data) {
  return addDoc(refChat, {
    ...data,
    created_at: serverTimestamp()
  });
}

export function chatSubscribeToMessages(callback) {


  onSnapshot(q, snapshot => {

    const data = snapshot.docs.map(doc => {
      return {
        id: doc.id,
        user: doc.data().user,
        message: doc.data().message,
        created_at: doc.data().created_at.toDate(),
      };
    });

    callback(data);
  });
}