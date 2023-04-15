// /users.php
const base_url = "http://localhost/corso_php_tss/form_in_php/rest_api";

/* Versione con then
export function getUser() {
    return fetch(base_url + "/users.php").then(response => response.json()); // Promessa JSON
}
*/

export async function getUser() {
    const response = await fetch(base_url + "/users.php");
    const json = await response.json();

    return json.data;
}