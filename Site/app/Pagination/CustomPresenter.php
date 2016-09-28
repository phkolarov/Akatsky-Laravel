<?php
/**
 * Created by PhpStorm.
 * User: mst
 * Date: 9/6/2016
 * Time: 8:05 PM
 */

namespace App\Pagination;


use Illuminate\Support\HtmlString;
use Illuminate\Contracts\Pagination\Presenter as PresenterContract;
use Illuminate\Contracts\Pagination\Paginator as PaginatorContract;
use Illuminate\Pagination\UrlWindow;
use Illuminate\Pagination\BootstrapThreeNextPreviousButtonRendererTrait;

use Illuminate\Pagination\UrlWindowPresenterTrait;


class CustomPresenter  implements PresenterContract
{

    use BootstrapThreeNextPreviousButtonRendererTrait,UrlWindowPresenterTrait;

    protected $paginator;
    protected  $window;

    public function __construct(PaginatorContract $paginator, UrlWindow $window = null)
    {
        $this->paginator = $paginator;
        $this->window = is_null($window) ? UrlWindow::make($paginator,1) : $window->get();
    }


    public function render(){

        if ($this->hasPages()) {
            return new HtmlString(sprintf(
                '<ul class="pagination">%s %s %s</ul>',
                $this->getPreviousButton('Предишна'),
                $this->getLinks(),
                $this->getNextButton('Следваща')
            ));
        }

        return '';
    }

    public function hasPages()
    {
        return $this->paginator->hasPages();
    }

    protected function getDisabledTextWrapper($text)
    {
        return '<li class="disabled"><span>'.$text.'</span></li>';
    }

    protected function getActivePageWrapper($text)
    {
        return '<li class="active"><span>'.$text.'</span></li>';
    }

    protected function getAvailablePageWrapper($url, $page, $rel = null)
    {
        $rel = is_null($rel) ? '' : ' rel="'.$rel.'"';

        return '<li><a href="'.htmlentities($url).'"'.$rel.'>'.$page.'</a></li>';
    }

    protected function getDots()
    {
        return $this->getDisabledTextWrapper('...');
    }


    protected function getPageSlider()
    {
        // Changing the original value from 6 to 3 to reduce the link count
        $window = 3;

        // If the current page is very close to the beginning of the page range, we will
        // just render the beginning of the page range, followed by the last 2 of the
        // links in this list, since we will not have room to create a full slider.
        if ($this->currentPage <= $window)
        {
            $ending = $this->getFinish();

            return $this->getPageRange(1, $window + 2).$ending;
        }

        // If the current page is close to the ending of the page range we will just get
        // this first couple pages, followed by a larger window of these ending pages
        // since we're too close to the end of the list to create a full on slider.
        elseif ($this->currentPage >= $this->lastPage - $window)
        {
            $start = $this->lastPage - 8;

            $content = $this->getPageRange($start, $this->lastPage);

            return $this->getStart().$content;
        }

        // If we have enough room on both sides of the current page to build a slider we
        // will surround it with both the beginning and ending caps, with this window
        // of pages in the middle providing a Google style sliding paginator setup.
        else
        {
            $content = $this->getAdjacentRange();

            return $this->getStart().$content.$this->getFinish();
        }
    }
}