function loadLastHearing() {
  $.ajax({
    url: "https://neiru.org/api/project/62cdbd975ad2070d655d3ae2/last-hearing",
    type: "GET",
    dataType: "json",
    success: function (data) {
      if (data["type"] === "hearing") {
        let lastDate = new Date(data["content"]["date-hearing"]);
        let year = new Intl.DateTimeFormat("pt-br", { year: "numeric" }).format(
          lastDate,
        );
        let month = new Intl.DateTimeFormat("pt-br", {
          month: "2-digit",
        }).format(lastDate);
        let day = new Intl.DateTimeFormat("pt-br", { day: "2-digit" }).format(
          lastDate,
        );
        let hours =
          lastDate.getHours() < 10
            ? `0${lastDate.getHours()}`
            : lastDate.getHours();
        let minutes =
          lastDate.getMinutes() < 10
            ? `0${lastDate.getMinutes()}`
            : lastDate.getMinutes();
        lastDate = `${day}/${month}/${year}`;

        let today = new Date();
        year = new Intl.DateTimeFormat("pt-br", { year: "numeric" }).format(
          today,
        );
        month = new Intl.DateTimeFormat("pt-br", { month: "2-digit" }).format(
          today,
        );
        day = new Intl.DateTimeFormat("pt-br", { day: "2-digit" }).format(
          today,
        );
        today = `${day}/${month}/${year}`;

        begin = "";
        if (lastDate == today) {
          begin = `Hoje`;
        } else {
          begin = `${lastDate}`;
        }

        let textHearing = `${begin} às ${hours}:${minutes} Audiência Pública sobre ${data["content"]["subject"]} Participe!`;
        $("#hearing").show();
        $("#hearing div h3").html(textHearing);
        if (data["content"]["link"] != null || data["content"]["link"] != "") {
          if (begin == "Hoje") {
            $("#hearing div").append(`
                            <div class='row'>
                                <button onclick="window.open('${data["content"]["link"]}')" class='btn btn-hearing-today' target='_blank'>Participar!</button>
                            </div>
                        `);
          } else {
            $("#hearing div").append(`
                            <div class='row'>
                                <button onclick="window.open('${data["content"]["link"]}')" class='btn btn-hearing' target='_blank'>Participar!</button>
                            </div>
                        `);
          }
        }
      } else if (data["type"] === "message" && data["content"] !== null) {
        $("#hearing").show();
        $("#hearing div h3").html(data["content"]["subject"]);
        if (
          data["content"]["link"] !== null &&
          data["content"]["link"] !== ""
        ) {
          $("#hearing div").append(`
                        <div class='row'>
                            <button onclick="window.open('${data["content"]["link"]}')" class='btn btn-hearing' target='_blank'>Participar!</button>
                        </div>
                    `);
        }
      }
      // else{
      //     $('#hearing').show();
      // }
    },
    error: function (data) {
      console.log(data);
    },
  });
}
