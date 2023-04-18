/**
 * 1. Funzione o una classe
 * 2. Funzione pura |
 * 3. Prima lettera maiuscola, funzione componente
 */

function productCategoryRow({ category }) {
    return (
        // JSX 
        <tr>
            <th colspan="2">
                {category}
            </th>
        </tr>
    );
}
