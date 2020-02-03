<?php

namespace Fanucchi\metaboxes;

/**
 * A WordPress meta box that appears in the editor.
 */
class Attributes
{
    /**
     * Screen context where the meta box should display.
     *
     * @var string
     */
    private $context;
 
    /**
     * The ID of the meta box.
     *
     * @var string
     */
    private $id;
 
    /**
     * The display priority of the meta box.
     *
     * @var string
     */
    private $priority;
 
    /**
     * Screen where this meta box will appear.
     *
     * @var string[]
     */
    private $screen;
 
    /**
     * Path to the template used to display the content of the meta box.
     *
     * @var string
     */
    private $template;
 
    /**
     * The title of the meta box.
     *
     * @var string
     */
    private $title;

    private $data;
 
    /**
     * Constructor.
     *
     * @param string   $id
     * @param string   $title
     * @param string   $screen
     * @param string   $template
     * @param string   $context
     * @param string   $priority
    */
    public function __construct($id, $title, $template, $screen, $context = 'advanced', $priority = 'default')
    {
        global $post;

        $this->context = $context;
        $this->id = $id;
        $this->priority = $priority;
        $this->screen = $screen;
        $this->template = rtrim($template, '/');
        $this->title = $title;
        $this->data  = get_post_meta($post->ID, $this->id, true);
    }

    public function register()
    {
        add_meta_box(
            $this->get_id(),
            $this->get_title(),
            $this->get_callback(),
            $this->get_screen(),
            $this->get_context(),
            $this->get_priority()
        );
    }
 
    /**
     * Get the callable that will the content of the meta box.
     *
     * @return callable
     */
    public function get_callback()
    {
        return array($this, 'render');
    }
 
    /**
     * Get the screen context where the meta box should display.
     *
     * @return string
     */
    public function get_context()
    {
        return $this->context;
    }
 
    /**
     * Get the ID of the meta box.
     *
     * @return string
     */
    public function get_id()
    {
        return $this->id;
    }
 
    /**
     * Get the display priority of the meta box.
     *
     * @return string
     */
    public function get_priority()
    {
        return $this->priority;
    }
 
    /**
     * Get the screen(s) where the meta box will appear.
     *
     * @return array|string|WP_Screen
     */
    public function get_screen()
    {
        return $this->screen;
    }
 
    /**
     * Get the title of the meta box.
     *
     * @return string
     */
    public function get_title()
    {
        return $this->title;
    }

    public function value($key)
    {
        $value = $this->data[$key] ?? '';

        echo "value = '{$value}'";
    }

    public function checked($key, $value)
    {
        if( empty($this->data) || !is_array($this->data[$key]) || !in_array($value, $this->data[$key]) )
            return;

        echo 'checked';
    }

    /**
     * Render the content of the meta box using a PHP template.
     *
     * @param WP_Post $post
     */
    public function render(\WP_Post $post)
    {
        if (!is_readable($this->template)) {
            return;
        }
 
        include $this->template;
    }
}
