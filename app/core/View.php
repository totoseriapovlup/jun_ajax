<?php


namespace app\core;


class View
{
    /**
     * template name
     * @var string
     */
    protected string $template = 'index';

    /**
     * page template name
     * @var string
     */
    protected string $page;

    /**
     * View constructor.
     * @param string|null $template
     */
    public function __construct(?string $template = null)
    {
        if ($template) {
            $this->template = $template;
        }
    }

    /**
     * render page with specified template and page template
     * @param string $page
     * @param array $options
     */
    public function render(string $page, array $options = [])
    {
        $this->page = $page;
        extract($options);
        include_once  $this->viewsPath() . 'templates' . DIRECTORY_SEPARATOR . $this->template . '_template.php';
    }

    protected function viewsPath(){
        return App::getRootPath() . 'views' . DIRECTORY_SEPARATOR;
    }
}