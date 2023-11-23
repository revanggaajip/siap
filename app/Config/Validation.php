<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------
    public $jenis = [
        'nama' => 'required|string|is_unique[jenis.nama,id,{id}]',
    ];

    public $golongan = [
        'nama' => 'required|string|is_unique[golongan.nama,id,{id}]',
    ];

    public $satuan = [
        'nama' => 'required|string|is_unique[satuan.nama,id,{id}]',
    ];

    public $kategori = [
        'nama' => 'required|string|is_unique[kategori.nama,id,{id}]',
    ];
    
    public $knm = [
        'nama' => 'required|string|is_unique[kategori.nama,id,{id}]',
    ];

    public $obat = [
        'nama' => 'required|string',
        'kandungan' => 'required|string',
        'satuan' => 'required|string',
        'kategori' => 'required|string',
        'golongan' => 'required|string',
        'jenis' => 'required|string',
        'kapasitas' => 'required|string'
    ];

    public $pengguna = [
        'nama' => 'required|string',
        'tanggal_lahir' => 'required',
        'username' => 'required',
        'hak_akses' => 'required'
    ];

    public $penerimaan = [
        'no_faktur' => 'required|string',
        'tanggal' => 'required',
        'sp' => 'required',
        'nama_supplier' => 'required'
    ];

}