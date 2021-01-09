<?php

    /*  Global constants  */

    final class STATUS
    {
        const ACTIVE = 1;
        const INACTIVE = 0;
    }

    final class ROLES
    {
        const BANNED_ACCOUNT = 0;
        
        const INACTIVE_CLIENT = 1;
        const ACTIVE_CLIENT = 10;
        const PREMIUM_CLIENT = 15;

        const COLLAB_ADMIN = 90;
        const GENERAL_ADMIN = 95;
    }

?>