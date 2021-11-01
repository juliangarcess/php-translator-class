<?php
    session_start();
    class translator{

        private $webLanguage;
        private $acceptedLanguages;
        private $defaultLanguage;
        private $texts;

        function __construct($texts, $acceptedLanguages, $defaultLanguage){
            $this->texts = $texts;
            $this->acceptedLanguages = $acceptedLanguages;
            $this->defaultLanguage = $defaultLanguage;
            if(!isset($_SESSION['lang']) || $_SESSION['lang'] == NULL || !in_array(strtolower($_SESSION['lang']), $this->acceptedLanguages)){
                $this->setLanguage(strtolower(substr($_SERVER["HTTP_ACCEPT_LANGUAGE"], 0, 2)));
            }
            else{
                $this->setLanguage($_SESSION['lang']);
            }
        }

        public function setLanguage($selectedLanguage = null){
            if ($selectedLanguage != NULL && in_array(strtolower($selectedLanguage), $this->acceptedLanguages)){
                $this->webLanguage = strtolower($selectedLanguage);
                $_SESSION['lang'] = $this->webLanguage;
            }
            else {
                $this->webLanguage = $this->defaultLanguage;
                $_SESSION['lang'] = $this->webLanguage;
            }
        }
        public function getLanguage(){
            return $this->webLanguage;
        }
        public function resetLanguage(){
            return $this->setLanguage();
        }
        public function translate($text){
            return $this->texts[$text][$this->webLanguage];
        }
    }
?>