import logo from './logo.svg';
import './App.css';
import CardBase from './components/CardBase';

function App() {
  const bookList = [
    {
      titolo: "Harry Potter",
      autore: "pippo"
    },
    {
      titolo: "Il grande Gatsby",
      autore: "franco"
    }
  ];
  // trasformo le informazioni in componenti
  const cardList = bookList.map((book, key_index) => <CardBase key={key_index} testo={book.autore} titolo={book.titolo} />);
  return (
    <section>
      <div className="App">
        {cardList}

        {/* <CardBase colore={"red"} titolo={"Harry Potter"}></CardBase>
        <CardBase titolo={"Il grande Gatsby"}></CardBase> */}

      </div>
      <div className="secondoElenco">
        {bookList.map((book) => <CardBase key={book.titolo} titolo={book.titolo} />)}
      </div>
    </section>
  );
}

export default App;
