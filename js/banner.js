function loadBanner() {
  $.ajax({
    url: "https://neiru.org/api/getDataBanner/62cdbd975ad2070d655d3ae2",
    type: "GET",
    dataType: "json",
    success: function (data) {
      if (data.banner.length > 0) {
        var k = 1;
        data.banner.forEach(function (banner) {
          if (k == 1) {
            var content =
              '<div class="item active"><a href="' +
              banner.link +
              '" target="_blank"><img src="https://neiru.org/' +
              banner.image +
              '" class="img-carousel"></a></div>';
            var item =
              '<li data-target="#myCarousel" data-slide-to="' +
              k +
              '" class="active"></li>';
            k++;
          } else {
            var content =
              '<div class="item"><a href="' +
              banner.link +
              '" target="_blank"><img src="https://neiru.org/' +
              banner.image +
              '" class="img-carousel"></a></div>';
            var item =
              '<li data-target="#myCarousel" data-slide-to="' + k + '"></li>';
            k++;
          }
          $(".carousel-inner").append(content);
          $(".carousel-indicators").append(item);
          $("#banner").show();
        });
      }
    },

    error: function (data) {
      console.log(data);
    },
  });
}
