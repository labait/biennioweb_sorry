$(document).ready(function(event){
  init()

  showSection("home")
  $("#link-generate").on("click", function(e){
    generate()
  })
  $("#link-share").on("click", function(e){
    share()
  })
})


function init(){
  //alert("init")
}

function showSection(section_id) {
  $("#app section").hide()
  $("#app section#"+section_id).show()
}


function generate(){
  // count how many excuses i have
  var howManyExcuses = $("#app #excuses li").length
  var choose = Math.floor(Math.random()*howManyExcuses)+1
  alert("tra le "+howManyExcuses+" che ho, scelgo la"+choose)
  // show excuse
  showSection("result")
  $("#app #excuses li.excuse").hide()
  $("#app #excuse"+choose).show()
}


function share() {
  showSection("share")
}
