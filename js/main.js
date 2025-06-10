// Typing effect if you'd like to animate your name
document.addEventListener("DOMContentLoaded", () => {
  const text = "Hi, I'm Pankaja HY";
  let i = 0;
  const el = document.querySelector('.typing-text');
  
  function type() {
    if (i < text.length) {
      el.innerHTML = text.substring(0, i + 1) + "<span>|</span>";
      i++;
      setTimeout(type, 100);
    } else {
      el.innerHTML = text + " ✨";
    }
  }

  type();
});
