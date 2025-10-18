<script>
  /* Home */
    const slides = document.querySelectorAll('.slide');
  const categorySpan = document.querySelector('.caption .category');
  const captionSpan = document.querySelector('.caption .image-caption');
  let index = 0;

  // ✅ Initialize first slide
  slides[index].classList.add('active');
  categorySpan.textContent = slides[index].getAttribute('data-category');
  captionSpan.textContent = slides[index].getAttribute('data-caption');

  // ✅ Function to go to the next slide
  function nextSlide() {
    slides[index].classList.remove('active');
    index = (index + 1) % slides.length; // Loop back to first slide
    slides[index].classList.add('active');

    // Update caption
    categorySpan.textContent = slides[index].getAttribute('data-category');
    captionSpan.textContent = slides[index].getAttribute('data-caption');
  }

  // ✅ Add click event to each image
  slides.forEach(slide => {
    slide.addEventListener('click', nextSlide);
  });

  /* ✅ Menu highlight logic */
  const links = document.querySelectorAll('.nav-links a');
  const currentURL = window.location.pathname;

  links.forEach(link => {
    if (currentURL.includes(link.getAttribute('href'))) {
      link.classList.add('active');
    } else {
      link.classList.remove('active');
    }
  });


    /*Work Slideshow*/
  document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".slideshow").forEach((slideshowEl) => {
    const imgEl = slideshowEl.querySelector(".slide-image");
    const captionEl = slideshowEl.querySelector(".caption-work");
    const counterEl = slideshowEl.querySelector(".counter");

    if (!imgEl || !captionEl || !counterEl) {
      console.warn("Missing elements inside slideshow:", slideshowEl);
      return;
    }

    const slides = slideshowEl.dataset.slides
      ? JSON.parse(slideshowEl.dataset.slides)
      : [
          { src: "https://picsum.photos/seed/default1/700/467", caption: "Default caption 1" },
          { src: "https://picsum.photos/seed/default2/700/467", caption: "Default caption 2" },
        ];

    let index = 0;

    function renderSlide(i) {
      const total = slides.length;
      const current = ((i % total) + total) % total;
      const slide = slides[current];
      imgEl.src = slide.src;
      imgEl.alt = slide.caption || `Slide ${current + 1}`;
      captionEl.textContent = slide.caption || "";
      counterEl.textContent = `(${current + 1} of ${total})`;
      index = current;
    }

    function nextSlide() {
      renderSlide(index + 1);
    }

    slideshowEl.addEventListener("click", nextSlide);
    renderSlide(index);
  });
});



  </script>