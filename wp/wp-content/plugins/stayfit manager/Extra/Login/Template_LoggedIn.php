<div class="container">

    <?php print_r($this->user->user_login); ?>

    <h1> You are logged in. </h1>
    <p> You are signed on as <strong> <?php echo $this->user->user_login; ?> </strong>. <?php echo Authentication::getLogout(); ?> </p>

</div>
