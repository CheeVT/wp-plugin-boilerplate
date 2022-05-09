<?php

namespace CheeVT\Core;

class Mail
{
    protected static $__dir__;

    public function __construct($__dir__)
    {
        self::$__dir__ = $__dir__;
    }

    public static function send($to, $subject, $content, $template = null, $headers = [])
    {
        if(isset($content['name']) && isset($content['email'])) {
            $headers[] = sprintf('From: %s <%s>', $content['name'], $content['email']);
        } else {
            $headers[] = sprintf('From: %s <%s>', 'Admin', 'admin@admin.com');
        }

        if($template && is_array($content)) {
            $headers[] = 'Content-Type: text/html; charset=UTF-8';
            $content = self::renderTemplate($template, $content);
        }

        \wp_mail($to, $subject, $content, $headers);
    }

    public static function renderTemplate($template, $params)
    {
        if(is_array($params)) extract($params);
        ob_start();
        include self::$__dir__ . '/views/mails/' . $template . '.php';
        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }
}