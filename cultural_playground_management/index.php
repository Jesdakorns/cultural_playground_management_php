<?php
if (extension_loaded('session')) { ?>
    <script type="text/javascript">
        window.location = "view/login";
    </script>
<?php
} else { ?>
    <script type="text/javascript">
        window.location = "view/dashboard";
    </script>
<?php } ?>