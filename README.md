PHP ToDo List JSON
===
## CONSEGNA

**Descrizione** <br>
Dobbiamo creare una web-app che permetta di leggere e scrivere una lista di Todo. <br>
Deve essere anche gestita la persistenza dei dati leggendoli da, e scrivendoli in un file JSON.

**Stack**<br>
Html, CSS, VueJS (importato tramite CDN), axios, PHP

**Consigli**<br>
Nello svolgere l’esercizio seguite un approccio graduale.<br>
Prima assicuratevi che la vostra pagina *index.php* (il vostro front-end) riesca a comunicare correttamente con il vostro script PHP (le vostre “API”).

Lo step successivo è quello di “testare” l’invio di un nuovo task, sapendo che manca comunque la persistenza lato server (ancora non memorizzate i dati da nessuna parte).

Solo a questo punto sarà utile passare alla lettura della lista da un file JSON.
****

>**Bonus**<br>
Mostrare lo stato del task → se completato, barrare il testo.<br>
Permettere di segnare un task come completato facendo click sul testo.<br>
Permettere il toggle del task (completato/non completato)<br>
Abilitare l’eliminazione di un task

## STEPS
1. Gli elementi statici vengono letti via axios con vue da un json
2. Quando ne aggiungo uno richiamo un metodo axios che va a puntare un file PHP che riceve il dato in POST 
3. Il file PHP va a leggere il file json, lo trasforma in array, aggiunge l'elemento nuovo, lo salva 

BONUS min 1:21:57 per eliminare (fare i passaggi inversi)