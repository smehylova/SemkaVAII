class Otazky {
    constructor() {
        this.nacitajData();

        setInterval(() => {
            this.nacitajData()
        }, 1000);
    }

    async nacitajData() {
        let response = await fetch("?c=Otazka&a=otazky");
        let data = await response.json();

        var list = document.getElementsByClassName("row");
        list.textContent = '';

        data.forEach((question) => {
            var karta = document.createElement("div");
            karta.className = "card col-sm-4";
            karta.innerText = data.otazka;
            list.appendChild(karta);
        })
    }
}

document
    .addEventListener(
        'DOMContentLoaded', () => {
            var otazky = new Otazky();
        }, false)
;