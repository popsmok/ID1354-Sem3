<div class="meny">
    <ul class="meny">
    <li><a href="<?php echo base_url()?>home"> 
        <img class="icon" src="http://localhost/sem3/resources/pics/home2.png" alt="hemikon"><p>HOME</p>
        </a> </li>
    <li><a href="<?php echo base_url()?>calendar"> 
        <img class="icon" src="http://localhost/sem3/resources/pics/cal2.png" alt="kalenderikon"><p>CALENDAR</p>
        </a> </li>
    <li><a href="<?php echo base_url()?>pancakes">
        <img class="icon" src="http://localhost/sem3/resources/pics/pancake2.png" alt="pannkaksikon"><p>PANCAKES</p>
        </a></li>
    <li><a href="<?php echo base_url()?>meatballs">
        <img class="icon" src="http://localhost/sem3/resources/pics/balls2.png" alt="köttbulleikon"><p>MEATBALLS</p>
        </a></li>
            <! phpn visar login och signup ELLER Logout. beroende på om $_SESSION har ett värde eller inte. >
    <?php
        if(isset($_SESSION['user'])) //om någon är inloggad if ANNARS else
            echo '<li><a href="'.base_url().'logout">
        <img class="icon" src="http://localhost/sem3/resources/pics/logout.png" alt="logoutikon"><p>Logout</p>
        </a></li>';
        else {
            echo '<li><a href="'.base_url().'login">
        <img class="icon" src="http://localhost/sem3/resources/pics/login.png" alt="loginikon"><p>login</p>
        </a></li>';
            echo '<li><a href="'.base_url().'signup">
        <img class="icon" src="http://localhost/sem3/resources/pics/signup.png" alt="signupikon"><p>signup</p>
        </a></li>';
        }
    ?>
    </ul>
</div>