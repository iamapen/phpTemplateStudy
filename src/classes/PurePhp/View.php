<?php

namespace Poppy\TemplateStudy\PurePhp;

/**
 * PurePHP用のViewライブラリ
 *
 * レイアウトやimport等、テンプレートとして最低限の機能をラフに実装したもの。
 * テンプレートからは $this でこれにアクセスできる。
 */
class View
{
    protected $baseDir;
    protected $defaults = [];
    protected $layoutVars = [];

    /**
     * @param string $base_dir
     * @param array $defaults
     */
    public function __construct($base_dir, $defaults = [])
    {
        $this->baseDir = $base_dir;
        $this->defaults = $defaults;
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    public function setLayoutVar($name, $value)
    {
        $this->layoutVars[$name] = $value;
    }

    /**
     * @param array $vars
     */
    public function setLayoutVarArray($vars)
    {
        foreach ($vars as $name => $val) {
            $this->setLayoutVar($name, $val);
        }
    }

    /**
     * @param string $templatePath
     * @param array $vars
     * @param mixed $layoutPath
     * @return string
     */
    public function render($templatePath, $vars = [], $layoutPath = null)
    {
        $templateFile = $this->baseDir . '/' . $templatePath;

        extract(array_merge($this->defaults, $vars));

        ob_start();
        ob_implicit_flush(0);

        require $templateFile;

        $content = ob_get_clean();

        if ($layoutPath !== null) {
            $content = $this->render(
                $layoutPath,
                array_merge($this->layoutVars, ['content' => $content])
            );
        }

        return (string)$content;
    }

    /**
     * @param string $path
     * @param array $vars
     * @return string
     */
    function include($path, $vars)
    {
        extract($vars);

        ob_start();
        ob_implicit_flush(0);

        include $path;
        $content = ob_get_clean();
        return (string)$content;
    }

    /**
     * @param string $string
     * @return string HTML escaped
     */
    public function e($string)
    {
        return $this->escape($string);
    }

    public function escape($string)
    {
        return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
    }
}
