const { createApp } = Vue;

createApp({

  data() {

    return {
      apiUrl: 'server.php',
      lista: [],
      msgError: '',
      nuovoItemInserito: '',
    }

  },

  methods: { //FUNZIONI

    readList(){
      axios.get(this.apiUrl)
      .then(result => {
        this.lista = result.data
        console.log(this.lista)
      })
    },

    elimina(i) {

      // if(confirm('Vuoi davvero eliminare questo elemento?')){
      //   const eliminaItem = new FormData();
      //   eliminaItem.append('elimina', i);
        
      //   axios.post(this.apiUrl, eliminaItem)
      //   .then(result => {
      //     this.lista = result.data
      //     console.log('ricevo dopo l\'eliminazione',this.lista);
      //   })
      // }
      
      if (!this.lista[i].done) {
        const eliminaItem = new FormData();
        eliminaItem.append('elimina', i);
        
        axios.post(this.apiUrl, eliminaItem)
        .then(result => {
          this.lista = result.data
          console.log('ricevo dopo l\'eliminazione',this.lista);
        })
      } else {
        this.inserisciMsg('Devi sbarrare prima di eliminare')
      }
    },

    aggiungi(){
      
      // Invio al server senza form utilizzando (headers: {'Content-Type': 'multipart/form-data'})

      if(this.nuovoItemInserito.length == 0){
        this.inserisciMsg('Devi inserire un testo')
      }else {
        const nuovoItem = {
          text: this.nuovoItemInserito,
          done: false,
        }

        const data = {
          task: nuovoItem
        }
        
        axios.post(this.apiUrl, data, {
          headers: {'Content-Type': 'multipart/form-data'}
        }).then(result => {
          this.lista = result.data
          console.log('ricevo dopo l\'aggiunta',this.lista);
        })
        
        this.nuovoItemInserito= '';
      }
      

      /*
      //Invio al server CON form
      if(this.nuovoItemInserito.length == 0){
        this.inserisciMsg('Devi inserire un testo')
      }else {
      const nuovoItem = new FormData();
      nuovoItem.append('text', this.nuovoItemInserito);
      nuovoItem.append('done', false);

      axios.post(this.apiUrl, nuovoItem)
        .then(result => {
          this.lista = result.data
          console.log('ricevo dopo l\'aggiunta',this.lista);
        })

      this.nuovoItemInserito= '';
      }
      */

    },

    inserisciMsg(msg){
      this.msgError = msg;
      setTimeout(() => {
        this.msgError ='';
      },1500)
    }
  },

  mounted() {
    this.readList()
  }
}).mount('#app')