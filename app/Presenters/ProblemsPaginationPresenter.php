<?php namespace App\Presenters;
	
	
use Illuminate\Pagination\BootstrapThreePresenter;

class ProblemsPaginationPresenter extends BootstrapThreePresenter
{
    /**
     * Convert the URL window into Zurb Foundation HTML.
     *
     * @return string
     */
    public function render()
    {
        if( ! $this->hasPages())
            return '';
            
        $currentpage =  $this->currentPage();
        $lastpage = $this->lastPage();
        $mid = '<ul class="nav nav-tabs">';
		for($i=1; $i <= $lastpage; $i++){
			$url = $this->paginator->url($i);
			$text = numberToRoman($i);
			if($currentpage===$i){
				$mid.='<li class="active"><a href="#">'.$text.'</a></li>';
			}
			else{
				$mid.='<li><a href="'.$url.'">'.$text.'</a></li>';
			}
		}
		$mid.='</ul>';
		
        return $mid;
    }

    /**
     * Get HTML wrapper for disabled text.
     *
     * @param  string  $text
     * @return string
     */
    protected function getDisabledTextWrapper($text)
    {
        return '<li class="unavailable" aria-disabled="true"><a href="javascript:void(0)">'.$text.'</a></li>';
    }

    /**
     * Get HTML wrapper for active text.
     *
     * @param  string  $text
     * @return string
     */
    protected function getActivePageWrapper($text)
    {
        return '<li class="current"><a href="javascript:void(0)">'.$text.'</a></li>';
    }

    /**
     * Get a pagination "dot" element.
     *
     * @return string
     */
    protected function getDots()
    {
        return $this->getDisabledTextWrapper('&hellip;');
    }
}

