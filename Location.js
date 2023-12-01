let TrackMap = (lat, lon) => {
  // AJAX request

  var data = new FormData();
  data.append("req", "get");
  data.append("lat", lat);
  data.append("lon", lon);

  fetch("ajax_req.php", {
    method: "POST",
    body: data,
  })
    .then((res) => res.json())
    .then((data) => {
      var map = L.map("map");
      L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution:
          '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
      }).addTo(map);
      for (let r of data) {
        map.setView([r.a_lat, r.a_lon], 13);
        if (r.a_type == 2) {
          var customIcon = L.icon({
            iconUrl: "rescue.png",
            iconSize: [32, 32],
            iconAnchor: [16, 32],
            popupAnchor: [0, -32],
          });
        } else if (r.a_type == 3) {
          var customIcon = L.icon({
            iconUrl: "medical.png",
            iconSize: [32, 32],
            iconAnchor: [16, 32],
            popupAnchor: [0, -32],
          });
        }

        var marker = L.marker([r.a_lat, r.a_lon], {
          icon: customIcon,
        }).addTo(map);

        // Popup content
        var popupContent = `
<b>${r.a_name}</b><br>
<button onclick="alert(this)">Alert Message</button>  
<button onclick="call(this, '${r.a_moblie}', '${r.a_name}')">Call</button>
`;
        // Bind popup
        marker.bindPopup(popupContent);
      }
      L.marker([lat, lon]).addTo(map);
    })
    .catch((err) => console.error(err));
};

// Button click handlers

const alertMarker = (btn) => {
  var marker = btn.marker;
  console.log(marker);
};

const call = (btn, mobile, name) => {
  var marker = btn.marker;
  $.ajax({
    url: "ajax_call.php",
    method: "POST",
    data: {
      toNumber: mobile,
      name1: name,
    },
  });
};
