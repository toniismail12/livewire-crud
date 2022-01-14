<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\User;

class Crud extends Component
{
    public $name, $username, $email, $tanggal_lahir;

    public $tombolupdate, $id_edit;

    public function render()
    {
        return view('livewire.crud',[
            'data' => User::all(),
        ]);
    }

    private function resetInputFields(){
        $this->name = '';
        $this->username = '';
        $this->email = '';
        $this->tanggal_lahir = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
                'name' => 'required',
                'username' => 'required|unique:users',
                'email' => 'required|email|unique:users',
                'tanggal_lahir' => 'required',
            ],

            [
                'name.required' => 'nama wajib diisi',
                'username.required' => 'username wajib diisi',
                'email.required' => 'email wajib diisi',
            ]
        );
   
        
            User::create([
                'name' => $this->name, 
                'username' => $this->username,
                'email' => $this->email,
                'tanggal_lahir' => $this->tanggal_lahir,
            ]);
        
   
        $this->resetInputFields();
   
        session()->flash('message', 'data berhasil disimpan.');
    }

    public function edit($id)
    {
        $this->tombolupdate='1';
        $this->id_edit = $id;

        $user = User::find($id);
        
        $this->name = $user->name;
        $this->username = $user->username;
        $this->email = $user->email;
        $this->tanggal_lahir = $user->tanggal_lahir;
    }

    public function cancel()
    {
        $this->tombolupdate = '';
        $this->resetInputFields();
    }

    public function update()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'tanggal_lahir' => 'required',
        ],

        [
            'name.required' => 'nama wajib diisi',
            'username.required' => 'username wajib diisi',
            'email.required' => 'email wajib diisi',
        ]);

        User::where('id', $this->id_edit)->update([
            'name' => $this->name, 
            'username' => $this->username,
            'email' => $this->email,
            'tanggal_lahir' => $this->tanggal_lahir,
        ]);

        $this->tombolupdate = '';
        $this->resetInputFields();

        session()->flash('message', 'data berhasil diupdate.');
    }

    public function hapus($id)
    {
        User::where('id', $id)->delete();

        session()->flash('message', 'data berhasil dihapus.');
    }

}
