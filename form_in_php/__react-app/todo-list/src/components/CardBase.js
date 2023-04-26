function CardBase({titolo, testo}) {
//function CardBase(props) {
    return (
        <div>
            {/* {props.titolo} */}
            <h3>{titolo}</h3>
            <p>{testo}</p>
        </div>
    );
}

export default CardBase;