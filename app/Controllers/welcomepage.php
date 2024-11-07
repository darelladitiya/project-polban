<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\dashboard;
use App\Models\welcome;
use CodeIgniter\Model;

class welcomepage extends BaseController
{
    public function save()
    {
        // Ambil data dari textarea
        $content = $this->request->getPost('content');

        // Lakukan sesuatu dengan data, misalnya simpan ke database
        // Contoh: $this->yourModel->save(['content' => $content]);

        return redirect()->to('/success'); // Sesuaikan rute redirect
    }
    public function submitMessage()
    {
        $message = $this->request->getPost('content');

      
        // Simpan ke database
        $welcomeModel = new welcome();
        $welcomeModel->truncate();
        $data = [
            'message' => $message,
        ];

        if ($welcomeModel->insert($data)) {
            return redirect()->to('/welcomepage')->with('success', 'Pesan berhasil disimpan.');
        } else {
            return redirect()->back()->with('error', 'Gagal menyimpan pesan.');
        }
    }
    
   


public function data(): string
{
    $model = new welcome();

    $data['message'] = $model->getmessage();

    // Render view dan kirim data
    return view('tracer', $data);
}
}

