<?php
    class AppController {

        private $url;
        private $request;

        public function __construct()
        {
            $this->url = "http://$_SERVER[HTTP_HOST]";
            $this->request = $_SERVER['REQUEST_METHOD'];
        }

        public function getUrl(): string
        {
            return $this->url;
        }

        protected function getRequestMethod(): string
        {
            return $this->request;
        }

        protected function isPost(): bool
        {
            return $this->request === 'POST';
        }

        protected function isGet(): bool
        {
            return $this->request === 'GET';
        }

        protected function render(string $template = null, array $variables = []) {
            $templatePath = 'public/views/'.$template.'.php';
            $output = 'File not found';

            if (file_exists($templatePath)) {
                extract($variables);

                ob_start();
                include $templatePath;
                $output = ob_get_clean();
            }

            print $output;
        }
    }
?>