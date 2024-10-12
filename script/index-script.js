function isInViewport(element) {
  let rect = element.getBoundingClientRect();
  return (
    rect.top >= 0 &&
    rect.left >= 0 &&
    rect.bottom <=
      (window.innerHeight || document.documentElement.clientHeight) &&
    rect.right <= (window.innerWidth || document.documentElement.clientWidth)
  );
}

let skillItems = document.querySelectorAll(".skills-bar");

const observer = new IntersectionObserver(
  (entries, observer) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("animate");
        observer.unobserve(entry.target);
      }
    });
  },
  { threshold: 1 }
);

skillItems.forEach((item) => {
  observer.observe(item);
});

function align() {
  let ele1 = document.querySelector(".resume-group:nth-child(1) .resume-item");
  console.log(ele1);
  let ele2 = document.querySelector(".resume-group:nth-child(2) .resume-item");
  let mx = Math.max(ele1.offsetHeight, ele2.offsetHeight);
  document.querySelectorAll(".resume-item").forEach((ele) => {
    ele.style.height = mx + "px";
  });
}
if (screen.width > 768) {
  window.onload = align();
  // align();
  console.log("aligned");
}

let typed = document.querySelector(".typed");
let cursor = document.querySelector(".cursor");
let strings = [
  "Laravel Developer",
  "React Developer",
  "Android Developer",
  "Competitive Programmer",
  "Linux Enthusiast",
]

function commonPrefix(str1) {
  let prefix = "";
  let n = str1.length;
  for (let i = 0; i < n; i++) {
    for (let j = 0; j < n; j++) {
      if (str1[i] != str1[j]) {
        return prefix;
      }
    }
    prefix += str1[i];
  }
  return prefix;
}

function sleep(ms) {
  return new Promise((resolve) => setTimeout(resolve, ms));
}

async function typeWriter(text, element, speed) {
  let i = 0;
  while (i < text.length) {
    element.innerHTML += text.charAt(i);
    i++;
    await sleep(speed);
  }
}

async function deleteWriter(element, speed) {
  let text = element.innerHTML;
  let i = text.length - 1;
  while (i >= 0) {
    element.innerHTML = text.slice(0, i);
    i--;
    await sleep(speed);
  }
}

async function typeLoop() {
  let common = commonPrefix(strings);
  typed.innerHTML = common;
  for (let i = 0; i < strings.length; i++) {
    strings[i] = strings[i].slice(common.length);
  }
  while (true) {
    for (let i = 0; i < strings.length; i++) {
      await typeWriter(strings[i], typed, 75);
      cursor.classList.add("blinking");
      await sleep(1000);
      cursor.classList.remove("blinking");
      await deleteWriter(typed, 75);
      // await sleep(500);
    }
  }
}

typeLoop();
