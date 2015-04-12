<?php namespace App\Models\Admin;

use Illuminate\Support\Arr;
use App\Html\HtmlBuilder;
use Auth;

/**
 * Class MenuItem
 */
class MenuItem
{
	/**
	 * @var MenuItem
	 */
	public static $current;
	/**
	 * @var HtmlBuilder
	 */
	protected $htmlBuilder;
	/**
	 * @var string
	 */
	protected $className;
	/**
	 * @var string
	 */
	public $label;
	/**
	 * @var string
	 */
	public $icon;
	/**
	 * @var string
	 */
	public $url;
	/**
	 * @var MenuItem[]
	 */
	public $subItems;

	/**
	 * @param string|null $modelClass
	 */
	function __construct($label, $url, $icon, $className='')
	{
		$user = Auth::user();
		if($user==null || !$user->isAdmin()){
			dd('not admin');
		}
		$admin = $user;
		$this->htmlBuilder = $admin->htmlBuilder();
		$this->url = $url;
		$this->label = $label;
		$this->icon = $icon;
		$this->subItems = [];
		$this->className = $className;
	}

	/**
	 * @param \Closure $callback
	 * @return $this
	 */
	public function items($callback)
	{
		$old = static::$current;
		static::$current = $this;
		call_user_func($callback);
		static::$current = $old;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function hasSubItems()
	{
		return count($this->subItems) != 0;
	}

	/**
	 * @param $url
	 * @return $this
	 */
	public function itemWithUrl($url)
	{
		if ($this->url === $url) return $this;
		foreach ($this->subItems as $item)
		{
			if ($result = $item->itemWithUrl($url))
			{
				return $result;
			}
		}
		return null;
	}

	/**
	 * @return MenuItem[]
	 */
	public function getItems()
	{
		return $this->subItems;
	}

	/**
	 * @param MenuItem $item
	 * @return $this
	 */
	public function addItem($item)
	{
		$this->subItems[] = $item;
		return $this;
	}

	/**
	 * @param int $level
	 * @return string
	 */
	public function render($level = 1)
	{
		if ($this->hasSubItems())
		{
			$level++;
			$content = $this->htmlBuilder->tag('i', [
				'class' => [
					'fa',
					'fa-fw',
					$this->icon
				]
			]);
			$content .= ' ' . $this->label . $this->htmlBuilder->tag('span', ['class' => 'fa arrow']);
			$content = $this->htmlBuilder->tag('a', ['href' => '#'], $content);

			$subitemsContent = '';
			foreach ($this->subItems as $item)
			{
				$subitemsContent .= $item->render($level);
			}

			$classByLevel = [
				2 => 'nav-second-level',
				3 => 'nav-third-level'
			];
			$content .= $this->htmlBuilder->tag('ul', [
				'class' => [
					'nav',
					Arr::get($classByLevel, $level, null)
				]
			], $subitemsContent);
		} else
		{
			$content = $this->renderSingleItem();
		}
		
		if(startsWith($_SERVER['REQUEST_URI'], $this->url)){
			return $this->htmlBuilder->tag('li', ['class'=>'active'], $content);
		}
		return $this->htmlBuilder->tag('li', [], $content);
	}

	/**
	 * @return string
	 */
	protected function renderSingleItem()
	{
		$content = $this->htmlBuilder->tag('i', [
			'class' => [
				'fa',
				'fa-fw',
				$this->icon
			]
		]);
		$content .= ' ' . $this->label;
		if(startsWith($_SERVER['REQUEST_URI'], $this->url)){
			return $this->htmlBuilder->tag('a', ['href' => $this->url, 'class'=>'active'], $content);
		}
		return $this->htmlBuilder->tag('a', ['href' => $this->url], $content);
	}

}