<?php

namespace Tajawal\Output;

class Formater{

    public function greenText($text)
    {
        return "<info>{$text}</info>";
    }

    public function redText($text)
    {
        return "<error>{$text}</error>";
    }

    public function yellowText($text)
    {
        return "<comment>{$text}</comment>";
    }

}

