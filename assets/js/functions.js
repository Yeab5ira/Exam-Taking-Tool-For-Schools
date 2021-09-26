function toggleNav() {
    let navigation = document.querySelector(".nav-container");
    let expandBtn = document.querySelector(".expand-icon");

    if(navigation.classList.contains("collapsed-nav")){
        navigation.classList.remove("collapsed-nav");
        expandBtn.classList.remove("fa-bars");
        expandBtn.classList.add("fa-times");
    }
    else if(!navigation.classList.contains("collapsed-nav")){
        navigation.classList.add("collapsed-nav");
        expandBtn.classList.add("fa-bars");
        expandBtn.classList.remove("fa-times");
    }
}