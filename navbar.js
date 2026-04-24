function toggleMenu() {
      const menu = document.getElementById("menu");
      menu.classList.toggle("d-none");
    }

    const links = document.querySelectorAll(".nav-link-custom");

    // guarda qual é o ativo
    let active = document.querySelector(".nav-link-custom.active")?.dataset.link;

    // clique → sincroniza desktop + mobile
    links.forEach(link => {

      link.addEventListener("click", function() {
        const target = this.dataset.link;

        active = target;

        links.forEach(l => l.classList.remove("active"));

        document.querySelectorAll(`[data-link="${target}"]`)
          .forEach(el => el.classList.add("active"));
      });

      // hover temporário
      link.addEventListener("mouseenter", function() {
        links.forEach(l => l.classList.remove("active"));
        this.classList.add("active");
      });

      link.addEventListener("mouseleave", function() {
        links.forEach(l => l.classList.remove("active"));

        if (active) {
          document.querySelectorAll(`[data-link="${active}"]`)
            .forEach(el => el.classList.add("active"));
        }
      });

    });