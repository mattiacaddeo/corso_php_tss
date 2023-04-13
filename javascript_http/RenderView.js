
function UsersList(array_users, element_selector) {
    // DATI DISPONIBILI
    const lista = document.getElementById(element_selector);
    const elenco = array_users.map((user) => {
        return "<li>" + user.first_name + " "+ user.last_name + "</li>";
    }).join("");

    lista.innerHTML = elenco;
}

//Function expression
const UserTable = (array_users, element_selector) => {
    //Template literals
    const tr_users = array_users.map((user)=>{
        return `<tr>
                <td>
                    ${user.first_name}
                </td>
            </tr>`;
        }).join("");
    const html =  `<table border="1" width="50%">
        <tr>
            <th>
                Nome
            </th>
        </tr>
    ${tr_users}
    </table>`;
    document.getElementById(element_selector).innerHTML = html;
}


export {UsersList, UserTable};