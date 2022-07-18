async function loadSteps() {
  var countSteps = 0;
  var cont = 1;

  await $.ajax({
    url: "https://neiru.org/api/getDataProject/62cdbd975ad2070d655d3ae2",
    type: "GET",
    dataType: "json",
    success: function (data) {
      if (data.steps.length > 0) {
        data.steps.forEach(function (step) {
          var $div_step = $(
            '<div data-order="' +
              cont +
              '" class="step-etapa ' +
              step.slug +
              '">',
          );
          cont++;
          $div_step.load("./inserts/step.html", function () {
            if (!!step.files && step.files.length > 0) {
              var files = $("<div>");
              step.files.forEach(function (file) {
                var $div_doc = $("<div>");
                $div_doc.load("./inserts/doc.html", function () {
                  $(this).find(".doc-name").text(file.name);
                  var idcollapse;
                  if (file.file_group !== "") {
                    idcollapse = file.file_group;
                  } else {
                    idcollapse = myTrim(file.name);
                  }
                  var divDocs = $("#" + idcollapse);
                  if (divDocs.length > 0) {
                    var version = getSlugInfo(file.tags[0]);
                    var itemPath =
                      '<div><i class="glyphicon glyphicon-circle-arrow-down icon-download"></i>' +
                      '<a target="_blank" href="https://neiru.org' +
                      file.path +
                      '" class="doc-path"' +
                      'data-name="download-' +
                      file.slug +
                      '" onclick="eventClick(this)"> ' +
                      file.name +
                      " - " +
                      version +
                      "</a></div>";
                    divDocs.append(itemPath);
                  } else {
                    var version = getSlugInfo(file.tags[0]);
                    $(this)
                      .find(".collapse-div")
                      .attr("data-target", "#" + idcollapse);
                    var tooltip = $(this).find(".tooltip-data");
                    tooltip.attr(
                      "title",
                      !!file.description
                        ? file.description
                        : getFileTypeDescription(file.tags[0]),
                    );
                    $(this).find(".collapse-items");
                    var itemPath =
                      '<div><i class="glyphicon glyphicon-circle-arrow-down icon-download oficial-docs-icon"></i>' +
                      '<a target="_blank" href="https://neiru.org' +
                      file.path +
                      '" class="doc-path"\n' +
                      'data-name="download-' +
                      file.slug +
                      '" onclick="eventClick(this)"> ' +
                      file.name +
                      " - " +
                      version +
                      "</a></div>";
                    var docpath = $(this).find(".collapse-items");
                    docpath.append(itemPath);
                    docpath.attr("id", idcollapse);
                    var divdoc = $(this);
                    if (!!file.tags) {
                      file.tags.forEach(function (tag) {
                        $(divdoc).addClass(tag);
                      });
                    }
                    files.append($(this));
                  }
                });
              });
              $(this).find(".docs").html(files);
            }
            $("#documents").append($(this));
            countSteps++;
            if (countSteps === data.steps.length) {
              checkUrlParams();
            }
          });
        });
      }
    },
    error: function (data) {
      console.log(data);
    },
  });
}

function myTrim(val) {
  return val.replace(/( )+/g, "");
}

function getSlugInfo(slug) {
  switch (slug) {
    case "versao-previa":
      return "Versão Prévia.";
    case "versao-justificada":
      return "Versão Justificada.";
    case "versao-oficial":
      return "Versão Oficial.";
    default:
      return "";
  }
}

function getFileTypeDescription(tag) {
  switch (tag) {
    case "versao-previa":
      return "Versão Prévia: É a primeira versão, publicada 15 dias antes da Audiência Pública, de forma a permitir tempo hábil para análise e apreciação da sociedade.";
    case "versao-justificada":
      return "Versão Justificada: É a segunda versão, publicada em 10 dias após a realização da Audiência Pública, destacando as contribuições realizada pela população e agentes técnicos.";
    case "versao-oficial":
      return "Versão Oficial: É a terceira e última versão, publicada em 10 dias após a realização da Audiência Pública, contendo as alterações em caráter oficial e definitivo, sendo a versão entregue à Prefeitura Municipal";
    default:
      return "";
  }
}

function checkUrlParams() {
  let urlParams = new URLSearchParams(window.location.search);
  let urlParam = urlParams.get("step");

  if (urlParam != null) {
    let params = urlParam.split("_");

    for (let i = 0; i < params.length; i++) {
      let myParam = params[i];
      if (!!myParam && myParam !== "") {
        $("#" + myParam).prop("checked", true);
        filter("#documents");
      }
    }
  }
}
function sortSteps() {
  var divList = $(".step-etapa");
  divList.sort(function (a, b) {
    return $(a).attr("data-order") - $(b).attr("data-order");
  });
  $("#documents").html(divList);
  setTimeout(sortSteps, 3000);
}
