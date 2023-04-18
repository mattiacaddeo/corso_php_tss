const primari_addittivi = ["rosso", "verde", "blu"];
const primari_sottrattivi = ["cyano", "magenta", "giallo"];
// console.log(...primari_addittivi);

const colori_primari = [...primari_addittivi, ...primari_sottrattivi];
// console.log(colori_primari);

const primari_addittivi_rosa = [...primari_addittivi, "rosa"];
// console.log(primari_addittivi_rosa);

const persona = {
    nome: "Mario",
    cognome: "Rossi"
};

const persona2 = {...persona, ...{voti: [6, 7, 3]}};

persona2.indirizzo = "Via Novara, 33";

console.log(persona);
console.log(persona2);