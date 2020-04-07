<?php

if (extension_loaded('session')) { ?>
    <script type="text/javascript">
        window.location = "login";
    </script>
<?php
} else { ?>
    <script type="text/javascript">
        window.location = "dashboard";
    </script>
<?php } ?>