<?php

namespace App\Http\Livewire\Admin\User;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $userId;

    public function deleteUser($id)
    {
        $this->userId = $id;
    }

    public function destroyUser()
    {
        $user = User::find($this->userId);
        $user->delete();

        session()->flash('message', 'Deleted successfully!');
        $this->dispatchBrowserEvent('close-modal');
    }
    public function render()
    {
        $users = User::where('user_type', 1)->paginate(10);
        return view('livewire.admin.user.index', [
            'users' => $users
        ]);
    }
}
