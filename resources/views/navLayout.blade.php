    <nav class="navigation">

      <a href="/logout">
          <i class="fas fa-sign-out-alt"></i>
          </a>
      <a href="/modify"><span class="fas fa-user-circle"></span></a>

      <?php
      $account = session('log');
      $users = session('user');


        echo "<div id=\"user\">$users->username</div>";
        echo "<a href=\"/delete?userId=$users->id\">
        <i class=\"fas fa-user-times\"></i>
        </a>";

        echo "<a href=\"/displayFavorite\">
        <i class=\"fas fa-heart\"></i>
        </a>";

        echo "<a href=\"/displayLater\">
        <i class=\"far fa-clock\"></i>
        </a>";

      ?>
    </nav>
