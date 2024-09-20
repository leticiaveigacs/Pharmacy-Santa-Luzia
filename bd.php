
<?php 


 $pdo = new PDO('sqlite:bancodedados.sqlite');

/* BASE DE DADOS sqlite */
// Update the connection string with actual database credentials
/* $pdo = new PDO('mysql:host=localhost;dbname=database_name;charset=utf8', 'username', 'password');*/
/* $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  */

$pdo->exec('CREATE TABLE IF NOT EXISTS site (
    titulo TEXT,
    banner TEXT,
    sobre TEXT)');

$query = $pdo->query("SELECT * FROM site");

if (!$query->fetch()) {
    // Insert default data if the table is empty
    $pdo->exec("INSERT INTO site (titulo, banner, sobre) 
                VALUES ('Meu Site', 'Bem-Vindo ao Meu Site', 'Texto de área Sobre')");
}

$pdo->exec('CREATE TABLE IF NOT EXISTS contatos(
    id INTEGER PRIMARY KEY,
    nome TEXT,
    email TEXT,
    mensagem TEXT
)');

// Fetch site data
/* $site_dados = $pdo->query("SELECT * FROM site")->fetch(PDO::FETCH_ASSOC);
 */ 
/* ?> */


