

function init(){
  $(".link-generate").on("click", function(e){
    generate()
  })
  $(".link-info").on("click", function(e){
    showSection("info")
  })

  // SHAKE EVENT
  var myShakeEvent = new Shake({
      threshold: 15, // optional shake strength threshold
      timeout: 1000 // optional, determines the frequency of event generation
  });
  myShakeEvent.start();
  window.addEventListener('shake', reactToShakeEvent, false);
}

//function to call when shake occurs
function reactToShakeEvent () {
  generate()
}

function showSection(section_id) {
  $("#app section").hide()
  $("#app section#"+section_id).show()

  $("body").attr("class","section-"+section_id)
}


function generate(){
  // count how many excuses i have
  var howManyExcuses = $("#app #excuses li").length
  var index = Math.floor(Math.random()*howManyExcuses)+1
  //alert("tra le "+howManyExcuses+" che ho, scelgo la "+index)
  window.location.href = "?index="+index
}


function renderExcuse(index) {
  //alert("excuse "+index)
  // show excuse
  showSection("result")
  $("#app #excuses li.excuse").hide()
  $("#app #excuse"+index).show()
}


function info() {
  showSection("info")
}
