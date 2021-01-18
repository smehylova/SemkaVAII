class Otazky {

    constructor(hodnota, idPo) {
        this.hodnota = hodnota;
        if (hodnota !== 'vsetky' && hodnota !== 'moje' && hodnota !== 'zodpovedane' && hodnota !== 'nezodpovedane') {
            this.hodnota = 'vsetky';
        }
        this.idP = idPo;
        this.nacitat();
    }

    async getOtazky() {
        try {
            let response = await fetch("?c=Otazka&a=otazky");
            let data = await response.json();

            var list = document.getElementById("zoznamOtazok");
            var html = "";
            data.forEach((question) => {
                if ((this.hodnota === "vsetky") || (this.hodnota === "moje" && (this.idP == question.pytajuci_id)) || (this.hodnota === "zodpovedane" && question.odpoved !== "") || (this.hodnota === "nezodpovedane" && question.odpoved === "")) {
                    html += `<div class="card col-sm-4">
            <br>
            <h3>${question.otazka}</h3>
            <div>${question.odpoved}</div>`;
                    if (this.idP == question.pytajuci_id) {
                        html += `<td><a class="col-10 btnEdit btn btn-outline-primary" href="?c=Otazka&a=edit&id=${question.id}">Edit</a></td>
            <td><a class="col-10 btnZmaz btn btn-outline-danger" href="?c=Otazka&a=delete&id=${question.id}">Zmazat</a></td>`;
                    }
        html += `</div>`;
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