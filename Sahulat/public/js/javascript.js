
$(function(){
  $("#sidebartoggle").on("click", function(){

    if ($("#sidebar").is(":visible")){
      console.log("displayed");
      $("#pagedata").removeClass("col-10");
      $("#pagedata").removeClass("col-t-8");
      $("#pagedata").addClass("col-t-12");
      $("#pagedata").addClass("col-12");
      $("#sidebar").hide();
    }
    else{
      console.log("not displayed");
      $("#sidebar").show();
      if ($("#sidebar").is(":visible")){
        $("#pagedata").removeClass("col-t-12");
        $("#pagedata").removeClass("col-12");
        $("#pagedata").addClass("col-10");
        $("#pagedata").addClass("col-t-8");
      }
    }

  });
  $("#addeditservice").click(function(){
    $('#subaddeditservice').slideToggle();
  });
  $("#showservices").click(function(){
    $('#subshowservices').slideToggle();
  });
  //var maxheight = $("#sidebar").outerHeight() > $("#pagedata").outerHeight() ? $("#sidebar").outerHeight() : $("#pagedata").outerHeight();
  //console.log(maxheight);
  //$("#sidebar").css("height",maxheight+"px");
  //$("#pagedata").css("height",maxheight+"px");
});
