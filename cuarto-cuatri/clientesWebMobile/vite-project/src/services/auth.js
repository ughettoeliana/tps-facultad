import { signInWithEmailAndPassword, signOut } from "firebase/auth";
import { auth } from "./firebase.js";
import { def } from "@vue/shared";

let userData = {
  id: null,
  email: null,
}

let observers = [];

/**
 * 
 * @param {{ emial: string, password: string}} user
 * @return {Promise}
 */

export function login({ email, password }) {
  return signInWithEmailAndPassword(auth, email, password)
    .then(userCredentials => {
    setUserData({
      id: userCredentials.user.uid,
      email: userCredentials.user.email,
    })
      return {...userData};
    })

    .catch(error => {
      return {
        code: error.code,
        message: error.message,
      }
    })
}

/**
 * 
 * @returns {Promise}
 */
 
export function logout(){
  const promise = signOut(auth);
  clearUserData();
  return promise;
}


/**
 * 
 * @param {({id: null|string, email: null|string}) => void} observer 
 * @returns {() => void} Funcion para canselar la suscripcion del observer
 */

export function subscribeToAuth(observer) {
  observers.push(observer);
  notify(observer);

  return () => {
    observers = observers.filter(obs => obs !== observer);
  }
}


function notifyAll() {
  observers.forEach(observer => notify(observer));
}


/**
* 
* @param {({id: null|string, email: null|string}) => void} observer 
*/
function notify(observer) {
  observer({ ...userData })
}

function setUserData(newData){
  userData = {
    ...userData,
    ...newData,
  }
  notifyAll();
}

function clearUserData(){
  setUserData({
    id: null,
    email: null,
  })
}