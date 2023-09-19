var track = {
  rider: 1,
  delay: 10000,
  timer: null,
  hDate: null,
  hLat: null,
  hLng: null,
  init: () => {
    track.hDate = document.getElementById("date");
    track.hLat = document.getElementById("lat");
    track.hLng = document.getElementById("lng");

    track.update();
    track.timer = setInterval(track.update, track.delay);
  },

  update: () =>
    navigator.geolocation.getCurrentPosition(
      (pos) => {
        var data = new FormData();
        data.append("req", "update");
        data.append("id", track.rider);
        data.append("lat", pos.coords.latitude);
        data.append("lng", pos.coords.longitude);
        MapFunc(pos.coords.latitude, pos.coords.longitude);
        fetch("ajax_track.php", { method: "POST", body: data })
          .then((res) => res.text())
          .then((txt) => {
            if (txt == "OK") {
              let now = new Date();
              track.hDate.innerHTML = now.toString();
              track.hLat.innerHTML = pos.coords.latitude;
              track.hLng.innerHTML = pos.coords.longitude;
            } else {
              track.error(txt);
            }
          })
          .catch((err) => track.error(err));
      },
      (err) => track.error(err)
    ),

  error: (err) => {
    console.error(err);
    alert("An error has occured, open the developer's console.");
    clearInterval(track.timer);
  },
};

window.onload = track.init;
