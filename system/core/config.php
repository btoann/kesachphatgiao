<?php

    /*  Global constants  */


    /**
     *      DATABASE
     */
    final class DTB
    {
        /*  Database chính  */
        const MAIN_HOST = 'localhost';
        const MAIN_NAME = 'kesachphatgiao';
        const MAIN_USER = 'root';
        const MAIN_PASS = '';

        
        /*  Database khác  */
        const ORTHER_NAME_1 = 'sidebyside.shop';
    }


    /**
     *      URLs
     */
    final class URL
    {
        const HOME = 'main.php?ctrl=home';
    }


    /**
     *      Đường dẫn file
     */
    final class PATH
    {
        /*  Thư mục SYSTEM  */
        const SYSTEM_CORE = 'system/core';
        const SYSTEM_LIB = 'system/lib';

        /*  Thư mục MODEL  */
        const MODEL = 'models';
        const CLIENT_MODEL = 'client/models/functions';
        const SERVER_MODEL = 'server/models/functions';
        const CLIENT_CLASS = 'client/models/classes';
        const SERVER_CLASS = 'server/models/classes';

        /*  Thư mục VIEW  */
        const VIEW = 'views';
        const CLIENT_VIEW = 'client/views';
        const SERVER_VIEW = 'server/views';

        /*  Thư mục CONTROLLER  */
        const CTRLR = 'controllers';
        const CLIENT_CTRLR = 'client/controllers';
        const SERVER_CTRLR = 'server/controllers';

        /*  Thư mục LAYOUT  */
        const LAYOUT = 'layout';
        const CLIENT_LAYOUT = 'public/layout/client';
        const SERVER_LAYOUT = 'public/layout/server';

        /*  Thư mục IMAGES  */
        const IMAGES = 'public/images';

    }


    /**
     *      Trạng thái
     */
    final class STATUS
    {
        const ACTIVE = 1;
        const INACTIVE = 0;
    }


    /**
     *      Các quyền hạn tài khoản
     */
    final class ROLE
    {
        const BANNED_ACCOUNT = 0;
        
        const INACTIVE_CLIENT = 1;
        const ACTIVE_CLIENT = 10;
        const PREMIUM_CLIENT = 15;

        const COLLAB_ADMIN = 90;
        const GENERAL_ADMIN = 95;
    }


?>