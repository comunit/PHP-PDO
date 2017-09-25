<?php
   $host = 'localhost';
   $user = 'root';
   $password = '';
   $dbname = 'pdohost';

   //set DSN
   $dsn = 'mysql:host='. $host .';dbname='. $dbname;

   //Create a pdo instance
   $pdo = new PDO($dsn, $user, $password);
   $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
   $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


   # PRDO query
  //  $stmt = $pdo->query('SELECT * FROM posts');

  //  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  //    echo $row['title'] . '<br>';
  //  }

  // while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
  //   echo $row->title . '<br>';
  // }

  # Prepaid statements (prepaid & excute)
  // Unsafe
  // $sql = "SELECT * FROM posts WHERE author = '$author'";

  //FETCH MULTIPLE POSTS

  //user input
  $author = 'Imran';
  $is_published = true;
  $limit = 1;

  // positional params
  $sql = 'SELECT * FROM posts WHERE author = ? && is_published = ? LIMIT ?';
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$author, $is_published, $limit]);
  $posts = $stmt->fetchAll();

  // Named params
  // $sql = 'SELECT * FROM posts WHERE author = :author && is_published = :is_published';
  // $stmt = $pdo->prepare($sql);
  // $stmt->execute(['author' => $author, 'is_published' => $is_published]);
  // $posts = $stmt->fetchAll();

  //var_dump($posts);

  foreach ($posts as $post) {
    echo $post->title . '<br>';
  }

  //FETCH SINGLE POST
  // $sql = 'SELECT * FROM posts WHERE id = :id';
  // $stmt = $pdo->prepare($sql);
  // $stmt->execute(['id' => $id]);
  // $post = $stmt->fetch();
  // echo $post->body;

  // GET ROW COUNT
  // $stmt = $pdo->prepare('SELECT * FROM posts WHERE  author = ?');
  // $stmt->execute([$author]);
  // $postCount = $stmt->rowCount();
  //
  // echo $postCount;

  // INSERT DATA
  // $title = 'Post five';
  // $body = 'This is post five';
  // $author = 'Imran';
  //
  // $sql = 'INSERT INTO posts(title, body, author) VALUES(:title, :body, :author)';
  // $stmt = $pdo->prepare($sql);
  // $stmt->execute(['title' => $title, 'body' => $body, 'author' => $author]);
  // echo 'post added';

  // UPDATE DATA
  // $id = 1;
  // $body = 'THIS IS UPDATED POST';
  //
  // $sql = 'UPDATE posts SET body = :body WHERE id = :id';
  // $stmt = $pdo->prepare($sql);
  // $stmt->execute(['body' => $body, 'id' => $id]);
  // echo 'post updated';

  // DELETE DATA
  // $id = 3;
  //
  // $sql = 'DELETE FROM posts WHERE id = :id';
  // $stmt = $pdo->prepare($sql);
  // $stmt->execute(['id' => $id]);
  // echo 'post Deleted';

  //SEARCH DATA
  // $search = "%five%";
  //
  // $sql = 'SELECT * FROM  posts WHERE title LIKE ?';
  // $stmt = $pdo->prepare($sql);
  // $stmt->execute([$search]);
  // $posts = $stmt->fetchAll();
  //
  // foreach ($posts as $post) {
  //   echo $post->title . '<br>';
  // }


