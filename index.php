<?php



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- FONT AWESOME  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- VUE -->
  <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
  <!-- AXIOS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js" integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- CSS  -->
  <link rel="stylesheet" href="style.css">
  <title>PHP todolist</title>
</head>
<body>

  
  <div id="app">

    <div class="container">
      
      <div class="logo mb">
        <img src="logo.png" alt="">
      </div>

      <div class="input-area">
        <input
          v-model.trim="nuovoItemInserito"
          @keyup.enter="aggiungi"
          class="btn"
          type="text"
          placeholder="Inserire Testo"
          >

        <button @click="aggiungi" class="btn">Aggiungi</button>
      </div>

      <h4>{{msgError}}</h4>

      <h2 v-if="lista.length === 0">La lista è vuota</h2>

      <ul v-else>

        <li
          v-for="(item, i) in lista"
          @click="item.done = !item.done">

          <span
            :class="{'done' : item.done}">{{item.text}}</span>
          <i @click.stop="elimina(i)" class="fa-regular fa-circle-xmark"></i>
        </li>

      </ul>

    </div>

  </div>
  
  <script src="script.js"></script>
</body>
</html>