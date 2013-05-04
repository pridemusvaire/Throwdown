<?php

$instructions = <<<MDOWN

Welcome to Throwdown!
=====================

Overall this whole process is _REALLY_ simple. Fill out the details below and press submit. That's it!

These options will be written to your `config.json` file which is only accessible via FTP or directly editing it in your local file system.

For security reasons, viewing `config.json` directly within the browser has been disabled, so unless someone has root access no one is getting a peak at your config.

---

MDOWN;


  function random_name() {
    $first  = ['Boxing', 'Talking', 'Wrecking', 'Working', 'Tripping'];
    $second = ['Squirrel', 'Babies', 'Waffle', 'Ding-Dong'];

    return $first[array_rand($first, 1)] . ' ' . $second[array_rand($second, 1)];
  }

  $random_name = random_name();

?><!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Throwdown Installation Guide</title>
  <link rel="stylesheet" href="app/css/install.css">
</head>
<body>

  <div id="message" class="container">

    <?php echo $instructions = Markdown($instructions); ?>

    <form class="config-form" data-persist="garlic" data-validate="parsley" method="POST" action="index.php">
      <input type="hidden" name="hiddenInstallID" value="installing">
      <input type="hidden" name="installed" value="<?php echo date('m/d/Y'); ?>">


    <!-- GENERAL INFO -->
      <label for="blogName">Blog Name</label>
      <input type="text" name="blogName" id="blogName" value="" placeholder="ex: <?php echo $random_name; ?> Blog" data-trigger="focusin focusout" required>

    <!-- USER INFO -->
      <label for="userName">User Name</label>
      <input type="text" name="userName" id="userName" value="" placeholder="First and Last name" data-trigger="focusin focusout" required>

      <label for="userEmail">User Email</label>
      <input type="text" name="userEmail" id="userEmail" value="" placeholder="ex: email@something.com" data-trigger="focusin focusout" required>

    <!-- SITE(S) INFO -->
      <label for="localhost">Localhost URL</label>
      <input type="text" name="localhost" id="localhost" value="" placeholder="ex: http://blog.dev/" data-trigger="focusin focusout" required>

      <label for="remoteHost">Remote Host URL</label>
      <input type="text" name="remoteHost" id="remoteHost" value="" placeholder="ex: http://github.com/" data-trigger="focusin focusout" required>

    <!-- i18n INFO -->
      <label for="preferredLanguage">Preferred Language</label>
      <select type="text" name="preferredLanguage" id="preferredLanguage" autocomplete="off" required>

        <optgroup label="Preferred Language">
          <?php languagePref('en'); ?>
        </optgroup>

      </select>


    <!-- TWITTER -->
<!--
      <label for="twitterName">Twitter Handle</label>
      <input type="text" name="twitterName" id="twitterName" value="" placeholder="@twitter.name">

      <label for="twitterSecret">Twitter Secret</label>
      <input type="text" name="twitterSecret" id="twitterSecret" value="" placeholder="">


    <!-- FACEBOOK -->
<!--
      <label for="facebookPage">Facebook Page</label>
      <input type="text" name="facebookPage" id="facebookPage" value="" placeholder="##########">

      <label for="facebookSecret">Facebook Secret</label>
      <input type="text" name="facebookSecret" id="facebookSecret" value="">

      <label for="facebookKey">Facebook Key</label>
      <input type="text" name="facebookKey" id="facebookKey" value="">

-->

    <div class="clear clr"></div>

    <!-- SUBMIT -->
    <button type="submit" id="submit" class="submit-button">Submit</button>


    </form><!-- #config-form -->

  </div>


  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
  <script src="app/js/parsely.min.js"></script>
  <script src="app/js/garlic.min.js"></script>
  <script src="app/js/plugins.js"></script>
</body>
</html>