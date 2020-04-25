<?php
    include("cookiemonster.php");
    if(checkCookies(1)) {
        echo "lol";
    }
?><!DOCTYPE html>
<html lang="nb" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/index.css">
    <title>Oblig 1 | Gruppe 15</title>
    <script type="text/javascript" src="../js/index.js"></script>
  </head>
  <body>
    <p style="width: 100%; background-color:black; margin: 0; padding: 10px; color: white; text-align: center; position: fixed; top: 0;"><b>PS: </b>Ikke bruk et "vanlig" passord. Vi brukte med tid på design en sikkerhet, og det sier kanskje litt.</p>
    <main>
      <section>
        <form action="loginFromDatabase.php" id="loginForm" method="POST">
          <h2>Logg inn bruker</h2>
          <label id="loginType" for="loginName">Email</label>
          <input id="loginName" type="text" name="loginUserName" required spellcheck="false" autocomplete="off" autocorrect="off" autocapitalize="off">
          <label id="loginPass" for="loginPassword">Passord</label>
          <input id="loginPassword" type="password" name="loginUserPassword" required spellcheck="false" autocomplete="off" autocorrect="off" autocapitalize="off">
          <label for="userLoginTypeBruker">Type bruker:</label>
          <select id="userLoginTypeBruker" name="typeBruker" required>
            <option value="brukeretabell">Elev</option>
            <option value="foreleser">Foreleser</option>
            <option value="admin">Admin</option>
            <option value="anonym">Anonym</option>
          </select>
          <button type="submit" value="Submit" id="loginBtn">Logg inn</button>
        </form>

        <form action="userForgotPasswordFromDatabase.php" id="forgotPasswordForm" method="POST">
          <h2>Bruker glemt passord</h2>
          <label for="forgotPasswordEmail">Epost</label>
          <input id="forgotPasswordEmail" type="text" name="forgotPasswordEmail" required spellcheck="false" autocomplete="off" autocorrect="off" autocapitalize="off">
          <label for="forgotPasswordOldPassword">Gammelt passord</label>
          <input id="forgotPasswordOldPassword" type="text" name="forgotPasswordOldPassword" required spellcheck="false" autocomplete="off" autocorrect="off" autocapitalize="off">
          <label for="forgotPasswordNewPassword">Nytt passord</label>
          <input id="forgotPasswordNewPassword" type="password" name="forgotPasswordNewPassword" required spellcheck="false" autocomplete="off" autocorrect="off" autocapitalize="off">
          <label for="userForgotPasswordTypeBruker">Type bruker:</label>
          <select id="userForgotPasswordTypeBruker" name="typeBruker" required>
            <option value="brukeretabell">Elev</option>
            <option value="foreleser">Foreleser</option>
          </select>
          <button type="submit" value="Submit" id="forgotPasswordBtn">Glemt passord</button>
        </form>
      </section>

      <section>
        <label for="register">Velg en type bruker:</label>
        <select id="register">
          <option value="student">Elev</option>
          <option value="teacher">Foreleser</option>
        </select>

        <article id="studentRegister">
          <form action="registerUserToDatabase.php" method="POST">
            <h2>Registrer ny bruker</h2>
            <label for="registerName">Navn</label>
            <input id="registerName" type="text" name="registerName" required spellcheck="false" autocomplete="off" autocorrect="off" autocapitalize="off">
            <label for="registerPassword">Passord</label>
            <input id="registerPassword" type="password" name="registerPassword" required spellcheck="false" autocomplete="off" autocorrect="off" autocapitalize="off">
            <label for="registerEmail">Email</label>
            <input id="registerEmail" type="email" name="registerEmail" required spellcheck="false" autocomplete="off" autocorrect="off" autocapitalize="off">
            <label for="userRegisterStudie">Studieretning:</label>
            <input id="userRegisterStudie" type="text" name="registerStudie" spellcheck="false" autocomplete="off" autocorrect="off" autocapitalize="off">
            <label for="userRegisterYear">Kull:</label>
            <input type="text" minlength="4" maxlength="4" id="userRegisterYear" name="registerYear" spellcheck="false" autocomplete="off" autocorrect="off" autocapitalize="off">
            <button type="submit" value="Submit" id="registerBtn">Registrer</button>
          </form>
        </article>

        <article id="teacherRegister">
          <form name="registration" action="registerLecturerToDatabase.php" method="post" enctype="multipart/form-data">
            <h2>Registrer ny foreleser</h2>
            <label for="navn">Navn</label>
            <input type="text" name="registerName" id="navn" required spellcheck="false" autocomplete="off" autocorrect="off" autocapitalize="off"/>
            <label for="passord">Passord</label>
            <input type="password" name="registerPassword" id="passord" required spellcheck="false" autocomplete="off" autocorrect="off" autocapitalize="off"/>
            <label for="email">Mail</label>
            <input type="email" name="registerEmail" id="email" required spellcheck="false" autocomplete="off" autocorrect="off" autocapitalize="off"/>
            <label for="bilde">Bilde</label>
            <input type="file" accept="image/jpeg" name="registerBilde" id="bilde" required spellcheck="false" autocomplete="off" autocorrect="off" autocapitalize="off"/>
            <input type="submit" name="submit" value="Registrer" />
          </form>
        </article>
      </section>
    </main>
  </body>
</html>
