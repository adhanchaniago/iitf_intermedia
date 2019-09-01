$(document).ready(function() {
  $("#btn-mengerti").click(() => {
    console.log("diklik");
    $("#modal").removeClass("is-active");
  });
  // step color :)

  if (step === "0") {
    $("#step1").removeClass("step");
    $("#step1").addClass("step-success");
  } else if (step === "1") {
    $("#step1").removeClass("step");
    $("#step1").addClass("step-success");
    $("#step2").removeClass("step");
    $("#step2").addClass("step-success");
  } else if (step === "2") {
    $("#step1").removeClass("step");
    $("#step1").addClass("step-success");
    $("#step2").removeClass("step");
    $("#step2").addClass("step-success");
    $("#step3").removeClass("step");
    $("#step3").addClass("step-success");
  } else if (step === "3") {
    if(ket === "individu"){
      $("#step1").removeClass("step");
      $("#step1").addClass("step-success");
      $("#step2").removeClass("step");
      $("#step2").addClass("step-success");
      $("#step3").removeClass("step");
      $("#step3").addClass("step-success");
    }else{
      $("#step1").removeClass("step");
      $("#step1").addClass("step-success");
      $("#step2").removeClass("step");
      $("#step2").addClass("step-success");
      $("#step3").removeClass("step");
      $("#step3").addClass("step-success");
      $("#step4").removeClass("step");
      $("#step4").addClass("step-success");
    }
  } else if (step === "4") {
    $("#step1").removeClass("step");
    $("#step1").addClass("step-success");
    $("#step2").removeClass("step");
    $("#step2").addClass("step-success");
    $("#step3").removeClass("step");
    $("#step3").addClass("step-success");
    $("#step4").removeClass("step");
    $("#step4").addClass("step-success");
    $("#step5").removeClass("step");
    $("#step5").addClass("step-success");
  } else if(step === "5") {
    $("#step1").removeClass("step");
    $("#step1").addClass("step-success");
    $("#step2").removeClass("step");
    $("#step2").addClass("step-success");
    $("#step3").removeClass("step");
    $("#step3").addClass("step-success");
    $("#step4").removeClass("step");
    $("#step4").addClass("step-success");
    $("#step5").removeClass("step");
    $("#step5").addClass("step-success");
  }
});
