window.addEventListener("load", function () {
  if ("serviceWorker" in navigator) {
    navigator.serviceWorker
      .register("sw.js")
      .then((res) => console.log("SW register"))
      .catch((err) => console.error("SW No registrado", err));
  }
});

// const options = {
//   method: "GET",
//   headers: {
//     "X-RapidAPI-Host": "online-movie-database.p.rapidapi.com",
//     "X-RapidAPI-Key": "7f0d24d225mshaa26018bcd3e0dfp192af6jsn4943756234c3",
//   },
// };

// fetch(
//   "https://online-movie-database.p.rapidapi.com/auto-complete?q=game",
//   options
// )
//   .then((response) => response.json())
//   .then((data) => {
//     console.log(data);
//     const movieList = data.d;

//     movieList.map((item) => {
//       const title = item.l;
//       const img = item.i.imageUrl;
//       const id = item.id;
//       const button = `<button onclick="showDetails()" class="detail-a">Ver detalle</button>`;
//       const movie = `<div class='movies-container'><div class='movie'><img src="${img}"> <h2>${title}</h2> ${button}</div></div>`;
//       document.querySelector(".movies-section").innerHTML += movie;
//     });
//   })

//   .then((response) => console.log(response))

//   .catch((err) => console.error(err));

function showDetails(id, img, title) {
  location.href = "/detail.html";
}

function sendComment() {
  const input = document.getElementById("comment-input").value;
  const inputValue = input;
  const commentP = `<p>${inputValue}</p>`;
  document.querySelector(".show-comment-input").innerHTML += commentP;
  console.log(inputValue);
}

if (window.Notification && window.Notification.permission != 'denied') {
setTimeout(() => {
  Notification.requestPermission()
  .then(res => console.log(res))
}, 10000)
}
