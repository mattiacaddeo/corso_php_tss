const  task = {
    "nome" : "comprare il latte",
    "due_date" : "2000-01-01",
    "done" : true
}
frase(task);
// const frase = `Ti ricordi che il task ${task.due_date}
//                 hai ${task.nome}`;
// const {nome, due_date} = task;

// const frase2 = `Ti ricordi che il task ${due_date} hai ${nome}`;
// console.log(frase2);

function frase({nome, due_date}) {
    const frase2 = `Ti ricordi che il task ${due_date} hai ${nome}`;
    console.log(frase2);
}