  <?php

  require_once __DIR__ .'/vendor/autoload.php';
  $router=include_once __DIR__.'/web.php';
  use Carlos\Auth\App\Application;
  use Carlos\Auth\Models\Model;
  Model::blindConnection(new SQLite3(__DIR__.'banco.db'));
  Model::create_table("CREATE TABLE IF NOT EXISTS users(username TEXT, password TEXT)");
  Model::create_table("CREATE TABLE IF NOT EXISTS books(title TEXT)");
  Model::create_table("CREATE TABLE IF NOT EXISTS loans(user TEXT, book TEXT)");



  $app= new Application($router);
  $app->send();

















