<?php
 
namespace App\View\Composers;
 
use Illuminate\View\View;
use App\Models\Category;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

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
        $seconds = 360;
        $categories = Cache::remember('categories', $seconds, function () {
            return Category::where('status', 1)->get();
        });

        $settings = Cache::remember('settings', $seconds, function () {
            $settings = Setting::select('key', 'value')->get();
            $data = [];
            foreach($settings as $set) {
                $data[$set['key']] = $set['value'];
            }
            return $data;
        });

        $view->with('categories', $categories);
        $view->with('settings', $settings);
    }
}