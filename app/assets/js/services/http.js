export class Http {
    get(url) {
        return fetch(url)
            .then(res => this.#toJson(res))
            .catch(error => this.#error(error))
    }

    #toJson(res) {
        if (!res.ok) {
            throw res.json();
        }
        return res.json()
    }

    async #error(error) {
        const errorMessage = (await error).error;
        alert(errorMessage);
    }
}