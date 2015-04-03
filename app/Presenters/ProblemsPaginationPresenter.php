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
		$mid = '';
		
		for($i=1; $i <= $lastpage; $i++){
			$url = $this->paginator->url($i);
			if($currentpage===$i){
				$mid.='<li class="active"><span>'.numberToRoman($i).'</span></li>';
			}
			else{
				$mid.='<li><a href="'.$url.'">'.numberToRoman($i).'</a></li>';
			}
		}
		
        return sprintf(
            '<ul class="pagination" aria-label="Pagination">%s %s %s</ul></div>',
            $this->getPreviousButton(),
            $mid,
            $this->getNextButton()
        );
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

