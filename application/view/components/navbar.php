<nav>
  <div class="container">
    <ul>
      <li>
        <a href="/home">Home</a>
      </li>

      <li>
        <?php
          if(!isset($_SESSION['logged_in'])) {
            echo '<a href="/register">Register</a>';
          }
        ?>
      </li>

      <li>
        <?php
          if(isset($_SESSION['logged_in'])) {
            echo '<a href="/home/logout">Logout</a>';
          }
          else{
            echo '<a href="/login">Login</a>';
          }
        ?>
      </li>

      <li>
        <a href="/admission">Online Admission</a>
      </li>

      <li>
        <a href="/verification">Verification</a>
      </li>

    </ul>
  </div>
</nav>
