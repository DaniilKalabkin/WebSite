$(document).ready(function() {
    var button = $(".dannye");
    var knigi = $(".Knigi");
    var Knigi_chit =$(".Knigi_chit");
    knigi.hide();
    Knigi_chit.hide();
    $(".securiti").click( function(){ 
        button.show();
        knigi.hide();
        Knigi_chit.hide();
    });
    $(".Book").click( function(){ 
        button.hide();
        knigi.show();
        Knigi_chit.hide();
    });
    $(".Book_chet").click( function(){ 
        button.hide();
        knigi.hide();
        Knigi_chit.show();
    });
  });