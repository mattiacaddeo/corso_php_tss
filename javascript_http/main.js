
import { getUser } from "./UserService2.js";
import { UsersList, UserTable } from "./RenderView.js";

const users = await getUser();

console.log(users);

UserTable(users, "lista_utenti");
UsersList(users, "lista_utenti_2");