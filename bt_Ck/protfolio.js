
document.getElementById("button1").addEventListener("click", function() {
    // Reset the transform property to none before starting the animation
    this.style.transform = "none";

    // Trigger the animation
    this.style.animation = "rotate 1s linear";

    // Reset the animation property after the animation completes
    setTimeout(() => {
        this.style.animation = "";
    }, 1000);
});


document.addEventListener('DOMContentLoaded', function() {
    const viewDetailsBtns = document.querySelectorAll('.view-details');
    const closeDetailsBtn = document.querySelector('.close-details');
    const jobDetailsContainer = document.querySelector('.job-details-container');

    viewDetailsBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            jobDetailsContainer.style.display = 'block';
        });
    });

    closeDetailsBtn.addEventListener('click', function() {
        jobDetailsContainer.style.display = 'none';
    });
});