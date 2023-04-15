

// const promessa_response = fetch(base_url+"/users.php").then(res => {
//     return res.json();
// });

// promessa del json che verrà convertito
// const promessa_json = promessa_response.then(json => {
//     console.log(json);
// })
// fetch(base_url+"/tasks.php");

/* Una funzione asyncrona restituirà sempre una promessa */
async function getUser() {
    const base_url = "http://localhost/corso_php_tss/form_in_php/rest_api";
    const response = await fetch(base_url + "/users.php");
    const json = await response.json();

    return json;
}

const users = await getUser();
// Oppure
// getUser().then(data => {
//     const user = data;
// });
console.log(users);