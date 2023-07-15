// typing animação --Tem que ser a primeira função a ser executada para funcionar.

var typed = new Typed(".typing",
{
    strings: ["", "Desenvolvedor de Web site", "Desenvolvedor Mobile", "Desenvolvedor de Banco de Dados", "Desenvolvedor de Software"],
    typeSpeed: 100,
    BackSpeed: 60,
    loop: true
})

// aside 
const nav = document.querySelector(".nav"),
    navList = nav.querySelectorAll("li"),
    totalNavList = navList.length,
    allSection = document.querySelectorAll(".section"),
    totalSection = allSection.length;
for (let i = 0; i < totalNavList; i++) {
    const a = navList[i].querySelector("a");
    a.addEventListener("click", function () {
        removeBackSection();
        for (let j = 0; j < totalNavList; j++) {
            if (navList[j].querySelector("a").classList.contains("active")) {
                //addBackSection();
                allSection[j].classList.add("back-section");
            }
            navList[j].querySelector("a").classList.remove("active");
        }
        this.classList.add("active")
        showSection(this);
        if (window.innerWidth < 1200) {
            asideSectionTogglerBtn();
        }
    })
}
document.querySelector(".hire-me").addEventListener("click", function () {
    const sectionIndex = this.getAttribute("data-section-index");
    showSection(this);
    updateNav(this);
    removeBackSection();
    //addBackSection(sectionIndex);
})
const navTogglerBtn = document.querySelector(".nav-toggler"),
    aside = document.querySelector("aside");
navTogglerBtn.addEventListener("click", () => {
    asideSectionTogglerBtn();
})

// functions

function asideSectionTogglerBtn() {
    const aside = document.getElementById('aside');
    aside.classList.toggle("open");
    navTogglerBtn.classList.toggle("open");
    for (let i = 0; i < totalSection; i++) {
        allSection[i].classList.toggle("open");
    }
}
function removeBackSection() {
    for (let i = 0; i < totalSection; i++) {
        allSection[i].classList.remove("back-section");
    }
}
function showSection(element) {
    for (let i = 0; i < totalSection; i++) {
        allSection[i].classList.remove("active")
    }
    const target = element.getAttribute("href").split("#")[1];
    document.querySelector("#" + target).classList.add("active");
}
function updateNav(element) {
    for (let i = 0; i < totalNavList; i++) {
        navList[i].querySelector("a").classList.remove("active");
        const target = element.getAttribute("href").split("#")[1];
        if (target === navList[i].querySelector("a").getAttribute("href").split("#")[1]) {
            navList[i].querySelector("a").classList.add("active");
        }
    }
}
//   function addBackSection(num)
//   {
//     allSection[num].classList.add("back-section");
//   }

function showPass() 
{
    const txtSenha = document.getElementById('txtSenha');
    const iconEye = document.getElementById('iconEye');
    if (txtSenha.type === "password") {
        txtSenha.type = "text";
        iconEye.classList.remove("fa-eye");
        iconEye.classList.add("fa-eye-slash");
    }
    else {
        txtSenha.type = "password";
        iconEye.classList.remove("fa-eye-slash");
        iconEye.classList.add("fa-eye");
    }
}