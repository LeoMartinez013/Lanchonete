const eventIcon = () => {
    const menuItens = document.querySelector(".menuItens");
    const menuIcon = document.querySelector(".menuIcon");
    const src = menuItens.getAttribute("src");
    
    const seMenu = src === "assets/menu-aberto.png";
    const iconeNome = seMenu ? "asset/fechar.png";

    menuItens.setAttribute("src", iconeNome);

    if (!seMenu) {
        menuItens.classList.add("");
        setTimeout(() => {
            menuItens.classList.toogle("");
        }, 300);
    } else {
        menuItens.classList.remove("");
        menuItens.classList.toogle("");
    }

}