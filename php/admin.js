var track = {
  // (A) INIT
  rider_id: rider_id,
  delay: 10000, // delay between location refresh
  timer: null, // interval timer
  hWrap: null, // html <div> wrapper
  init: () => {
    track.hMap = document.getElementById("wrapper");
    track.show();
    track.timer = setInterval(track.show, track.delay);
  },

  // (B) GET DATA FROM SERVER AND UPDATE MAP
  show: () => {
    // (B1) DATA
    var data = new FormData();
    data.append("req", "get");

    // (B2) AJAX FETCH
    fetch("ajax_track.php", { method: "POST", body: data })
      .then((res) => res.json())
      .catch((err) => track.error(err));
  },

  // (C) HELPER - ERROR HANDLER
  error: (err) => {
    console.error(err);
    alert("An error has occured, open the developer's console.");
    clearInterval(track.timer);
  },
};
window.onload = track.init;
