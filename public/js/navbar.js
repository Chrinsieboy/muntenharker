function openNav() {
  document.getElementById("Sidenav").style.width = "250px";
  console.log("The sidenav is open");

}

function closeNav() {
  document.getElementById("Sidenav").style.width = "0";
  console.log("The sidenav is closed");
}

function scrolltoTop() {
  document.getElementById("Top").scrollIntoView();
}

function scrolltoQ1() {
  const element = document.getElementById('Q1');
  const offset = 25;
  const bodyRect = document.body.getBoundingClientRect().top;
  const elementRect = element.getBoundingClientRect().top;
  const elementPosition = elementRect - bodyRect;
  const offsetPosition = elementPosition - offset;

  window.scrollTo({
    top: offsetPosition,
    behavior: 'smooth'
  });

  // document.getElementById("Q1").scrollIntoView();
}

function scrolltoQ2() {
  const element = document.getElementById('Q2');
  const offset = 25;
  const bodyRect = document.body.getBoundingClientRect().top;
  const elementRect = element.getBoundingClientRect().top;
  const elementPosition = elementRect - bodyRect;
  const offsetPosition = elementPosition - offset;

  window.scrollTo({
    top: offsetPosition,
    behavior: 'smooth'
  });

  // document.getElementById("Q2").scrollIntoView();
}

function scrolltoQ3() {
  const element = document.getElementById('Q3');
  const offset = 25;
  const bodyRect = document.body.getBoundingClientRect().top;
  const elementRect = element.getBoundingClientRect().top;
  const elementPosition = elementRect - bodyRect;
  const offsetPosition = elementPosition - offset;

  window.scrollTo({
    top: offsetPosition,
    behavior: 'smooth'
  });

  // document.getElementById("Q3").scrollIntoView();
}

function scrolltoQ4() {
  const element = document.getElementById('Q4');
  const offset = 25;
  const bodyRect = document.body.getBoundingClientRect().top;
  const elementRect = element.getBoundingClientRect().top;
  const elementPosition = elementRect - bodyRect;
  const offsetPosition = elementPosition - offset;

  window.scrollTo({
    top: offsetPosition,
    behavior: 'smooth'
  });

  // document.getElementById("Q4").scrollIntoView();
}

function scrolltoContact() {
  document.getElementById("Contact").scrollIntoView();
}