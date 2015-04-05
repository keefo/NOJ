<?php

/*
 * Describe you custom columns and form items here.
 *
 * There is some simple examples what you can use:
 *
 *		Column::register('customColumn', '\Foo\Bar\MyCustomColumn');
 *
 * 		FormItem::register('customElement', \Foo\Bar\MyCustomElement::class);
 *
 * 		FormItem::register('otherCustomElement', function (\Eloquent $model)
 * 		{
 *			AssetManager::addStyle(URL::asset('css/style-to-include-on-page-with-this-element.css'));
 *			AssetManager::addScript(URL::asset('js/script-to-include-on-page-with-this-element.js'));
 * 			if ($model->exists)
 * 			{
 * 				return 'My edit code.';
 * 			}
 * 			return 'My custom element code';
 * 		});
 */


Admin::model(\App\Models\User::class)
         ->as('Users')
         ->title('Users')
         ->columns(function () {
             Column::string('id', 'ID');
             Column::string('name', 'Name');
			 Column::string('email', 'Email');
         	 Column::string('solved', 'Solved');
          	 Column::string('submit', 'Submit');
           })
         ->form(function () {
	        FormItem::text('id', 'Id');
	        FormItem::text('name', 'Name');
	    });
         
Admin::model(\App\Models\Problem::class)
         ->as('Problems')
         ->title('Problems')
         ->columns(function () {
             Column::string('id', 'ID');
             Column::string('title', 'Title');
			 Column::string('published', 'Published');
           }
         );


    
Admin::model(\App\Models\Article::class)
         ->as('Articles')
         ->title('Articles')
         ->columns(function () {
             Column::string('id', 'ID');
             Column::string('title', 'Title');
			 Column::string('published', 'Published');
          	 Column::string('category', 'Category');
           })
         ->form(function () {
		 	//dd(Auth::user());
/*
		 	
		 	FormItem::register('text', function ($instance)
			{
			    // implement your form element code here
			    if ($instance->exists)
			    {
			        // editing form
				    return '<input type="text" value="'.Auth::user()->id.'" />';
				} 
				else
			    {
				    return '<input type="text" value="'.Auth::user()->id.'" />';
				}
			});
			
*/
	        FormItem::text('title', 'Title');
	        FormItem::textarea('content', 'Content');
	        FormItem::checkbox('published', 'Published');
	    });