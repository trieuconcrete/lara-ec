<?php
 
namespace App\View\Composers;
 
use Illuminate\View\View;
use App\Models\Category;
use App\Models\Setting;

class CategoryComposer
{
    /**
     * Create a new profile composer.
     */
    public function __construct()
    {

    }
 
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $categories = Category::where('status', 1)->get();
        $settings = Setting::select('key', 'value')->get();
        $data = [];
        foreach($settings as $set) {
            $data[$set['key']] = $set['value'];
        }
        $view->with('categories', $categories);
        $view->with('settings', $data);
    }
}