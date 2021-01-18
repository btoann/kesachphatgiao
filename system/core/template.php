<?php

    /*  Template engine  */

    class Template
    {
        /**
         *      Thư mục view.
         */
        private $__directory;
        
        /**
         *      Layout của view.
         *      @default: NULL
         */
        private $__layout;
        
        /**
         *      Các section của layout. VD: content, sidebar, header, footer,...
         */
        private $__sections;
        
        /**
         *      section hiện tại đang xét.
         *      @default: NULL
         */
        private $__current_section;
        
        
        /**
         *      Hàm khởi tạo
         */
        public function __construct($directory)
        {
            $this->__setDirectory($directory);
            $this->__sections = [];
            $this->__layout = NULL;
            $this->__current_section = NULL;
        }

        
        /**
         *      Hàm set thư mục views
         * 
         *      @input:  string $directory  <-  Thư mục views
         */
        private function __setDirectory(string $directory)
        {
            if (!is_dir($directory)) {
                throw new Exception("$directory is not exist or not a directory");
            }
            $this->__directory = $directory;
        }
        
        /**
         *      Hàm kiểm tra đường dẫn của file view
         * 
         *      @input:  string $path  <-  Đường dẫn của file. Đuôi file sẽ là .php
         * 
         *      @output:  string $file  <-  Đường dẫn hoàn chỉnh của file view
         */
        private function __resolvePath(string $path)
        {
            $file = $this->__directory . '/' . $path . '.php';
            if (!file_exists($file)) {
                throw new Exception("$file is not exist");
            }
            return $file;
        }

        /**
         *      Hàm kiểm tra đường dẫn của file khác không liên quan đến thư mục views
         * 
         *      @input, @output:  <=>  function __resolvePath(string $path)
         */
        private function __resolveOtherPath(string $path)
        {
            $file = $path . '.php';
            if (!file_exists($file)) {
                throw new Exception("$file is not exist");
            }
            return $file;
        }

        
        /**
         *      Hàm load view
         * 
         *      @input:  string $view_name  <-  Tên view cần load
         *      @input:  array $args  <-  Các tham số cần truyền qua view, nếu có sẽ được trích xuất thành các biến riêng biệt
         * 
         *      @output:  string $file  <-  Đường dẫn hoàn chỉnh của file view
         */
        public function render(string $view_name, array $args)
        {
            if (is_array($args)) {
                extract($args);
            }

            ob_start();

            include_once $this->__resolvePath($view_name);

            $content = ob_get_clean();

            if (empty($this->__layout)) {
                return $content;
            }

            ob_clean();

            include_once $this->__resolveOtherPath($this->__layout);

            $output = ob_get_contents();

            ob_end_clean();

            return $output;
        }
        
        
        /**
         *      Include một view trong một view
         * 
         *      @input:  string $view_name  <-  Tên view cần include
         */
        public function include(string $view_name)
        {
            ob_start();

            include_once $this->__resolvePath($view_name);

            $content = ob_get_contents();

            ob_end_clean();

            echo $content;
        }
        
        
        /**
         *      Hàm bắt đầu một section
         * 
         *      @input:  string $name  <-  Tên của section.
         */
        public function section(string $name)
        {
            $this->__current_section = $name;
            ob_start();
        }

        /**
         *      Hàm kết thúc một section
         */
        public function end()
        {
            if (empty($this->__current_section)) {
                throw new Exception("There is not a section start");
            }

            $content = ob_get_contents();

            ob_end_clean();

            $this->__sections[$this->__current_section] = $content;

            $this->__current_section = null;
        }
        
        
        /**
         *      Hàm kế thùa layout trong views
         * 
         *      @input:  string $layout  <-  Layout cần kế thừa
         */
        public function layout(string $layout)
        {
            $this->__layout = $layout;
        }

        /**
         *      Hàm xác định vị trí section sẽ được render trong file layout view
         * 
         *      @input:  string $name  <-  Tên section cần render
         */
        public function renderSection(string $name)
        {
            echo $this->__sections[$name];
        }
        
    }