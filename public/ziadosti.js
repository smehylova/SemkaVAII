class Ziadosti {

    constructor(hodnota, idPo) {
        this.nacitat();

        setInterval(() => {
            this.nacitat()
        }, 2000);
    }

    async getZiadosti() {
        try {
            let response = await fetch("?c=Ziadost&a=ziadosti");
            let data = await response.json();
            console.log(data);

            var list = document.getElementById("tabulkaZiadosti");
            var html = "";
            data.forEach((ziadost) => {
                    html += `<tr>
                <th scope="row">${ziadost.meno}</th>
                <td>${ziadost.priezvisko}</td>
                <td>${ziadost.telefon}</td>
                <td>email</td>
                <td>${ziadost.poziadavka}</td>
                <td><a class="btn btn-outline-danger" href="?c=Ziadost&a=delete&id=${ziadost.id}">Zmazat</a></td>
            </tr>`;
            });
            list.innerHTML = html;
        } catch (e) {
            console.log('Chyba: ' + e.message);
        }
    }

    async nacitat() {
        await this.getZiadosti();
    }
}

document.addEventListener(
    'DOMContentLoaded', () => {
        var ziadosti = new Ziadosti();
    }, false
);