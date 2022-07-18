function loadPopup() {
  let ret = checkPopUp();
  if (ret === false) {
    $.ajax({
      url: "https://neiru.org/api/getPopup/62cdbd975ad2070d655d3ae2",
      type: "GET",
      dataType: "json",
      success: function (data) {
        if (!!data.popup) {
          let popup = data.popup;
          $("#popup-image").attr("src", "https://neiru.org/" + popup.image);
          if (popup.link !== null) {
            $("#popup-link").attr("href", popup.link).attr("target", "_blank");
          }
        }
      },
      error: function () {
        $("#popup-modal").remove();
      },
    });
  } else {
    $("#popup-modal").remove();
  }
}

function checkPopUp() {
  let name = "popup=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(";");
  for (let i = 0; i < ca.length; i++) {
    let c = ca[i].trim();
    if (c.indexOf(name) === 0) {
      return true;
    }
  }
  return false;
}
