<footer class="clearFix">
    <div class="copyright">2015 © Broodjeszaak</div>
</footer>



<?php

if ((isset($_POST['sendButton'])) && (!empty($_POST['broodSoort'])))
{

    echo "<pre>";
    print_r($_POST);
    echo "</pre>";


}

?>

<!-------------------------------------------------------------------END CONTENT--------------------------------------------------------->

<script src="../../../public/js/jquery-1.11.3.min.js"></script>
<script src="../../../public/js/scripts.js"></script>

</body>
</html>