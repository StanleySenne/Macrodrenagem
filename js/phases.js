async function loadPhases() {
  var step = location.search.slice(1);
  var title;

  await $.ajax({
    url: "https://neiru.org/api/project/62cdbd975ad2070d655d3ae2/steps",
    type: "GET",
    dataType: "json",
    success: function (data) {
      $.each(data, function (i, v) {
        if (v.slug === "fase-1") title = "Fase 1: Planejamento";
        else if (v.slug === "fase-2") title = "Fase 2: Execução";
        else if (v.slug === "fase-3") title = "Fase 3: Consolidação";

        if (v.slug == step) {
          $(".nav-tabs").append(`
                        <li class='tab-item active'>
                            <a class="item-a-tab" href='#${v.slug}' role='tab' data-toggle='tab' slug='${v.slug}'>
                                <p class="item-a-tab" slug='${v.slug}'>${title}</p>
                            </a>
                        </li>
                    `);

          $(".tab-content").append(`
                        <div id='${v.slug}'>
                            <p class="fase-title">${title}</p>
                            <p class='description-text'>${v.description}</p>
                        </div>
                    `);
        } else {
          $(".nav-tabs").append(`
                        <li class="tab-item">
                            <a class="item-a-tab" href='#${v.slug}' role='tab' data-toggle='tab' slug='${v.slug}'>
                                <p slug='${v.slug}'>${title}</p>
                            </a>
                        </li>
                    `);

          $(".tab-content").append(`
                        <div id='${v.slug}'>
                        <p class="fase-title">${title}</p>
                            <p class='description-text'>${v.description}</p>
                        </div>
                    `);
        }
      });
    },
    error: function (data) {
      console.log(data);
    },
  });
}
