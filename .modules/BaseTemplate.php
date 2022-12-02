<?php
class BaseTemplate {
    public $javascript_sources = array();
    public $css_sources = array();
    public $javascript_from_php_sources = array();
    // Main-Template source
    public $main_template = "";
    public $html_meta_title = "";
    public $INCLUDE_SLIDER_RIGHT = false;
    // Extra big header title size for Startpage
    public $HEADER_TITLE_EXTRA_BIG = false;
    public $HEADER_DISPLAY_DATE = false;
    public $NAV_ACCESS_ALLOWED = true;

    public function __construct()
    {
        
    }

    /**
     * Add javascript source
     * 
     * sources are included as "<script type="text/javascript" ...
     * 
     * @param String $src path to javascript file to include
     * @return void
     */
    public function add_javascript_source($src)
    {
        $this->javascript_sources[] = $src;
    }

    /**
     * Add multiple javascript sources
     * 
     * sources are included as "<script type="text/javascript" ...
     * 
     * @param Array $path src_array  array of javascript files to include
     * @return void
     */
    public function add_javascript_sources($src_array)
    {
        array_push($this->javascript_sources, ...$src_array);
    }

    /**
     * Include javascript sources
     * 
     * sources are included as "<script type="text/javascript" ...
     * 
     * @param Array $path src_array of javascript files to include
     * @return void
     */
    public function include_javascript()
    {
        foreach ($this->javascript_sources as $src) {
            echo "<script type='text/javascript' src='".$src."'></script>\n";
        }
    }
    // ---
    /**
     * Add css source
     * 
     * sources are included as "<link rel="stylesheet" type="text/css" src="...">
     * 
     * @param String $src path to css file to include
     * @return void
     */
    public function add_css_source($src)
    {
        $this->css_sources[] = $src;
    }

    /**
     * Add multiple css sources
     * 
     * sources are included as "<link rel="stylesheet" type="text/css" src="...">
     * 
     * @param Array $path src_array  array of css files to include
     * @return void
     */
    public function add_css_sources($src_array)
    {
        array_push($this->css_sources, ...$src_array);
    }

    /**
     * Include css sources
     * 
     * sources are included as "<link rel="stylesheet" type="text/css" src="...">
     * 
     * @param Array $path src_array of javascript files to include
     * @return void
     */
    public function include_css()
    {
        foreach ($this->css_sources as $src) {
            echo "<link rel='stylesheet' type='text/css' href='".$src."'>\n";
        }
    }
    // ---

    /**
     * Add javascript from php file source
     * 
     * sources are included with inlcude()
     * 
     * @param String $src path to php (with js) file to include
     * @return void
     */
    public function add_javascript_from_php_source($src)
    {
        $this->javascript_from_php_sources[] = $src;
    }

    /**
     * Add multiple javascript from php sources
     * 
     * sources are included with inlcude()
     * 
     * @param Array $path src_array array of php (with js) files to include
     * @return void
     */
    public function add_javascript_from_php_sources($src_array)
    {
        array_push($this->javascript_from_php_sources, ...$src_array);
    }

    /**
     * Set main template source
     * 
     * @param String $template_src template source to include
     * @return void
     */
    public function set_main_template($template_src)
    {
        $this->main_template = $template_src;
    }

    /**
     * Set html meta title
     * 
     * If defined, `$arr_semContent['portal']['title_' . $_GET['jSiteId']]` overrides $this->html_meta_title 
     * see portal/templates/base.php
     * 
     * @param String $title
     * @return void
     */
    public function set_html_meta_title($title)
    {
        $this->html_meta_title = $title;
    }

    /**
     * Get html meta title
     * 
     * If defined, `$arr_semContent['portal']['title_' . $_GET['jSiteId']]` overrides $this->html_meta_title 
     * see portal/templates/base.php
     * 
     * @return string
     */
    public function get_html_meta_title()
    {
        return $this->html_meta_title;
    }

    /**
     * Select Subpage
     * 
     * @param array $sub_pages List of subpages. e.g.  [701 => 'testing.php', 201 => 'start.php' ]
     * @param string $jSiteId Normally passed per GET param $_GET['jSiteId']
     * @return void
     */
    public function select_subpage($jSiteId, $sub_pages)
    {
        if ($this->NAV_ACCESS_ALLOWED && isset($sub_pages[$jSiteId]) && check_nav_access_allowed($jSiteId)) {
            $main_template = $sub_pages[$jSiteId];
            $this->set_main_template($main_template);
        } else {
            $access_denied_template = './views/access_denied.php';
            $this->set_main_template($access_denied_template);
        }
    }
}
