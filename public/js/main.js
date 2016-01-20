$(document).ready(function(event){
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
  var index = Math.floor(Math.random()*howManyExcuses)+1
  alert("tra le "+howManyExcuses+" che ho, scelgo la "+index)
  window.location.href = "?index="+index
}


function renderExcuse(index) {
  alert("excuse "+index)
  // show excuse
  showSection("result")
  $("#app #excuses li.excuse").hide()
  $("#app #excuse"+index).show()
}


function share() {
  showSection("share")
}
