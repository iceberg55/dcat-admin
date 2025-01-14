<?php

namespace Dcat\Admin\Widgets;

use Dcat\Admin\Grid\LazyRenderable as LazyGrid;
use Dcat\Admin\Traits\LazyWidget;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Str;

class Plan extends Widget
{
    protected $view = 'admin::widgets.plan';
    protected $id;
    protected $hash_id;
    protected $title;
    protected $content;
    protected $price;
    protected $phases = [];

    public function __construct($id, $title = '', $content = null, $price = null)
    {
        $this->id = $id;
        $this->hash_id = md5($id);
        $this->title($title);
        $this->content($content);
        $this->price($price);


        $this->class('plan');
        $this->id('plan-'.$this->id);
    }

    /**
     * @param  string|\Closure|Renderable|LazyWidget  $content
     * @return $this
     */
    public function content($content)
    {
        if ($content instanceof LazyGrid) {
            $content->simple();
        }

        $this->content = $this->formatRenderable($content);

        return $this;
    }

    /**
     * @param  string  $title
     * @return $this
     */
    public function title($title)
    {
        $this->title = $title;

        return $this;
    }

    public function price($price)
    {
        $this->price = $price;

        return $this;
    }

    public function phases($phases = [])
    {
        $this->phases = $phases;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function defaultVariables()
    {
        return [
            'id' => $this->id,
            'hash_id' => $this->id,
            'title' => $this->title,
            'content' => $this->toString($this->content),
            'price' => $this->toString($this->price),
            'phases' => $this->phases,
            'attributes' => $this->formatHtmlAttributes(),
        ];
    }
}
