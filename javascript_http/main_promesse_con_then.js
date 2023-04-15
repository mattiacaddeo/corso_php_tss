// require
import { getUser } from "./UserService2.js";
import { UsersList, UserTable } from "./RenderView.js";

// -> Promessa
getUser().then((json) => {
    UsersList(json.data, "lista_utenti");
});

const user_locale = [
    {
        "id_user": 100,
        "first_name": "Mirio",
        "last_name": "DaRoit",
        "birthday": "2017-03-17",
        "birth_city": "Fermo",
        "id_regione": 16,
        "id_provincia": 15,
        "gender": "M",
        "username": "d@email.com",
        "password": "27b4b5b01b0d1fcab2046369720ff75e"
      },
      {
        "id_user": 101,
        "first_name": "Paolo",
        "last_name": "b",
        "birthday": "2023-04-06",
        "birth_city": "Torino",
        "id_regione": 8,
        "id_provincia": 4,
        "gender": "M",
        "username": "bbbb@aaa.it",
        "password": "81dc9bdb52d04dc20036dbd8313ed055"
      }
]

UserTable(user_locale, "lista_utenti_2");
