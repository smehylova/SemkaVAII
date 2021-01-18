class Otazky {

    constructor(hodnota, idPo) {
        this.hodnota = hodnota;
        //console.log(idPo);
        if (hodnota !== 'vsetky' && hodnota !== 'moje' && hodnota !== 'zodpovedane' && hodnota !== 'nezodpovedane') {
            this.hodnota = 'vsetky';
        }
        this.idP = idPo;
        //console.log(this.idP);
        this.nacitat();

        //setInterval(() => {
        //    this.nacitat()
        //}, 2000);
    }

    async getOtazky() {
        try {
            let response = await fetch("?c=Otazka&a=otazky");
            let data = await response.json();
            //console.log(data);

            var list = document.getElementById("zoznamOtazok");
            var html = "";
            //console.log("Aktualne id: " + this.idP)
            data.forEach((pouzivatel) => {
                console.log(pouzivatel.pytajuci_id);
                if ((this.hodnota === "vsetky") || (this.hodnota === "moje" && this.idP === pouzivatel.pytajuci_id) || (this.hodnota === "zodpovedane" && pouzivatel.odpoved !== "") || (this.hodnota === "nezodpovedane" && pouzivatel.odpoved === "")) {
                    html += `<div class="card col-sm-4">
            <br>
            <h3>${pouzivatel.otazka}</h3>
            <div>${pouzivatel.odpoved}</div>
            <td><a class="col-10 btnEdit btn btn-outline-primary" href="?c=Otazka&a=edit&id=${pouzivatel.id}">Edit</a></td>
            <td><a class="col-10 btnZmaz btn btn-outline-danger" href="?c=Otazka&a=delete&id=${pouzivatel.id}">Zmazat</a></td>
        </div>`;
                }

            });
            list.innerHTML = html;
        } catch (e) {
            console.log('Chyba: ' + e.message);
        }
    }

    async nacitat() {
        await this.getOtazky();
    }
}

/*document.addEventListener(
    'DOMContentLoaded', () => {
        var otazky = new Otazky();
    }, false
);*/