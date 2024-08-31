<?php namespace Config;

use CodeIgniter\Config\BaseConfig;

class Settings extends BaseConfig
{
    /*
    * Recaptha Google
    *
    * See link below for setup and get key
    * http://www.google.com/recaptcha/admin
    */
    public $recaptcha_site_key = '6LfhPC8qAAAAAGs65FSxX85yf7vDa-jcGx8hv3Ow';
    public $recaptcha_secret_key = '6LfhPC8qAAAAAO5I6C3pBq-t-SEt9JOoIySFQG2I';
    public $recaptcha_lang = 'id';
}
