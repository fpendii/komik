<?php

namespace App\Controllers;

use App\Models\KomikModel;
use CodeIgniter\Validation\StrictRules\Rules;

class komik extends BaseController{

    protected $komikModel;

    public function __construct(){
        $this->komikModel = new KomikModel();
    }

    public function index(){

        $komik = $this->komikModel->getKomik();

        $data = [
            'title' => 'Daftar Komik',
            'komik' => $komik
        ];

        //cara connect tanpa model
        // $db = \Config\Database::connect();
        // $komik = $db->query("SELECT * FROM komik");
        // $rowKomik = $komik->getResultArray();
        
        // print_r($rowKomik);

        echo view('layout/header', $data);
        echo view('komik/index');
        echo view('layout/footer');
    }

    public function detail($slug){
        $komik = $this->komikModel->getKomik($slug);

        $data = [
            'title' => 'Daftar Komik',
            'komik' => $komik
        ];

        echo view('layout/header', $data);
        echo view('komik/detailkomik');
        echo view('layout/footer');
    }

    public function create(){

        session();
        

        $data = [
            'title' => "Form Tambah Data",
            'validation' => \Config\Services::validation()
        ];

        return view('komik/create',$data);

    }

    public function save(){   
        
        // Aturan validasi input
        $rules = $this->validate([
            'judul' => 'required'
        ]);

        $validation = \Config\Services::validation();

        if(!$rules){
            $data = [
                'title' => "Form Tambah Data",
                'validation' => $validation
            ];
    
            return view('komik/create',$data);
        }
        
        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->komikModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $this->request->getVar('sampul'),
        ]);

        return redirect()->to('/komik');
    }

    public function deleteKomik($id){
        $this->komikModel->delete($id);
        return redirect()->to('/komik');
    }

    public function createKomik($slug){
        session();
        

        $data = [
            'title' => "Form Ubah Data",
            'validation' => \Config\Services::validation()
        ];

        echo view('layout/header', $data);
        echo view('komik/create', $data);
        echo view('layout/footer');
    }

    // Function untuk mengedit data
    public function editKomik($slug){

        $data = [
            'title' => "Form Edit Data",
            'validation' => \Config\Services::validation(),
            'komik' => $this->komikModel->getKomik($slug)
        ];

        echo view('layout/header', $data);
        echo view('komik/edit', $data);
        echo view('layout/footer');

    }

    // Function untuk menyimpan perubahan
    public function updateKomik($id){

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->komikModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $this->request->getVar('sampul'),
        ]);

        return redirect()->to('/komik');
    }
    
}



