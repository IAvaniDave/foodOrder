const els = document.querySelectorAll(".ukiyo");
    els.forEach(el => {
      // PARALLAX
      // Use ukiyo.js
      // https://github.com/yitengjun/ukiyo-js
      const parallax = new Ukiyo(el);
    })

    const container = document.querySelector('#container');
    const scroll = new LocomotiveScroll({
      el: container,
      smooth: true,
      scrollFromAnywhere: true
    });

    imagesLoaded(container, {
      background: true
    }, function () {
      scroll.update();
    });