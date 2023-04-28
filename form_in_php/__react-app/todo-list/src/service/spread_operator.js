// copia
const persona = {
    nome: "Mario",
    cognome: "Rossi",
    lavori: {
        ciao: "ciao",
        pippo: {
            franco: 3
        }
    }
}

const copia = {...persona};

console.log(copia);
