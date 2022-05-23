$(document).ready(function() {
    var list = $(".knigi__inner .kniga");
    var numToShow = 6; //сколько показывать элементов
    var button = $("button");
    var numInList = list.length;
    list.hide();
    if (numInList < numToShow) {
      button.hide();
    }
    list.slice(0, numToShow).show();
    button.click(function() {
      var showing = list.filter(':visible').length;
      list.slice(showing - 1, showing + numToShow).fadeIn();
      var nowShowing = list.filter(':visible').length;
      if (nowShowing >= numInList) {
        button.hide();
      }
    });
  });