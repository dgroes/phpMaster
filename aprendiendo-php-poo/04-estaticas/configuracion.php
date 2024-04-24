<?php
class Configuracion
{
    public static $color;
    public static $newsletter;
    public static $entorno;

    public static function getColor(): ?string
    {
        return self::$color;
    }

    public static function setColor(string $color): void
    {
        self::$color = $color;
    }

    public static function getNewsletter(): ?bool
    {
        return self::$newsletter;
    }

    public static function setNewsletter(bool $newsletter): void
    {
        self::$newsletter = $newsletter;
    }

    public static function getEntorno(): ?string
    {
        return self::$entorno;
    }

    public static function setEntorno(string $entorno): void
    {
        self::$entorno = $entorno;
    }
}
