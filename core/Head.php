<?php

/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 16.06.2016
 * Time: 14:44
 */
class Head
{
    private $core;
    public $scripts = [];
    public $styles = [];

    function __construct()
    {
        global $core;
        $this->core = $core;
    }

    /**
     * @param string $name
     * @param string $url
     * @param bool $vers
     * @param bool $body
     */
    public function addScript($name, $url, $vers = false, $body = false)
    {
        $this->scripts[] = [
            'name' => $name,
            'url' => $url,
            'vers' => $vers,
            'body' => $body,
        ];
    }

    /**
     * @param string $name
     * @param string $url
     * @param bool $vers
     */
    public function addStyle($name, $url, $vers = false)
    {
        $this->styles[] = [
            'name' => $name,
            'url' => $url,
            'vers' => $vers,
        ];
    }

    /**
     *
     */
    public function siteHead()
    {
        $this->printStyle();
        $this->printScriptHead();
    }

    /**
     *
     */
    public function printScriptHead()
    {
        foreach ($this->scripts as $script) {
            if (!$script['body']) {
                $vers = (!empty($script['vers'])) ? "?ver=" . $script['vers'] : '';
                $url = $script['url'];
                echo '<script type="text/javascript" src="' . $url . $vers . '"></script>';
            }
        }
    }

    /**
     *
     */
    public function printScriptFooter()
    {
        foreach ($this->scripts as $script) {
            if ($script['body']) {
                $vers = (!empty($script['vers'])) ? "?ver=" . $script['vers'] : '';
                $url = $script['url'];
                echo '<script type="text/javascript" src="' . $url . $vers . '"></script>';
            }
        }
    }

    /**
     *
     */
    public function printStyle()
    {
        foreach($this->styles as $style){
            $vers = (!empty($style['vers'])) ? "?ver=" . $style['vers'] : '';
            $url = $style['url'];
            echo '<link rel="stylesheet" id="'.$style['name'].'" href="' . $url . $vers . '" type="text/css">';
        }
    }

}