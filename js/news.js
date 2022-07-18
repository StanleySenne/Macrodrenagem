function loadNews() {
  $.ajax({
    url: "https://neiru.org/api/getDataNews/62cdbd975ad2070d655d3ae2",
    type: "GET",
    dataType: "json",
    success: function (data) {
      if (data.news.length > 0) {
        let principalCount = 1;
        data.news.forEach(function (news) {
          let tagsClasses = [];
          if (!!news.tags && news.tags.length > 0) {
            news.tags.forEach(function (tag) {
              tagsClasses.push(tag);
            });
          }
          let colClass = "col-sm-6";
          if (principalCount > 2) {
            colClass = "col-sm-4";
          }
          principalCount++;
          let html =
            '<div class="' +
            news.step +
            '">' +
            '<div class="news-tags ' +
            colClass +
            " " +
            tagsClasses.join(" ") +
            '">' +
            '<div class="margin-bottom-10 news-container">' +
            '<a href="./news.php?news=' +
            news.slug +
            '" class="news-link"><img src="https://neiru.org/' +
            news.image +
            '" alt="" class="img news-image">' +
            // '<p class="p-white news-date-formatted">' + news.created_at_formatted + '</p>' +
            '<h4 class="news-title">' +
            news.title +
            "</h4>" +
            '<p class="p-white news-short-description">' +
            news.short_description +
            "</p>" +
            "</a>" +
            '<a href="./news.php?news=' +
            news.slug +
            '" class="see-more-link news-link" onclick="eventClick(this)" data-name="news-' +
            news.slug +
            '" onclick="">Ver mais &rsaquo;</a>' +
            "</div>" +
            "</div>";
          ("</div>");
          $("#news").append(html);
        });
      }
    },
    error: function (data) {
      console.log(data);
    },
  });
}

function loadContent() {
  $.ajax({
    url: "https://neiru.org/api/getDataNews/62cdbd975ad2070d655d3ae2",
    type: "GET",
    dataType: "json",
    success: function (data) {
      if (!!data && !!data.news && data.news.length > 0) {
        data.news.forEach(function (news) {
          let urlParams = new URLSearchParams(window.location.search);
          let myParam = urlParams.get("news");
          if (news.slug === myParam) {
            $(".news-image").attr("src", "https://neiru.org/" + news.image);
            $(".news-title").text(news.title);
            $(".news-created-formatted").text(news.created_at_formatted);
            $(".news-content").html(news.content);
          }
        });
      }
    },
  });
}
