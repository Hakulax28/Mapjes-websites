<?php include 'header.php';
?>


<body class="text-center">

  <main class="form-signin w-100 m-auto">
    <form action="process_login.php" method="post">
      <img class="mb-4 shadow-lg border border-dark" src="https://freez.it/wp-content/uploads/2016/02/onze-helden-van-de-servicedesk.jpg" alt="" width="500" height="350">
      <h1 class="h3 mb-3 fw-normal" style="color:aliceblue">Log in</h1><br>
      <div class="form-floating shadow-lg">
        <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
      </div><br>
      <div class="form-floating shadow-lg">
        <input type="wachtwoord" class="form-control" id="floatingPassword" name="wachtwoord" placeholder="Password">
        <label for="floatingPassword">Password</label>
      </div><br>
      <!--<div class="form-floating shadow-lg">
        <input type="rol" class="form-control" id="floatingRole" name="rol" placeholder="Wat is uw rol">
        <label for="floatingRole">Rol</label>
      </div><br>-->
      <div class="checkbox mb-3">
        <label style="color:aliceblue">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="w-100 shadow-sm btn btn-lg btn-primary" type="submit">Sign in</button><br>
      <br>
      <a href="registreer-gebruiker.php" class="w-100 shadow-sm btn btn-lg btn-success">Nog geen account? Registreer hier.</a>
      <p class="mt-5 mb-3 text-muted"></p>
    </form>
  </main>

  <?php include 'footer.php'; ?>