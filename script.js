const { createApp } = Vue;

createApp({

  data() {

    return {
      apiUrl: 'server.php',
      lista: [
        // {
        //   text: 'fare spesa',
        //   done: false,
        // },
        // {
        //   text: 'pulire bagno',
        //   done: true,
        // },
        // {
        //   text: 'preparare la cena',
        //   done: false,
        // },
      ],
      msgError: '',
      nuovoItemInserito: '',
    }

  },

  methods: { //FUNZIONI

    readList(){
      axios.get(this.apiUrl)
      .then(result => {
        console.log(result.data)
      })
    },

    elimina(i) {
      if (this.lista[i].done) {
        this.lista.splice(i, 1)
      } else {
        this.inserisciMsg('Devi sbarrare prima di eliminare')
      }
    },

    aggiungi(){
      if(this.nuovoItemInserito.length == 0){
        this.inserisciMsg('Devi inserire un testo')
      }else {
        const nuovoItem = {
          text: this.nuovoItemInserito,
          done:false,
        }
        this.lista.unshift(nuovoItem);
        this.nuovoItemInserito= '';
      }
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