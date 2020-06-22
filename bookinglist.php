 <!DOCTYPE html>
 <html>
 <body>
    <div class="container">
        <header>
            <img src="logo.jpg" alt="logo" class="logo">

            <nav>
                <a href="#" class="hide-desktop">
                    <img src="ham.svg" alt="toggle menu" class="menu" id="menu">
                </a>
                <ul class="show-desktop hide-mobile" id ="nav">
                    <li id="exit" class="exit-btn hide-desktop"><img src="exit.svg" alt="exit"></li>
                    <li><a href="landingpage.php">Home</a></li>
                    <li><a href="">Bookings</a></li>
                    <li><a href="logout.php">logout</a></li>



                </ul>
            </nav>
        </header>

    </div>

    <div class="container" id="booking-list">
            <table class="table table-responsive-sm table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Address</th>
                        <th scope="col">Booking ID</th>
                        <th scope="col">Slot</th>
                        <th scope="col">Status</th>
                        <th scope="col">Lab</th>
                        <th scope="col">Test</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $stmt = $pdo->query("SELECT * from list");
                        while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
                            echo "<tr><td>";
                            echo(htmlentities($row['name']));
                            echo("</td><td>");
                            echo(htmlentities($row['contact']));
                            echo("</td><td>");
                            echo(htmlentities($row['address']));
                            echo("</td><td>");
                            echo(htmlentities($row['booking_id']));
                            echo("</td><td>");
                            echo(htmlentities($row['slot']));
                            echo("</td><td>");
                            echo(htmlentities($row['status']));
                            echo("</td><td>");
                            echo(htmlentities($row['lab']));
                            echo("</td><td>");
                            echo(htmlentities($row['test']));
                            echo("</td></tr>\n");
                        }
                    ?>
                </tbody>
            </table>
    </div>
        <script>
            var menu = document.getElementById('menu');
            var nav = document.getElementById('nav');
            var exit = document.getElementById('exit');

            menu.addEventListener('click',function(e){
            nav.classList.toggle('hide-mobile');
            e.preventDefault();
            });

            exit.addEventListener('click',function(e){
            nav.classList.add('hide-mobile');
            e.preventDefault();
            });
        </script>
</body>
</html>