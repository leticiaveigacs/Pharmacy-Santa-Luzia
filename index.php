<!-- <?php 

require_once('bd.php');

// Fetch site data
$site_dados = $pdo->query("SELECT * FROM site")->fetch();
?> -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $site_dados['titulo']?></title>

    <style>

      *{padding: 0;
         margin: 0;
         font-family: Georgia, 'Times New Roman', Times, serif;
      }

      #banner{
         width: 100%;
         background-color: #333;
         color: #fff;
         text-align: center;
         font-size: 1.5rem;
         height: 120px;
         padding-top: 100px;

      }


      #sobre{
         width: 70%;
         margin: 50px auto;
         background-color:#f9f9f9;
         color: #000;
         text-align: center;
         border: 1px solid #ccc;
         border-radius: 15px;
         padding: 40px;
      }

      #contacto{
         width: 50%;
         margin: 50px auto;
         padding: 40px;
         background-color: #f9f9f9;
         border: 1px solid #ccc;
         text-align: center;

      }

      h2{
         margin-bottom: 25px;
      }

      #contacto input, #contacto textarea  {
         width: 95%;
         padding: 10px;
         border: 1px solid #ccc ;
         outline:none;
         margin-top: 10px;
         margin-bottom: 20px;
      }

      #contacto button{
         background-color: #4CAF50;
         color:white;
         padding: 15px, 25px;
         border: 5px solid #4CAF50;
         border-radius: 5px;
         cursor: pointer;
         font-size: 1.2rem;
         
      }

      #contacto button:hover{
         background-color: #45A049;
      }

      footer{
         
         background-color: #333;
         color: #fff;
         text-align: center;
         padding: 25px ;

      }

      nav {
    position: fixed;
    top: 0;
    left: 0;
    background-color: #555;
    color: #fff;
    text-align: center;
    width: 100%; /* Ensure it spans the full width */
    z-index: 1000; /* Keep it on top of other elements */
}

nav ul {
    list-style: none;
    padding: 0; /* Remove default padding */
    margin: 0; /* Remove default margin */
}

nav li {
    display: inline-block;
    margin: 10px;
}

nav a {
    color: #fff;
    text-decoration: none;
    padding: 10px 15px; /* Add padding for better spacing */
}

nav a:hover {
    color: #ffcc00; /* Change color on hover */
}

img{
   width: 35%;
   text-align: center;
   align-items: center;
   margin-top: 30px;
   border: 1px solid #ccc;
   border-radius: 35px;

   
}

    </style>
</head>
<body>
  <!--   <h1>Site Simples PHP</h1> -->

  <nav>
   <ul>
      <li><a href="#banner">Home</a></li>
      <li><a href="#sobre">Sobre</a></li>
      <li><a href="#contacto">Contactos</a></li>
   </ul>
  </nav>

  <section id="banner">
   <h1><?= $site_dados['banner']?></h1>

  </section>

  <section id="sobre">
   <h2>Sobre</h2>
   <p><?= $site_dados['sobre']?></p>

    <!-- Inserindo a imagem -->
    <img src="pharcacy.jpg" alt="Farmácia Santa Luzia">

  </section>

  <section id="contacto">
   <h2>Contactos</h2>
   <form action="enviar_contacto.php"  method="post">
   <label for="nome">Nome</label>
   <input type="text" name= "nome" id="nome" required />
   <label for="email">E-mail</label>
   <input type="text" name= "email" id="email" required />
   <label for="mensagem">Menagem</label>
   <textarea name= "mensagem" id="mensagem" required ></textarea>
   <button type="submit">Enviar</button>

   </form>

  </section>

  <footer>
 
   <p><?=date("Y")?> | 	&#169; <?=$site_dados['titulo']?></p>

  </footer>

  <script>
      
       const form= document.querySelector("#contacto form");

       form.addEventListener("submit", (event) => {
         event.preventDefault();

         const dados = new FormData(form);

         fetch('enviar_contacto.php' , {
            method: 'POST', body: dados
         }).then((response)=> {
           if((response.ok))
           return response.text();
         throw new Error ('Falha ao enviar Mensagem!')
         }).then((data)=> {
            alert(data);
            form.reset();
         }).catch((error)=>{
            alert(error.message)
         })

       })

  </script>
 
</body>
</html>
