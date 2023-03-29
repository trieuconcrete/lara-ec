<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;
use App\Models\ProductReview;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductReviewRequest;
use Livewire\WithPagination;
class Review extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $product, $comment, $full_name, $email, $point;

    public function mount($product)
    {
        $this->product = $product;
    }

    protected function rules(): array 
    {
        return (new ProductReviewRequest())->rules();
    } 

    public function saveReview()
    {
        $this->validate();
        if (Auth::check()) {
            ProductReview::create([
                'product_id' => $this->product->id,
                'user_id' => auth()->user()->id,
                'comment' => $this->comment,
                'full_name' => $this->full_name,
                'email' => $this->email,
                'point' => $this->point
            ]);
            $this->comment = null;
            $this->full_name = null;
            $this->point = 0;

            $message = 'Review Added Successfuly';
            $type = 'success';
            $status = 200;
        } else {
            $message = 'Please login to Review';
            $type = 'message';
            $status = 401;
        }
        $this->dispatchBrowserEvent('message', [
            'text' => $message,
            'type' => $type,
            'status' => $status
        ]);
    }

    public function setValueInput()
    {
        $user = Auth::user();
        $this->full_name = $user ? $user->userDetail->full_name : null;
        $this->email = $user ? $user->email : null;
    }

    public function render()
    {
        $this->setValueInput();
        $reviews = ProductReview::with('user', 'user.userDetail')->where('product_id', $this->product->id)->orderBy('created_at', 'DESC')->paginate(5);
        return view('livewire.frontend.product.review', [
            'reviews' => $reviews
        ]);
    }
}
