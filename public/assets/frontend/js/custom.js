$(document).ready(function(){
    // Show the first search_block by default and hide others
    $(".search_block").hide();
    $(".search_block").first().show();

    // Add active class to the first list item by default
    $('.search_items li').first().addClass('active');

    $('.search_items li').click(function(){
        var inputValue = $(this).attr("data-tab");
        var targetBox = $("#" + inputValue);

        // Remove active class from all li and add to the clicked one
        $('.search_items li').removeClass('active');
        $(this).addClass('active');

        // Hide other search_blocks and show the selected one
        $(".search_block").hide();
        $(targetBox).show();
    });

    var testimonial = new Swiper(".testimonial", {
      slidesPerView: 2,
      spaceBetween: 36,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
});

let currentStep = 0;
const steps = document.querySelectorAll(".step");
const headers = document.querySelectorAll(".step_header");
//const stepCount = document.getElementById("currentStep");
//const totalSteps = document.getElementById("totalSteps");
const form = document.getElementById("wizardForm");

//totalSteps.textContent = steps.length;

function showStep(index) {
    steps.forEach((step, i) => {
      step.classList.toggle("active", i === index);
    });
  
    headers.forEach((header, i) => {
      header.classList.remove("active", "completed");
      if (i < index) {
        header.classList.add("completed"); // mark as done
      } else if (i === index) {
        header.classList.add("active"); // mark current
      }
    });
  
    //stepCount.textContent = index + 1;
  }

function nextStep() {
  const inputs = steps[currentStep].querySelectorAll("input, select");
  for (const input of inputs) {
    if (!input.checkValidity()) {
      input.reportValidity();
      return;
    }
  }
  if (currentStep < steps.length - 1) {
    currentStep++;
    showStep(currentStep);
  }
}

function prevStep() {
  if (currentStep > 0) {
    currentStep--;
    showStep(currentStep);
  }
}

form.addEventListener("submit", function (e) {
    e.preventDefault();
    //alert("Form submitted successfully!");
  
    setTimeout(function () {
      window.location.href = "thankyou.html";
    }, 1500); // 1.5 seconds delay
});
  

showStep(currentStep);

function updateFileName(event) {
  const fileName = event.target.files[0]?.name || "Choose Files";
  document.getElementById('file-name').textContent = fileName;
}