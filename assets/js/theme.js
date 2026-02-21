const hero = document.getElementById("hero");
const panel = document.getElementById("panel");

if (hero && panel) {
  hero.addEventListener("pointermove", (event) => {
    const rect = hero.getBoundingClientRect();
    const x = (event.clientX - rect.left) / rect.width;
    const y = (event.clientY - rect.top) / rect.height;

    const rotateY = (x - 0.5) * 14;
    const rotateX = (0.5 - y) * 12;

    panel.style.transform = `rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateZ(10px)`;
  });

  hero.addEventListener("pointerleave", () => {
    panel.style.transform = "rotateX(0deg) rotateY(0deg) translateZ(0px)";
  });
}
